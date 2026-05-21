@php
    $menuName = old('menu_name', $menu->menu_name ?? '');
    $price = old('price', $menu->price ?? '');
    $status = old('status', $menu->status ?? 'Ready');
    $categoryId = old('category_id', $menu->category_id ?? '');
    $method = $method ?? 'POST';
@endphp

<form action="{{ $action }}" method="POST">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <div class="form-group">
        <label for="category_id">Kategori Menu</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">Pilih Kategori</option>
            @foreach($categories as $categoryOption)
                <option value="{{ $categoryOption->id }}" {{ $categoryId == $categoryOption->id ? 'selected' : '' }}>
                    {{ $categoryOption->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="menu_name">Nama Menu</label>
        <input type="text" name="menu_name" id="menu_name" class="form-control" value="{{ $menuName }}" placeholder="Contoh: Espresso">
        @error('menu_name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">Harga</label>
        <input type="number" name="price" id="price" class="form-control" value="{{ $price }}" placeholder="Contoh: 25000">
        @error('price')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="Ready" {{ $status === 'Ready' ? 'selected' : '' }}>Ready</option>
            <option value="Sold Out" {{ $status === 'Sold Out' ? 'selected' : '' }}>Sold Out</option>
        </select>
        @error('status')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ $submitText }}</button>
    <a href="{{ route('menu.index') }}" class="btn btn-secondary">Kembali</a>
</form>
