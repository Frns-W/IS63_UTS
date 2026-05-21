@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Tambah Menu Baru</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Menu</h6>
    </div>
    <div class="card-body">
        @include('cafe._menu-form', [
            'action' => route('menu.store'),
            'method' => 'POST',
            'categories' => $categories,
            'submitText' => 'Simpan Menu'
        ])
    </div>
</div>

@endsection