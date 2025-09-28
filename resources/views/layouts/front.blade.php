<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IT-Koncept SA - Stockage de Pneus Mercedes-Benz')</title>
    <meta name="description" content="@yield('meta_description', 'Solution professionnelle de stockage de pneus Mercedes-Benz. Traçabilité QR, sécurité premium, logistique optimisée.')">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'IT-Koncept SA - Stockage de Pneus Mercedes-Benz')">
    <meta property="og:description" content="@yield('meta_description', 'Solution professionnelle de stockage de pneus Mercedes-Benz.')">
    <meta property="og:image" content="{{ url('frontend/assets/img/logo.webp') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="@yield('title', 'IT-Koncept SA - Stockage de Pneus Mercedes-Benz')">
    <meta property="twitter:description" content="@yield('meta_description', 'Solution professionnelle de stockage de pneus Mercedes-Benz.')">
    <meta property="twitter:image" content="{{ asset('frontend/assets/img/logo.webp') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('frontend/assets/img/apple-touch-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ url('frontend/assets/css/main.css') }}" rel="stylesheet">
    
    @stack('styles')
    
    <style>
        :root {
            --primary-color: #181818;
            --accent-color: #ff9100;
            --text-color: #333;
            --light-bg: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
        }
        
        /* Navbar Styles */
        .navbar {
            background: rgba(24, 24, 24, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            padding: 0.5rem 0;
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: white !important;
            text-decoration: none;
        }
        
        .navbar-brand .accent {
            color: var(--accent-color);
        }
        
        .navbar-nav .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            padding: 0.75rem 1rem !important;
            margin: 0 0.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--accent-color) !important;
            background: rgba(255,145,0,0.1);
            transform: translateY(-2px);
        }
        
        .navbar-nav .nav-link.active {
            color: var(--accent-color) !important;
            background: rgba(255,145,0,0.15);
        }
        
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        /* Dropdown Menu */
        .dropdown-menu {
            background: rgba(24, 24, 24, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,145,0,0.2);
            border-radius: 12px;
            margin-top: 0.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .dropdown-item {
            color: rgba(255,255,255,0.9);
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background: rgba(255,145,0,0.1);
            color: var(--accent-color);
        }
        
        /* Responsive */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(24, 24, 24, 0.98);
                border-radius: 12px;
                margin-top: 1rem;
                padding: 1rem;
            }
            
            .navbar-nav .nav-link {
                margin: 0.25rem 0;
                text-align: center;
            }
        }
        
        /* Toast Notifications */
        .toast-container {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 9999;
        }
        
        .toast {
            background: white;
            border-left: 4px solid var(--accent-color);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        /* Global Loader */
        .global-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(24, 24, 24, 0.9);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        
        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255,145,0,0.3);
            border-top: 3px solid var(--accent-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        /* Surcharge Bootstrap pour l'authentification */
        .modal .btn-primary,
        .modal .btn-primary:focus,
        .modal .btn-primary:active,
        .modal .btn-primary:hover {
            background: var(--accent-color) !important;
            border-color: var(--accent-color) !important;
            color: #fff !important;
            box-shadow: none !important;
        }
        .modal .btn-link,
        .modal .btn-link:focus,
        .modal .btn-link:active,
        .modal .btn-link:hover {
            color: var(--accent-color) !important;
            text-decoration: underline;
        }
        .modal .nav-tabs .nav-link.active {
            color: var(--accent-color) !important;
            border-color: var(--accent-color) var(--accent-color) #fff !important;
            background: #fff;
        }
        .modal .nav-tabs .nav-link {
            color: var(--primary-color) !important;
        }
        .modal .form-control:focus {
            border-color: var(--accent-color) !important;
            box-shadow: 0 0 0 0.2rem rgba(255,145,0,0.15) !important;
        }
        .modal .alert-info {
            border-color: var(--accent-color);
            color: var(--primary-color);
            background: rgba(255,145,0,0.07);
        }
        .modal .alert-success {
            border-color: var(--accent-color);
            color: var(--primary-color);
            background: rgba(255,145,0,0.12);
        }
    </style>
</head>
<body>
    <!-- Global Loader -->
    <div class="global-loader" id="globalLoader">
        <div class="loader-spinner"></div>
    </div>

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top" role="navigation" aria-label="Navigation principale">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}" aria-label="Accueil IT-Koncept SA">
                <i class="fas fa-tire fa-fw me-2"></i>
                IT-<span class="accent">Koncept</span>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Basculer la navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" role="menubar">
                    <li class="nav-item" role="none">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" 
                           href="{{ url('/') }}" role="menuitem">
                            <i class="fas fa-home fa-fw me-1"></i>Accueil
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown" role="none">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('front.services') ? 'active' : '' }}" 
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cogs fa-fw me-1"></i>Services
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="none">
                                <a class="dropdown-item" href="{{ route('front.services') }}" role="menuitem">
                                    <i class="fas fa-list fa-fw me-2"></i>Tous nos services
                                </a>
                            </li>
                            <li role="none">
                                <a class="dropdown-item" href="{{ route('front.statistics') }}" role="menuitem">
                                    <i class="fas fa-chart-bar fa-fw me-2"></i>Statistiques
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown" role="none">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('front.team') ? 'active' : '' }}" 
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-users fa-fw me-1"></i>Équipe
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="none">
                                <a class="dropdown-item" href="{{ route('front.team') }}" role="menuitem">
                                    <i class="fas fa-user-tie fa-fw me-2"></i>Notre équipe
                                </a>
                            </li>
                            <li role="none">
                                <a class="dropdown-item" href="{{ route('front.testimonials') }}" role="menuitem">
                                    <i class="fas fa-star fa-fw me-2"></i>Témoignages
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown" role="none">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('front.blog') ? 'active' : '' }}" 
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-newspaper fa-fw me-1"></i>Blog
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="none">
                                <a class="dropdown-item" href="{{ route('front.blog') }}" role="menuitem">
                                    <i class="fas fa-rss fa-fw me-2"></i>Actualités
                                </a>
                            </li>
                            <li role="none">
                                <a class="dropdown-item" href="{{ route('front.faq') }}" role="menuitem">
                                    <i class="fas fa-question-circle fa-fw me-2"></i>FAQ
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item" role="none">
                        <a class="nav-link {{ request()->routeIs('front.contact') ? 'active' : '' }}" 
                           href="{{ route('front.contact') }}" role="menuitem">
                            <i class="fas fa-envelope fa-fw me-1"></i>Contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/mobile/scanner') }}">
                            <i class="fas fa-qrcode"></i> Scanner un QR
                        </a>
                    </li>
                    <!-- Connexion en dernier -->
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#authModal">
                            <i class="fas fa-user-circle"></i> Connexion
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main role="main" style="padding-top: 80px;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="text-warning mb-3">
                        <i class="fas fa-tire fa-fw me-2"></i>IT-Koncept SA
                    </h5>
                    <p class="mb-3">Solution professionnelle de stockage de pneus Mercedes-Benz avec traçabilité QR et sécurité premium.</p>
                    <div class="social-links">
                        <a href="#" class="text-light me-3" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light me-3" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-light me-3" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h6 class="text-warning mb-3">Services</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('front.services') }}" class="text-light text-decoration-none">Stockage sécurisé</a></li>
                        <li><a href="{{ route('front.services') }}" class="text-light text-decoration-none">Gestion logistique</a></li>
                        <li><a href="{{ route('front.services') }}" class="text-light text-decoration-none">Conseil premium</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h6 class="text-warning mb-3">Entreprise</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('front.about') }}" class="text-light text-decoration-none">À propos</a></li>
                        <li><a href="{{ route('front.team') }}" class="text-light text-decoration-none">Notre équipe</a></li>
                        <li><a href="{{ route('front.testimonials') }}" class="text-light text-decoration-none">Témoignages</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h6 class="text-warning mb-3">Support</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('front.contact') }}" class="text-light text-decoration-none">Contact</a></li>
                        <li><a href="{{ route('front.faq') }}" class="text-light text-decoration-none">FAQ</a></li>
                        <li><a href="{{ route('front.legal') }}" class="text-light text-decoration-none">Mentions légales</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h6 class="text-warning mb-3">Contact</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone fa-fw me-2"></i>+41 22 123 45 67</li>
                        <li><i class="fas fa-envelope fa-fw me-2"></i>info@it-koncept.ch</li>
                        <li><i class="fas fa-map-marker-alt fa-fw me-2"></i>Genève, Suisse</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} IT-Koncept SA. Tous droits réservés.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        <i class="fas fa-shield-alt fa-fw me-1"></i>
                        Certifié Mercedes-Benz
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Toast Notification Function
        function showToast(message, type = 'success') {
            const toastContainer = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = `toast show`;
            toast.innerHTML = `
                <div class="toast-header">
                    <i class="fas fa-${type === 'success' ? 'check-circle text-success' : 'exclamation-triangle text-warning'} me-2"></i>
                    <strong class="me-auto">Notification</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">${message}</div>
            `;
            toastContainer.appendChild(toast);
            
            setTimeout(() => {
                toast.remove();
            }, 5000);
        }

        // Global Loader Function
        function showGlobalLoader() {
            document.getElementById('globalLoader').style.display = 'flex';
        }

        function hideGlobalLoader() {
            document.getElementById('globalLoader').style.display = 'none';
        }

        // Show success message if exists
        @if(session('success'))
            showToast('{{ session('success') }}', 'success');
        @endif

        @if(session('error'))
            showToast('{{ session('error') }}', 'error');
        @endif
    </script>
    
    @stack('scripts')

