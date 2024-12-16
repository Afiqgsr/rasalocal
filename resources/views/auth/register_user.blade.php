@extends('layouts.logins')

@section('title', 'Register Pengguna')

@section('content')
<section class="content">
    <h1>Register Pengguna</h1>
    <form action="{{ route('register.user') }}" method="POST">
        @csrf
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Masukkan email Anda">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Masukkan password Anda">

        <button type="submit">Daftar</button>
    </form>
</section>
@endsection
