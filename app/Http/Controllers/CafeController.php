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

        return view('dashboard', compact('totalMenu', 'totalPesanan', 'totalPendapatan', 'recentOrders'));
    }

    /**
     * Halaman Menu: Menampilkan semua menu berdasarkan kategorinya
     */
    public function menu()
    {
        // Mengambil semua kategori beserta menu di dalamnya (Eager Loading untuk menghindari issue N+1)
        $categories = Category::with('menus')->get();

        return view('menu.menu', compact('categories'));
    }

    /**
     * Halaman membuat menu baru
     */
    public function createMenu()
    {
        $categories = Category::all();

        return view('menu.menu-create', compact('categories'));
    }

    /**
     * Simpan menu baru ke database
     */
    public function storeMenu(Request $request)
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'menu_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:Ready,Sold Out'],
        ]);

        Menu::create($data);

        return redirect()->route('menu.index')->with('success', 'Menu baru berhasil ditambahkan.');
    }

    /**
     * Halaman detail menu
     */
    public function showMenu(Menu $menu)
    {
        return view('menu.menu-show', compact('menu'));
    }

    /**
     * Halaman edit menu
     */
    public function editMenu(Menu $menu)
    {
        $categories = Category::all();

        return view('menu.menu-edit', compact('menu', 'categories'));
    }

    /**
     * Update menu yang sudah ada
     */
    public function updateMenu(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'menu_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:Ready,Sold Out'],
        ]);

        $menu->update($data);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Hapus menu
     */
    public function destroyMenu(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }

    /**
     * Halaman Transaksi: Menampilkan riwayat semua orderan masuk
     */
    public function orderHistory()
    {
        // Mengambil semua data order, diurutkan dari yang paling baru
        $orders = Order::with('menu.category')->latest()->paginate(10); // Menggunakan pagination agar rapi

        return view('order.orders', compact('orders'));
    }
}