<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('menu.category')->latest()->paginate(10);
        $menus = Menu::where('status', 'Ready')->orderBy('menu_name')->get();

        return view('order.orders', compact('orders', 'menus'));
    }

    public function history()
    {
        $orders = Order::with('menu.category')->latest()->paginate(10);

        return view('order.history', compact('orders'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_id' => ['required', 'exists:menus,id'],
            'customer_name' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer', 'min:1'],
            'payment_method' => ['required', 'string', 'max:100'],
            'order_date' => ['nullable', 'date'],
        ]);

        $menu = Menu::findOrFail($data['menu_id']);

        if ($menu->status !== 'Ready') {
            return back()->withErrors(['menu_id' => 'Menu yang dipilih sedang tidak tersedia.'])->withInput();
        }

        $data['total_price'] = $menu->price * $data['quantity'];

        Order::create($data);

        return redirect()->route('orders.history')->with('success', 'Order berhasil ditambahkan.');
    }

    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }
}
