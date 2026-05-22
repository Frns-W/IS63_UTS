<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with('menus')->get();

        return view('menu.menu', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('menu.menu-create', compact('categories'));
    }

    public function store(Request $request)
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

    public function show(Menu $menu)
    {
        return view('menu.menu-show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        $categories = Category::all();

        return view('menu.menu-edit', compact('menu', 'categories'));
    }

    public function update(Request $request, Menu $menu)
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

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }
}
