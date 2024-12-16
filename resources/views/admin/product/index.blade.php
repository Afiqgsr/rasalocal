@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Produk</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Tambah Produk</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($product->foto)
                    <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama }}" width="100">
                    @else
                    <span>Tidak ada foto</span>
                    @endif
                </td>
                <td>{{ $product->nama }}</td>
                <td>{{ $product->deskripsi }}</td>
                <td>{{ formatRupiah($product->harga) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
