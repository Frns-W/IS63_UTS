<?php

use App\Http\Controllers\CafeController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Route untuk Halaman Dashboard Kafe
Route::get('/', [CafeController::class, 'index']);

// Route untuk Halaman Data Kategori
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Route untuk Halaman Daftar Menu
Route::get('/menu', [CafeController::class, 'menu'])->name('menu.index');
Route::get('/menu/create', [CafeController::class, 'createMenu'])->name('menu.create');
Route::post('/menu', [CafeController::class, 'storeMenu'])->name('menu.store');
Route::get('/menu/{menu}', [CafeController::class, 'showMenu'])->name('menu.show');
Route::get('/menu/{menu}/edit', [CafeController::class, 'editMenu'])->name('menu.edit');
Route::put('/menu/{menu}', [CafeController::class, 'updateMenu'])->name('menu.update');
Route::delete('/menu/{menu}', [CafeController::class, 'destroyMenu'])->name('menu.destroy');

// Route untuk Halaman Riwayat Transaksi
Route::get('/orders', [CafeController::class, 'orderHistory'])->name('orders.index');