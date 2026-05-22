@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Edit Menu</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Menu</h6>
    </div>
    <div class="card-body">
        @include('menu._menu-form', [
            'action' => route('menu.update', $menu),
            'method' => 'PUT',
            'categories' => $categories,
            'menu' => $menu,
            'submitText' => 'Perbarui Menu'
        ])
    </div>
</div>

@endsection