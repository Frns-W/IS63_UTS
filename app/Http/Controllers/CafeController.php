<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    /**
     * Halaman Utama: Menampilkan Dashboard Ringkas Kafe
     */
    public function index()
    {
        // Mengambil data statistik ringkas untuk dashboard kafe
        $totalMenu = Menu::count();
        $totalPesanan = Order::count();
        $totalPendapatan = Order::sum('total_price');
        
        // Mengambil 5 transaksi terbaru beserta data menu yang dipesan (Eager Loading)
        $recentOrders = Order::with('menu')->latest()->take(5)->get();

        return view('cafe.dashboard', compact('totalMenu', 'totalPesanan', 'totalPendapatan', 'recentOrders'));
    }

    /**
     * Halaman Menu: Menampilkan semua menu berdasarkan kategorinya
     */
    public function menu()
    {
        // Mengambil semua kategori beserta menu di dalamnya (Eager Loading untuk menghindari issue N+1)
        $categories = Category::with('menus')->get();

        return view('cafe.menu', compact('categories'));
    }

    /**
     * Halaman Transaksi: Menampilkan riwayat semua orderan masuk
     */
    public function orderHistory()
    {
        // Mengambil semua data order, diurutkan dari yang paling baru
        $orders = Order::with('menu.category')->latest()->paginate(10); // Menggunakan pagination agar rapi

        return view('cafe.orders', compact('orders'));
    }
}