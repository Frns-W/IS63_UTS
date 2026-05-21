@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800"> Buku Menu Digital Kafe</h1>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Menu Kafe</h6>
        <a href="{{ route('menu.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Menu
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Kategori</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        @foreach($category->menus as $menu)
                            <tr>
                                <td><span class="badge badge-secondary">{{ $category->name }}</span></td>
                                <td class="font-weight-bold">{{ $menu->menu_name }}</td>
                                <td class="text-success font-weight-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                                <td>
                                    @if($menu->status == 'Ready')
                                        <span class="badge badge-success">Tersedia</span>
                                    @else
                                        <span class="badge badge-danger">Habis</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('menu.show', $menu) }}" class="btn btn-sm btn-info">Detail</a>
                                    <a href="{{ route('menu.edit', $menu) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('menu.destroy', $menu) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus menu ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection