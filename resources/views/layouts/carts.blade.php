<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('css/carts.css') }}">
        

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
            @yield('content')
            </main>

            
    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 RasaLocal. All Rights Reserved.</p>
            <ul class="social-links">
                <li><a href="https://wa.me/your-number"><img src="images/whatssapp.png" alt="WhatsApp"></a></li>
            <!-- <li><a href="#"><img src="images/instagram.png" alt="Instagram"></a></li>
                <li><a href="#"><img src="images/twitter.png" alt="Twitter"></a></li> -->
            </ul>
        </div>
    </footer>
        </div>
    </body>
</html>
