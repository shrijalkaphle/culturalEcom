<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderHistory;
use App\Models\Payment;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart()
    {
        return view('cart');
    }

    public function addToCart(Request $request)
    {
        if(auth()->user()->role->name == 'admin')
            return redirect()->back()->with('error', 'Admin are not allowed to purchase product!');

        $input = $request->all();
        $input['user_id'] = auth()->id();

        //check if product in cart exists
        $cart = Cart::where(['user_id' => $input['user_id'],'product_id' => $input['product_id']])->first();
        if(empty($cart))
        {
            Cart::create($input);
        }
        else
        {
            $new_qty = $input['qty'] + $cart->qty;
            $cart->update(['qty' => $new_qty]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function updateCart(Request $request, int $id)
    {
        $cart = Cart::findorfail($id);
        $cart->update($request->all());
        return redirect()->back();
    }

    public function deleteCartItem(int $id)
    {
        $cart = Cart::findorfail($id);
        $cart->delete();
        return redirect()->back();
    }

    public function paymentPage(Request $request)
    {
        $stripe = new \Stripe\StripeClient("sk_test_51KUOdyGOMb6nWoUFxchWGNeUxpcIlUi5IUKIazOLs9rCTOweMTzlzzHmmPbTtNHbsLy0OBYpfFZJpgEkAlu40bE000dBwYIb0V");
        $total = $request->totalAmount;
        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => $total * 100,
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);
        return view('payment', compact('total','paymentIntent'));
    }
    
    public function confirmedPayment(Request $request)
    {
        $stripe = new \Stripe\StripeClient("sk_test_51KUOdyGOMb6nWoUFxchWGNeUxpcIlUi5IUKIazOLs9rCTOweMTzlzzHmmPbTtNHbsLy0OBYpfFZJpgEkAlu40bE000dBwYIb0V");
        $paymentIntent = $stripe->paymentIntents->retrieve(
            $request->paymentIntent_id,
            []
        );
        
        //move cart from cart to order history and create a payment table
        $payment = Payment::create([
            'user_id'           =>  auth()->id(),
            'paymentIntent_id'  =>  $paymentIntent->id,
            'recept_url'        =>  $paymentIntent->charges->data[0]->receipt_url
        ]);

        $carts = Cart::where(['user_id' => auth()->id()])->get();
        foreach($carts as $cart)
        {
            OrderHistory::create([
                'payment_id'    =>  $payment->id,
                'product_id'    =>  $cart->product_id,
                'qty'           =>  $cart->qty
            ]);

            $cart->delete();
        }
        return view('redirecting');
    }

}
