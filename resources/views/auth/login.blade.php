<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Gestion Pneus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #181818 0%, #232526 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: rgba(255,255,255,0.97);
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 400px;
            width: 100%;
            margin: 2rem auto;
        }
        .login-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 1rem;
        }
        .brand-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #181818;
            margin-bottom: 0.5rem;
        }
        .brand-subtitle {
            font-size: 1.1rem;
            color: #ff9100;
            margin-bottom: 2rem;
            font-weight: 500;
        }
        .form-label {
            font-weight: 600;
            color: #181818;
        }
        .form-control {
            border-radius: 10px;
            padding: 0.9rem 1rem;
            font-size: 1.05rem;
        }
        .btn-primary {
            background: #ff9100;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 0.8rem 0;
        }
        .btn-primary:hover {
            background: #e67e00;
        }
        .forgot-link {
            color: #ff9100;
            text-decoration: none;
            font-size: 0.98rem;
        }
        .forgot-link:hover {
            text-decoration: underline;
        }
        @media (max-width: 500px) {
            .login-container {
                padding: 1.5rem 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="text-center mb-3">
            <img src="/public/frontend/assets/img/logo.webp" alt="Logo Mercedes" class="login-logo">
            <div class="brand-title">Gestion Pneus</div>
            <div class="brand-subtitle">Espace professionnel Mercedes-Benz</div>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Votre e-mail" required autofocus>
                @error('email')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Votre mot de passe" required>
                @error('password')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Connexion</button>
            <div class="text-center">
                <a href="{{ route('password.request') }}" class="forgot-link">Mot de passe oublié ?</a>
            </div>
        </form>
    </div>
</body>
</html>
