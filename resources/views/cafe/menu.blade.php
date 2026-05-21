@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">📋 Buku Menu Digital Kafe</h1>

@foreach($categories as $category)
    <div class="mb-5">
        <h5 class="m-0 font-weight-bold text-primary border-bottom pb-2 mb-3">📁 Kategori: {{ $category->name }}</h5>
        <div class="row">
            @foreach($category->menus as $menu)
                <div class="col-lg-4 mb-4">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <h5 class="font-weight-bold text-gray-800 mb-1">{{ $menu->menu_name }}</h5>
                            <p class="text-success font-weight-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                            
                            @if($menu->status == 'Ready')
                                <span class="badge badge-success">Tersedia</span>
                            @else
                                <span class="badge badge-danger">Habis</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach

@endsection