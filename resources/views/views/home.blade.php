<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugar & Spice Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #F9E5B3;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #FFD8A4;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            z-index: 1000;
            opacity: 1;
            transition: opacity 3s ease-in-out;
            animation: fadeOut 3s forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; }
        }

        .logo {
            text-align: center;
        }

        .logo img {
            width: 100px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            padding: 0;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            text-decoration: none;
            font-weight: bold;
            color: #333;
            padding: 8px 12px;
            border-radius: 4px;
            background-color: #fff;
        }

        nav ul li a:hover {
            background-color: #f4a261;
            color: white;
        }

        .user-auth {
            display: flex;
            gap: 20px;
        }

        .user-auth a {
            color: #333;
            text-decoration: none;
        }

        .hero {
            text-align: center;
            padding: 40px 0;
        }

        .hero img {
            max-width: 600px;
            width: 100%;
            border-radius: 8px;
        }

        .gallery {
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 20px 0;
        }

        .gallery-item img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        .info {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin: 40px 0;
        }

        .info-box {
            text-align: center;
        }

        .info-box h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .info-box p {
            margin-top: 0;
        }

        footer {
            background-color: #FFD8A4;
            text-align: center;
            padding: 20px;
            position: relative;
            width: 100%;
        }

        footer p {
            margin: 0;
            font-size: 12px;
        }
    </style>
</head>
<body>
    @if (session('message'))
        <div class="notification">
            {{ session('message') }}
        </div>
    @endif
    <header>
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Sugar & Spice Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Order Online</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Workshops</a></li>
            </ul>
        </nav>
        <div class="user-auth">
            <a href="{{route('login')}}">Log In</a>
            <a href="#">Cart</a>
            <a href="{{ route('login.admin') }}"> Login Admin</a>
        </div>
    </header>

    <main>
        <section class="hero">
            <img src="{{ asset('images/hero-cupcake.jpg') }}" alt="Hero Cupcake">
        </section>

        <section class="gallery">
            <div class="gallery-item">
                <img src="{{ asset('images/cupcake1.jpg') }}" alt="Cupcake 1">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/cupcake2.jpg') }}" alt="Cupcake 2">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/cupcake3.jpg') }}" alt="Cupcake 3">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/cupcake4.jpg') }}" alt="Cupcake 4">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/cupcake5.jpg') }}" alt="Cupcake 5">
            </div>
        </section>

        <section class="info">
            <div class="info-box">
                <h3>LIKE & FOLLOW</h3>
                <p><a href="#">Instagram</a> | <a href="#">Facebook</a></p>
            </div>
            <div class="info-box">
                <h3>OUR MENU</h3>
                <p><a href="#">Click Here</a></p>
            </div>
            <div class="info-box">
                <h3>COME VISIT US</h3>
                <p><a href="#">View Map</a></p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 by Sugar & Spice. All rights reserved.</p>
    </footer>

</body>
</html>
