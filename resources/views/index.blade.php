<!-- resources/views/index.blade.php -->

@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Sentra Oleh-Oleh <br>Brem Khas Madiun</h1>
            <p>Menemukan citarasa asli Madiun yang menggoda selera.</p>
            <div class="hero-buttons">
                <a href="https://wa.me/+6285604030757?text=Halo,%20saya%20tertarik%20dengan%20produk%20Anda" target="_blank" class="btn shop-now">Shop Now</a>
                <a href="{{ url('/menu') }}" class="btn explore">Explore</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/brem.jpg') }}" alt="Brem Khas Madiun">
        </div>
    </section>
@endsection
