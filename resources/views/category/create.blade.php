@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Tambah Kategori Baru</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kategori</h6>
    </div>
    <div class="card-body">
        @include('category._form', [
            'action' => route('categories.store'),
            'method' => 'POST',
            'submitText' => 'Simpan Kategori'
        ])
    </div>
</div>

@endsection
