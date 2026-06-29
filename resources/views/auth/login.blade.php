<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal Dynagear</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a, #1d4ed8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            border: 0;
            border-radius: 24px;
            overflow: hidden;
        }

        .logo-box {
            width: 80px;
            height: 80px;
            border-radius: 22px;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            margin: 0 auto 18px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 14px;
        }

        .btn-login {
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="card login-card shadow-lg">
    <div class="card-body p-4 p-md-5">

        <div class="text-center mb-4">
            <div class="logo-box">
                🔐
            </div>

            <h3 class="fw-bold mb-1">
                Portal Dynagear
            </h3>

            <p class="text-muted mb-0">
                Login untuk akses semua sistem
            </p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                Email atau password salah.
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Email
                </label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email') }}"
                       placeholder="contoh: admin@dynagear.com"
                       required
                       autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Password
                </label>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Masukkan password"
                       required>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <label class="form-check-label text-muted">
                    <input type="checkbox"
                           name="remember"
                           class="form-check-input">
                    Remember me
                </label>
            </div>

            <button type="submit"
                    class="btn btn-primary btn-login w-100">
                Masuk Portal
            </button>
        </form>

    </div>
</div>

</body>
</html>