@extends('layouts.cruds')

@section('title', 'Edit Menu')

@section('content')
    <h1>Edit Menu</h1>

    <!-- Formulir untuk Mengedit Menu -->
    <form action="{{ route('crud.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Menggunakan metode PUT untuk update -->
        
        <!-- Judul -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title', $menu->title) }}" required class="border border-gray-300 p-2 w-full" />
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="border border-gray-300 p-2 w-full">{{ old('description', $menu->description) }}</textarea>
        </div>

        <!-- Harga -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" name="price" id="price" value="{{ old('price', $menu->price) }}" required class="border border-gray-300 p-2 w-full" />
        </div>

        <!-- Gambar (jika ada) -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar (opsional)</label>
            <input type="file" name="image" id="image" class="border border-gray-300 p-2 w-full" />
            
            <!-- Menampilkan gambar lama jika ada -->
            @if($menu->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="Image" class="w-32 h-32 object-cover">
                    <p class="text-sm text-gray-500">Gambar yang ada saat ini</p>
                </div>
            @endif
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('crud.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