<!-- Auth Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <div class="w-100 text-center">
          <!-- Logo supprimé ici -->
          <h5 class="mt-2 mb-0" id="authModalLabel">Gestion Pneus</h5>
          <small class="text-warning">Espace professionnel Mercedes-Benz</small>
        </div>
        <button type="button" class="btn-close position-absolute end-0 top-0 m-3" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body pt-0">
        <ul class="nav nav-tabs justify-content-center mb-3" id="authTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-pane" type="button" role="tab">Connexion</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-pane" type="button" role="tab">Créer un compte</button>
          </li>
        </ul>
        <div class="tab-content" id="authTabContent">
          <!-- Login Tab -->
          <div class="tab-pane fade show active" id="login-pane" role="tabpanel">
            <form id="loginForm" autocomplete="on">
              @csrf
              <div class="mb-3">
                <label for="login-email" class="form-label">Adresse e-mail</label>
                <input type="email" name="email" id="login-email" class="form-control" placeholder="Votre e-mail" required autofocus>
                <div class="invalid-feedback" id="login-email-error"></div>
              </div>
              <div class="mb-3">
                <label for="login-password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="login-password" class="form-control" placeholder="Votre mot de passe" required>
                <div class="invalid-feedback" id="login-password-error"></div>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="login-remember">
                <label class="form-check-label" for="login-remember">Se souvenir de moi</label>
              </div>
              <button type="submit" class="btn btn-primary w-100 mb-2">Connexion</button>
              <div class="text-center">
                <a href="{{ route('password.request') }}" class="forgot-link">Mot de passe oublié ?</a>
              </div>
            </form>
          </div>
          <!-- Register Tab -->
          <div class="tab-pane fade" id="register-pane" role="tabpanel">
            <form id="registerForm" autocomplete="on">
              @csrf
              <div class="mb-3">
                <label for="register-name" class="form-label">Nom complet</label>
                <input type="text" name="name" id="register-name" class="form-control" placeholder="Votre nom complet" required>
                <div class="invalid-feedback" id="register-name-error"></div>
              </div>
              <div class="mb-3">
                <label for="register-email" class="form-label">Adresse e-mail</label>
                <input type="email" name="email" id="register-email" class="form-control" placeholder="Votre e-mail" required>
                <div class="invalid-feedback" id="register-email-error"></div>
              </div>
              <div class="mb-3">
                <label for="register-password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="register-password" class="form-control" placeholder="Mot de passe" required>
                <div class="invalid-feedback" id="register-password-error"></div>
              </div>
              <div class="mb-3">
                <label for="register-password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="register-password_confirmation" class="form-control" placeholder="Confirmez le mot de passe" required>
                <div class="invalid-feedback" id="register-password_confirmation-error"></div>
              </div>
              <button type="submit" class="btn btn-primary w-100 mb-2">Créer un compte</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
