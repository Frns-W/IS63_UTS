@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Order & Riwayat Transaksi Penjualan</h1>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Order Baru</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="customer_name">Nama Pelanggan</label>
                    <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ old('customer_name') }}" placeholder="Contoh: Budi" required>
                </div>

                <div class="form-group col-md-4">
                    <label for="menu_id">Pilih Menu</label>
                    <select name="menu_id" id="menu_id" class="form-control" required>
                        <option value="">-- Pilih Menu --</option>
                        @foreach($menus as $menu)
                            <option value="{{ $menu->id }}" {{ old('menu_id') == $menu->id ? 'selected' : '' }}>
                                {{ $menu->menu_name }} - Rp {{ number_format($menu->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="quantity">Jumlah</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', 1) }}" min="1" required>
                </div>

                <div class="form-group col-md-2">
                    <label for="payment_method">Metode Bayar</label>
                    <select name="payment_method" id="payment_method" class="form-control" required>
                        <option value="Cash" {{ old('payment_method') == 'Cash' ? 'selected' : '' }}>Cash</option>
                        <option value="QRIS" {{ old('payment_method') == 'QRIS' ? 'selected' : '' }}>QRIS</option>
                        <option value="Transfer" {{ old('payment_method') == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                    </select>
                </div>
            </div>

            <div class="form-row align-items-end">
                <div class="form-group col-md-4">
                    <label for="order_date">Tanggal Order</label>
                    <input type="date" name="order_date" id="order_date" class="form-control" value="{{ old('order_date', now()->toDateString()) }}">
                </div>
                <div class="form-group col-md-8">
                    <button type="submit" class="btn btn-primary">Simpan Order</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection