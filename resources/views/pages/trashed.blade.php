@extends('layouts.app')

@section('title', 'Data Menu Terhapus')

@section('content')
<h1 class="mb-4">Data Menu Terhapus</h1>

@if($trashedItems->isEmpty())
    <p>Tidak ada data menu yang telah dihapus.</p>
@else
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
            @foreach($trashedItems as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <form action="{{ route('crud.restore', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success">Pulihkan</button>
                        </form>
                        <form action="{{ route('crud.force-delete', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus permanen?')">Hapus Permanen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
