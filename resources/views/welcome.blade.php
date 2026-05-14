<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JantaGarage</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            font-family: 'Instrument Sans', sans-serif;
        }

        /* Background with overlay */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('/images/m1 (2).png') no-repeat center/cover;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 80px;
            color: #fff;
        }

        /* Left content */
        .content {
            max-width: 500px;
        }

        .content h1 {
            font-size: 52px;
            margin-bottom: 15px;
        }

        .content p {
            font-size: 18px;
            color: #ddd;
            line-height: 1.6;
        }

        /* Buttons */
        .auth-buttons {
            display: flex;
            gap: 15px;
        }

        .auth-buttons a {
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: 500;
            transition: 0.3s;
        }

        .login-btn {
            border: 1px solid #fff;
            color: #fff;
        }

        .login-btn:hover {
            background: #fff;
            color: #000;
        }

        .register-btn {
            background: #ff6b00;
            color: #fff;
            border: none;
        }

        .register-btn:hover {
            background: #ff8c33;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                justify-content: center;
                text-align: center;
                padding: 20px;
            }

            .content h1 {
                font-size: 36px;
            }

            .auth-buttons {
                margin-top: 20px;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="hero">

        <!-- Left -->
        <div class="content">
            <h1>Welcome to JantaGarage</h1>
            <p>Your trusted bike service partner. Book washing, battery service, and more in just a few clicks.</p>
        </div>

        <!-- Right -->
        @if (Route::has('login'))
        <div class="auth-buttons">

            @auth
            <a href="{{ url('/dashboard') }}" class="login-btn">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="login-btn">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="register-btn">Register</a>
            @endif

            @endauth

        </div>
        @endif

    </div>

</body>

</html>