// Soumission AJAX du login
const loginForm = document.getElementById('loginForm');
if (loginForm) {
  loginForm.addEventListener('submit', function(e) {
    e.preventDefault();
    document.getElementById('login-email-error').textContent = '';
    document.getElementById('login-password-error').textContent = '';
    loginForm.querySelectorAll('.form-control').forEach(el => el.classList.remove('is-invalid'));
    const formData = new FormData(loginForm);
    fetch("{{ route('login') }}", {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
      },
      body: formData
    })
    .then(async response => {
      if (response.ok) {
        window.location.reload();
      } else if (response.status === 422) {
        const data = await response.json();
        if (data.errors) {
          if (data.errors.email) {
            document.getElementById('login-email-error').textContent = data.errors.email[0];
            document.getElementById('login-email').classList.add('is-invalid');
          }
          if (data.errors.password) {
            document.getElementById('login-password-error').textContent = data.errors.password[0];
            document.getElementById('login-password').classList.add('is-invalid');
          }
        }
      } else {
        showToast('Erreur lors de la connexion. Veuillez réessayer.', 'error');
      }
    })
    .catch(() => {
      showToast('Erreur réseau. Veuillez réessayer.', 'error');
    });
  });
}
// Soumission AJAX du register
const registerForm = document.getElementById('registerForm');
if (registerForm) {
  registerForm.addEventListener('submit', function(e) {
    e.preventDefault();
    document.getElementById('register-name-error').textContent = '';
    document.getElementById('register-email-error').textContent = '';
    document.getElementById('register-password-error').textContent = '';
    document.getElementById('register-password_confirmation-error').textContent = '';
    registerForm.querySelectorAll('.form-control').forEach(el => el.classList.remove('is-invalid'));
    const formData = new FormData(registerForm);
    fetch("{{ route('register') }}", {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
      },
      body: formData
    })
    .then(async response => {
      if (response.ok) {
        window.location.reload();
      } else if (response.status === 422) {
        const data = await response.json();
        if (data.errors) {
          if (data.errors.name) {
            document.getElementById('register-name-error').textContent = data.errors.name[0];
            document.getElementById('register-name').classList.add('is-invalid');
          }
          if (data.errors.email) {
            document.getElementById('register-email-error').textContent = data.errors.email[0];
            document.getElementById('register-email').classList.add('is-invalid');
          }
          if (data.errors.password) {
            document.getElementById('register-password-error').textContent = data.errors.password[0];
            document.getElementById('register-password').classList.add('is-invalid');
          }
          if (data.errors.password_confirmation) {
            document.getElementById('register-password_confirmation-error').textContent = data.errors.password_confirmation[0];
            document.getElementById('register-password_confirmation').classList.add('is-invalid');
          }
        }
      } else {
        showToast('Erreur lors de l\'inscription. Veuillez réessayer.', 'error');
      }
    })
    .catch(() => {
      showToast('Erreur réseau. Veuillez réessayer.', 'error');
    });
  });
}

// Ouvre la modale automatiquement si ?auth=login ou ?auth=register dans l'URL
(function() {
  const params = new URLSearchParams(window.location.search);
  if (params.get('auth') === 'login' || params.get('auth') === 'register') {
    const authModal = new bootstrap.Modal(document.getElementById('authModal'));
    authModal.show();
    if (params.get('auth') === 'register') {
      setTimeout(function() {
        document.getElementById('register-tab').click();
      }, 300);
    }
  }
})();
</script>
@endpush
</body>
</html> 
