<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Contact') - RasaLocal</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/png">
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo RasaLocal" class="logo-image">
                <span class="logo">RasaLocal.</span>
            </div>
            <div class="navbar-center">
                <ul class="nav-menu">
                    
                    <div class="navbar-right">
                <livewire:layout.navigation />
                    </div>
            </div>
                </ul>
            
            <!-- Livewire Navigation integrated here -->
            
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} RasaLocal. All rights reserved.</p>
        <p>Email: info@rasalocal.com | Phone: +62 123 456 789</p>
    </footer>
</body>
</html>
