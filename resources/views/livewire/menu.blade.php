@extends('layouts.menus')

@section('title', 'About')

@section('content')



    <!-- Menu Section -->
    <section class="menu">
        <h1>Menu Kami</h1>
        <p>Jelajahi berbagai pilihan makanan khas Madiun:</p>

        <!-- Search Bar -->
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Cari Menu..." onkeyup="searchMenu()">
        </div>

        <div class="menu-grid" id="menuGrid">
            @php
                $menuItems = [
                    ['image' => 'brem-1.png', 'title' => 'Brem Klasik', 'description' => 'Brem tradisional dengan cita rasa otentik khas Madiun.', 'price' => 25000],
                    ['image' => 'brem-2.png', 'title' => 'Brem Cokelat', 'description' => 'Varian modern dengan paduan rasa manis cokelat.', 'price' => 30000],
                    ['image' => 'brem-transformed.png', 'title' => 'Brem Cokelat', 'description' => 'Varian modern dengan paduan rasa manis cokelat.', 'price' => 30000],
                    ['image' => 'brem.jpg', 'title' => 'Brem Cokelat', 'description' => 'Varian modern dengan paduan rasa manis cokelat.', 'price' => 30000],
                    ['image' => 'brem-1.png', 'title' => 'Brem Cokelat', 'description' => 'Varian modern dengan paduan rasa manis cokelat.', 'price' => 30000],
                    ['image' => 'brem-2.png', 'title' => 'Brem Cokelat', 'description' => 'Varian modern dengan paduan rasa manis cokelat.', 'price' => 30000],
                ];
                
            @endphp
            @foreach($menuItems as $item)
                <div class="card">
                    <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['title'] }}">
                    <h3>{{ $item['title'] }}</h3>
                    <p>{{ $item['description'] }}</p>
                    <p class="price">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                    <a href="https://wa.me/082264070033" target="_blank" class="btn">Pesan Sekarang</a>
                </div>
            @endforeach
        </div>
    </section>

    @endsection