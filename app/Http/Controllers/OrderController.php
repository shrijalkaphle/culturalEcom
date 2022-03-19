<?php

namespace App\Http\Controllers;

use App\Models\OrderHistory;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function viewOrder()
    {
        return view('user.order');
    }

    public function viewAllOrder()
    {
        $orders = OrderHistory::paginate(15);
        return view('admin.order',compact('orders'));
    }
}
