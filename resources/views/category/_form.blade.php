@php
    $name = old('name', $category->name ?? '');
    $method = $method ?? 'POST';
@endphp

<form action="{{ $action }}" method="POST">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <div class="form-group">
        <label for="name">Nama Kategori</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $name }}" placeholder="Contoh: Coffee">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ $submitText }}</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
</form>
