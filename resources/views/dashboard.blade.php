@extends('layouts.admin') {{-- Memanggil file induk admin.blade.php --}}

@section('main-content') {{-- Membuka gerbang konten --}}

<!-- Bagian Atas: Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Manajemen Kafe</h1>
</div>

<!-- Baris Kartu Statistik (Gaya khas SB Admin 2) -->
<div class="row">

    <!-- Total Menu Card -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Varian Menu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMenu }} Item</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pesanan Card -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pesanan Masuk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPesanan }} Transaksi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pendapatan Card -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Pendapatan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Transaksi Terbaru (Gaya DataTables SB Admin 2) -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> 5 Transaksi Terbaru Hari Ini</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Menu Produk</th>
                        <th>Jumlah Beli</th>
                        <th>Total Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                    <tr>
                        <td class="font-weight-bold">{{ $order->customer_name }}</td>
                        <td>{{ $order->menu->menu_name ?? 'Menu Terhapus' }}</td>
                        <td>{{ $order->quantity }}x</td>
                        <td class="text-success font-weight-bold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection {{-- Menutup gerbang konten --}}