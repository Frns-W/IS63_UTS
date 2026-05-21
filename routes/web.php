<?php

use App\Http\Controllers\CafeController;
use Illuminate\Support\Facades\Route;

// Route untuk Halaman Dashboard Kafe
Route::get('/', [CafeController::class, 'index']);

// Route untuk Halaman Daftar Menu
Route::get('/menu', [CafeController::class, 'menu']);

// Route untuk Halaman Riwayat Transaksi
Route::get('/orders', [CafeController::class, 'orderHistory']);