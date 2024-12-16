@extends('layouts.cruds')

@section('title', 'Tambah Menu Baru')

@section('content')
<h1>Tambah Menu Baru</h1>

<!-- Formulir untuk Menambah Menu Baru -->
<form action="{{ route('crud.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
        <input type="text" name="title" id="title" class="border border-gray-300 p-2 w-full" required value="{{ old('title') }}">
        @error('title')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" id="description" rows="3" class="border border-gray-300 p-2 w-full">{{ old('description') }}</textarea>
        @error('description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
        <input type="number" name="price" id="price" class="border border-gray-300 p-2 w-full" required value="{{ old('price') }}">
        @error('price')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
        <input type="file" name="image" id="image" class="border border-gray-300 p-2 w-full">
        @error('image')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('crud.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
