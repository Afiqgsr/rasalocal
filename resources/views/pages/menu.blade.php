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
                <button class="btn" onclick="addToCart({{ $item->id }}, '{{ $item->title }}', {{ $item->price }}, '{{ $item->image }}')">Tambah ke Keranjang</button>
            </div>
        @endforeach
    </div>
</section>

<section class="cart">
    <h2>Keranjang</h2>
    <div id="cartContainer">
        <p>Memuat keranjang...</p>
    </div>
    <div id="cartTotal">
        <h3>Total Harga: Rp 0</h3>
    </div>
    <button class="btn" onclick="checkout()">Checkout</button>
</section>

<script>
let cart = [];

// Tampilkan keranjang dari server
function loadCart() {
    fetch('/cart')
        .then(response => response.json())
        .then(cartItems => {
            cart = cartItems.map(item => ({
                id: item.menu_id,
                title: item.title,
                price: item.price,
                quantity: item.quantity,
                image: item.image || ''
            }));
            updateCart();
        });
}

// Tambahkan item ke keranjang
function addToCart(id, title, price, image) {
    const existingItem = cart.find(item => item.id === id);

    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({ id, title, price, image, quantity: 1 });
    }

    updateCart();
}

// Hapus item dari keranjang
function removeFromCart(menuId) {
    fetch('/cart/remove', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ menu_id: menuId }),
    })
    .then(response => response.json())
    .then(data => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: data.message,
        });
        loadCart();
    });
}

// Checkout
function checkout() {
    if (cart.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Keranjang Kosong',
            text: 'Silakan tambahkan item ke keranjang sebelum checkout!',
        });
        return;
    }

    let total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);

    fetch('/cart/checkout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ cart, total }),
    })
    .then(response => response.json())
    .then(data => {
        Swal.fire({
            icon: 'success',
            title: 'Checkout Berhasil',
            text: data.message,
        });
        cart = [];
        updateCart();
    })
    .catch(error => console.error('Error:', error));
}

// Update tampilan keranjang
function updateCart() {
    const cartContainer = document.getElementById("cartContainer");
    const cartTotal = document.getElementById("cartTotal");
    cartContainer.innerHTML = "";

    if (cart.length === 0) {
        cartContainer.innerHTML = "<p>Keranjang Anda kosong.</p>";
        cartTotal.innerHTML = "<h3>Total Harga: Rp 0</h3>";
        return;
    }

    let total = 0;

    cart.forEach(item => {
        total += item.price * item.quantity;

        const cartItem = `
            <div class="cart-item">
                <img src="/storage/${item.image}" alt="${item.title}">
                <div>
                    <h3>${item.title}</h3>
                    <p>Rp ${item.price.toLocaleString('id-ID')} x ${item.quantity}</p>
                    <button onclick="removeFromCart(${item.id})">Hapus</button>
                </div>
            </div>
        `;
        cartContainer.innerHTML += cartItem;
    });

    cartTotal.innerHTML = `<h3>Total Harga: Rp ${total.toLocaleString('id-ID')}</h3>`;
}

loadCart();
</script>
@endsection
