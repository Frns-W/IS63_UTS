@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800"> Riwayat Transaksi Penjualan</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Log Semua Data Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Nota ID</th>
                        <th>Pelanggan</th>
                        <th>Kategori</th>
                        <th>Menu Item</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Metode</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td class="font-weight-bold">{{ $order->customer_name }}</td>
                        <td><span class="badge badge-secondary">{{ $order->menu->category->name ?? 'N/A' }}</span></td>
                        <td>{{ $order->menu->menu_name ?? 'Item Dihapus' }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td class="text-success font-weight-bold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td><span class="badge badge-info">{{ $order->payment_method }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination SB Admin 2 / Bootstrap -->
        <div class="mt-3 d-flex justify-content-center">
            {{ $orders->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@endsection