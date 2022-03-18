<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
}
