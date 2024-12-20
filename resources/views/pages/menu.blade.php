@extends('layouts.menus')

@section('title', 'Menu Kami')

@section('content')

<section class="menu">
    <h1>Menu Kami</h1>
    <p>Jelajahi berbagai pilihan makanan khas Madiun:</p>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Cari Menu..." onkeyup="searchMenu()">
    </div>

    <div class="menu-grid" id="menuGrid">
        @foreach($menuItems as $item)
            <div class="card">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" />
                <h3>{{ $item->title }}</h3>
                <p>{{ $item->description }}</p>
                <p class="price">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                <button class="btn" onclick="addToCart({{ $item->id }}, '{{ $item->title }}', {{ $item->price }})">
                    Tambah ke Keranjang
                </button>
            </div>
        @endforeach
    </div>
</section>


<script>
    // Fungsi untuk menambahkan item ke keranjang
    function addToCart(id, title, price) {
        fetch('/cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                menu_id: id,
                title: title,
                price: price,
                quantity: 1
            }),
        })
        .then(response => response.json())
        .then(data => {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: data.message,
            });
            loadCart(); // Perbarui tampilan keranjang
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Terjadi kesalahan saat menambahkan ke keranjang.',
            });
            console.error('Error:', error);
        });
    }

    // Fungsi untuk memuat keranjang dari database
    function loadCart() {
        fetch('/cart/data')
            .then(response => response.json())
            .then(cartItems => {
                const cartContainer = document.getElementById('cartContainer');
                const cartTotal = document.getElementById('cartTotal');
                cartContainer.innerHTML = '';
                let total = 0;

                if (cartItems.length === 0) {
                    cartContainer.innerHTML = '<p>Keranjang Anda kosong.</p>';
                    cartTotal.innerHTML = '<h3>Total Harga: Rp 0</h3>';
                    return;
                }

                

                cartTotal.innerHTML = `<h3>Total Harga: Rp ${total.toLocaleString('id-ID')}</h3>`;
            });
    }

    // Panggil loadCart saat halaman dimuat
    loadCart();
</script>
@endsection
