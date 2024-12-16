@extends('layouts.logins')

@section('title', 'login')

@section('content')

    <!-- Login Section -->
    <section class="content">
        <h1>Login</h1>

        <!-- Error Message -->
        @if ($errors->any())
            <div id="error-message" style="color: red; margin-bottom: 20px;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @else
            <div id="error-message" style="color: red; display: none;"></div>
        @endif

        <!-- Login Form -->
        <form onsubmit="handleLogin(event)">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required placeholder="Enter your username">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">

            <button type="submit">Login</button>
        </form>

        <!-- Register Section -->
        <div class="register-links" style="margin-top: 20px;">
            <p>Belum punya akun?</p>
            <a href="{{ route('register.user') }}" class="btn">Register Pengguna</a><br>
            <a href="{{ route('register.admin') }}" class="btn">Register Admin</a>
        </div>
    </section>

    <!-- JavaScript -->
    <script>
        function handleLogin(event) {
            event.preventDefault(); // Prevent form submission
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (!username || !password) {
                const errorMessage = document.getElementById('error-message');
                errorMessage.style.display = 'block';
                errorMessage.innerText = 'Username dan password wajib diisi.';
                return;
            }

            // Simulasi login - sesuaikan dengan backend Anda
            console.log('Login data:', { username, password });
            // Lakukan pengiriman data ke server atau pengalihan halaman di sini
        }
    </script>

@endsection
