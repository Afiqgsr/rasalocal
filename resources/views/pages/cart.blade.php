@extends('layouts.carts')

@section('content')
    <div class="container">
        <h2>Keranjang Belanja</h2>

        @if ($cartItems->isEmpty())
            <p>Keranjang Anda kosong.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Item</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $grandTotal = 0; // Inisialisasi total harga
                    @endphp

                    @foreach ($cartItems as $item)
                        @php
                            $itemTotal = $item->price * $item->quantity; // Menghitung total harga item
                            $grandTotal += $itemTotal; // Menambahkan total item ke grandTotal
                        @endphp
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>
                                <!-- Form untuk mengedit jumlah -->
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control" style="width: 80px;">
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </form>
                            </td>
                            <td>Rp {{ number_format($itemTotal, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right">
                <h4>Total Harga: Rp {{ number_format($grandTotal, 0, ',', '.') }}</h4>

                <!-- Tombol Checkout yang mengarah ke WhatsApp -->
                <a href="https://wa.me/6281234567890?text={{ urlencode('Saya ingin melakukan pemesanan dengan rincian berikut:') }}%0A
                    @foreach ($cartItems as $item)
                        {{ urlencode($item->title . ' - ' . $item->quantity . ' x Rp ' . number_format($item->price, 0, ',', '.') . ' = Rp ' . number_format($item->price * $item->quantity, 0, ',', '.')) }}%0A
                    @endforeach
                    {{ urlencode('Total: Rp ' . number_format($grandTotal, 0, ',', '.')) }}" 
                   class="btn btn-primary">
                    Checkout via WhatsApp
                </a>
            </div>
        @endif
    </div>  
@endsection
