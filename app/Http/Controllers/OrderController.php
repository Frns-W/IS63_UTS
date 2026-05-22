<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('menu.category')->latest()->paginate(10);

        return view('order.orders', compact('orders'));
    }

    public function show(Order $order)
    {
        // Optional: implement detail view if needed later
        return view('order.show', compact('order'));
    }
}
