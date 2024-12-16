@extends('layouts.logins')

@section('title', 'Register Admin')

@section('content')
<section class="content">
    <h1>Register Admin</h1>
    <form action="{{ route('register.admin') }}" method="POST">
        @csrf
        <label for="name">Nama Lengkap:</label>
        <input type="text" id="name" name="name" required placeholder="Masukkan nama lengkap Anda">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Masukkan email Anda">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Masukkan password Anda">

        <label for="admin_code">Kode Admin:</label>
        <input type="text" id="admin_code" name="admin_code" required placeholder="Masukkan kode admin">

        <button type="submit">Daftar Sebagai Admin</button>
    </form>
</section>
@endsection
