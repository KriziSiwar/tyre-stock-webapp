<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentification') - Gestion Pneus</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    <style>
        body.login-page, body.register-page {
            background: #f4f6f9;
        }
        .login-logo img, .register-logo img {
            max-width: 120px;
        }
    </style>
    @stack('styles')
</head>
<body class="hold-transition @yield('body-class', 'register-page')">
<div class="register-box">
    <div class="register-logo">
        <a href="/">
            <img src="/public/frontend/assets/img/logo.webp" alt="Logo Mercedes" class="mb-2">
            <b>Gestion</b> Pneus
        </a>
    </div>
    <!-- Contenu principal -->
    <div class="card">
        <div class="card-body register-card-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- AdminLTE JS -->
<script src="/vendor/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/vendor/adminlte/dist/js/adminlte.min.js"></script>
@stack('scripts')
</body>
</html> 