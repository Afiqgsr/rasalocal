@extends('layouts.contacts')

@section('title', 'Contact Us')

@section('content')
    <!-- Contact Section -->
    <section class="contact">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you! Reach out to us directly through WhatsApp or fill out the contact form below.</p>
        
        <div class="contact-info">
            <h2>Reach us via WhatsApp</h2>
            <p>Click below to start a conversation with us:</p>
            <a href="https://wa.me/+6285604030757?text=Halo,%20saya%20tertarik%20dengan%20produk%20Anda" target="_blank" class="whatsapp-link">Start WhatsApp Chat</a>
        </div>

        <div class="contact-form">
            <h2>Or, send us a message</h2>
            <form id="contactForm" method="POST">
                @csrf
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required placeholder="Enter your name">
                
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">

                <label for="message">Your Message</label>
                <textarea id="message" name="message" required placeholder="Write your message here" rows="4"></textarea>

                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>

        <div class="map">
            <h2>Visit Us</h2>
            <p>Find us on the map below:</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.8982058827214!2d115.17446667476621!3d-8.701216388660999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd246da827769c9%3A0xbfecdadb1a98fe37!2sRasaLokal%20Bali!5e0!3m2!1sid!2sid!4v1733671798680!5m2!1sid!2sid" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <script>
        // Menangani form submit untuk mengirimkan pesan ke WhatsApp
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form dari submit default

            // Mendapatkan nilai dari form
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var message = document.getElementById('message').value;

            // Membuat pesan yang ingin dikirim ke WhatsApp dengan format yang rapi
            var whatsappMessage = encodeURIComponent(
                'Halo, saya ingin menghubungi Anda. Berikut adalah informasi saya:\n\n' +
                'Nama: ' + name + '\n' +
                'Email: ' + email + '\n' +
                'Pesan: ' + message
            );

            // URL WhatsApp dengan pesan
            var whatsappUrl = 'https://wa.me/+6285604030757?text=' + whatsappMessage;

            // Redirect ke WhatsApp
            window.open(whatsappUrl, '_blank');
        });
    </script>
@endsection
