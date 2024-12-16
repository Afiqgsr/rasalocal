@extends('layouts.tentang')

@section('title', 'About')

@section('content')
    <!-- About Section -->
    <section class="about">
        <h1>About Us</h1>
        <p>RasaLocal adalah toko oleh-oleh khas Madiun yang menghadirkan cita rasa lokal dengan kualitas terbaik.</p>
    </section>

    <!-- Team Section -->
    <section class="team">
        <h2>Tim Pembuat</h2>
        <div class="team-members">
            <div class="team-member">
                <img src="{{ asset('images/person_1.jpg') }}" alt="Anggota Tim 1" class="team-photo">
                <h3>Nama Anggota 1</h3>
                <p>Deskripsi singkat tentang anggota tim 1.</p>
            </div>
            <div class="team-member">
                <img src="{{ asset('images/person_2.jpg') }}" alt="Anggota Tim 2" class="team-photo">
                <h3>Nama Anggota 2</h3>
                <p>Deskripsi singkat tentang anggota tim 2.</p>
            </div>
            <div class="team-member">
                <img src="{{ asset('images/person_3.jpg') }}" alt="Anggota Tim 3" class="team-photo">
                <h3>Nama Anggota 3</h3>
                <p>Deskripsi singkat tentang anggota tim 3.</p>
            </div>
        </div>
    </section>
    @endsection