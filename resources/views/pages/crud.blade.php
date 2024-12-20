@extends('layouts.app')

@section('title', 'Halaman CRUD')

@section('content')
<h1 class="mb-4">Halaman CRUD</h1>

@if(auth()->user()->hasRole('admin'))
    <p>Selamat datang, Admin!</p>

    <!-- Tombol Tambah -->
   
        <div class="mb-4">
            <a href="{{ route('crud.create') }}" class="btn btn-primary">Tambah Menu Baru</a>
        </div>
    

    <!-- Tabel Data -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menuItems as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <a href="{{ route('crud.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('crud.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Anda tidak memiliki akses ke halaman ini.</p>
@endif

@endsection
