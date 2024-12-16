<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('css/crud.css') }}">

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen d-flex flex-column bg-light">
            <!-- Navbar -->
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow py-3">
                    <div class="container">
                        <h1 class="h4">{{ $header }}</h1>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-fill py-4">
                <div class="container">
                    @yield('content')
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-dark text-white py-4 mt-auto">
                <div class="container text-center">
                    <p>&copy; {{ date('Y') }} RasaLocal. Semua Hak Cipta Dilindungi.</p>
                    <p>Alamat: Jl. Raya Madiun No. 10, Madiun</p>
                    <p>Email: info@rasalocal.com</p>
                </div>
            </footer>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Search Menu Script -->
        <script>
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
    </body>
</html>
