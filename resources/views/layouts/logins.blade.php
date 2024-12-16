<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login') - RasaLocal</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/png">
    <script>
        function handleLogin(event) {
            event.preventDefault(); 
            const staticUsername = 'admin';
            const staticPassword = 'admin';

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (username === staticUsername && password === staticPassword) {
                window.location.href = "{{ url('/') }}";
            } else {
                const errorMessage = document.getElementById('error-message');
                errorMessage.textContent = 'Invalid username or password.';
                errorMessage.style.display = 'block';
            }
        }
    </script>
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo RasaLocal" class="logo-image">
                <span class="logo">RasaLocal.</span>
            </div>
            <ul class="nav-menu">
                <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ url('/menu') }}" class="{{ Request::is('menu') ? 'active' : '' }}">Menu</a></li>
                <li><a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>
            <div class="navbar-right">
                <a href="{{ url('/login') }}" class="nav-icon active">Login</a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
    
</body>
</html>
