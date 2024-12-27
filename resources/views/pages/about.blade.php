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
                <img src="{{ asset('images/aku.jpg') }}" alt="Anggota Tim 1" class="team-photo">
                <h3>Afiq Galuh Setya Ramadhani</h3>
                <p>Back End.</p>
            </div>
            <div class="team-member">
                <img src="{{ asset('images/nab.jpg') }}" alt="Anggota Tim 2" class="team-photo">
                <h3>Nabila Carrissa Dewi</h3>
                <p>Front End</p>
            </div>
            <div class="team-member">
                <img src="{{ asset('images/azizah.jpg') }}" alt="Anggota Tim 3" class="team-photo">
                <h3>Nur Azizah Pagorante</h3>
                <p>Project Manager</p>
            </div>
        </div>
    </section>
    @endsection