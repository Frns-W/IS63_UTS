@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Detail Menu</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Informasi Menu</h6>
        <div>
            <a href="{{ route('menu.edit', $menu) }}" class="btn btn-sm btn-warning">Edit</a>
            <a href="{{ route('menu.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-borderless">
                    <tr>
                        <th>Kategori</th>
                        <td><span class="badge badge-secondary">{{ $menu->category->name ?? 'N/A' }}</span></td>
                    </tr>
                    <tr>
                        <th>Nama Menu</th>
                        <td class="font-weight-bold">{{ $menu->menu_name }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td class="text-success font-weight-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($menu->status == 'Ready')
                                <span class="badge badge-success">Tersedia</span>
                            @else
                                <span class="badge badge-danger">Habis</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection