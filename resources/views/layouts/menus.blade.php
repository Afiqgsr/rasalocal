<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            <p>&copy; {{ date('Y') }} RasaLocal. Semua Hak Cipta Dilindungi.</p>
            <p>Alamat: Jl. Raya Madiun No. 10, Madiun</p>
            <p>Email: info@rasalocal.com</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Function to search for menu items based on input
        function searchMenu() {
            let input = document.getElementById('searchInput').value.toLowerCase();
            let cards = document.querySelectorAll('.card');

            cards.forEach(card => {
                let title = card.querySelector('h3').innerText.toLowerCase();
                let description = card.querySelector('p').innerText.toLowerCase();

                if (title.includes(input) || description.includes(input)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
        </div>
    </body>
</html>

