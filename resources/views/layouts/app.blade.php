<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Dynagear</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a, #1d4ed8);
            font-family: Arial, sans-serif;
        }

        .navbar-custom {
            background: rgba(255,255,255,.12);
            backdrop-filter: blur(12px);
        }

        .navbar-logo {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            background: #ffffff;
        }

        .hero-card {
            background: rgba(255,255,255,.95);
            border-radius: 24px;
        }

        .dashboard-logo-box {
            width: 78px;
            height: 78px;
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 24px rgba(0,0,0,0.14);
            overflow: hidden;
            flex: 0 0 auto;
        }

        .dashboard-logo {
            width: 72px;
            height: 72px;
            object-fit: cover;
            border-radius: 50%;
        }

        .portal-card {
            border: 0;
            border-radius: 24px;
            transition: .25s;
            overflow: hidden;
        }

        .portal-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 40px rgba(0,0,0,.25);
        }

        .icon-box {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
    <div class="container py-2">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2"
           href="{{ route('dashboard') }}">
            <img src="{{ asset('img/logo/dynagearlogo.jpg') }}"
                 alt="Dynagear Logo"
                 class="navbar-logo">

            <span>
                Portal Dynagear
            </span>
        </a>

        @auth
            <div class="ms-auto d-flex align-items-center gap-3 text-white">
                <span>{{ Auth::user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}" class="mb-0">
                    @csrf
                    <button class="btn btn-light btn-sm">
                        Logout
                    </button>
                </form>
            </div>
        @endauth
    </div>
</nav>

<main>
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>