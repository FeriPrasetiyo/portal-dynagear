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
            padding: 16px;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            border: 0;
            border-radius: 24px;
            overflow: hidden;
        }

        .logo-box {
            width: 92px;
            height: 92px;
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            box-shadow: 0 10px 24px rgba(0,0,0,0.18);
            overflow: hidden;
        }

        .login-logo {
            width: 86px;
            height: 86px;
            object-fit: cover;
            border-radius: 50%;
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

        @include('auth.partials.login-logo')

        @include('auth.partials.login-form')

    </div>
</div>

</body>
</html>