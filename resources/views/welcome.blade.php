<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - RasaLocal</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/png">
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <img src="images/logo.jpg" alt="Logo RasaLocal" class="logo-image">
                <span class="logo">RasaLocal.</span>
            </div>
            <ul class="nav-menu">
            <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ url('/login') }}" class="{{ Request::is('menu') ? 'active' : '' }}">Menu</a></li>
                    <li><a href="{{ url('/login') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a></li>
                    <li><a href="{{ url('/login') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>
            <div class="navbar-right">
                <a href="{{ url('/login') }}" class="nav-icon">Login</a>
                <a href="{{ url('/register') }}" class="nav-icon">Register</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Sentra Oleh-Oleh <br>Brem Khas Madiun</h1>
            <p>Menemukan citarasa asli Madiun yang menggoda selera.</p>
            <div class="hero-buttons">
                <a href="https://wa.me/+6285604030757?text=Halo,%20saya%20tertarik%20dengan%20produk%20Anda" target="_blank" class="btn shop-now">Shop Now</a>
                <a href="{{ url('/menu') }}" class="btn explore">Explore</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="images/brem.jpg" alt="Brem Khas Madiun">
        </div>
    </section>

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
</body>
</html>
