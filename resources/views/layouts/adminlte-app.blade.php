<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tableau de bord') - Gestion Pneus</title>
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div id="global-loader" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:2000;background:rgba(255,255,255,0.6);align-items:center;justify-content:center;">
    <div class="spinner-border text-primary" role="status" style="width:3rem;height:3rem;">
        <span class="sr-only">Chargement...</span>
    </div>
</div>
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/admin') }}" class="nav-link">Tableau de bord</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge" id="notif-count">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="notif-dropdown">
                    <span class="dropdown-header" id="notif-header">Notifications</span>
                    <div id="notif-list">
                        <div class="dropdown-divider"></div>
                        <span class="dropdown-item text-center text-muted">Chargement...</span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="#" id="notif-mark-all" class="dropdown-item text-center text-primary">Tout marquer comme lu</a>
                    <a href="{{ route('notifications.index') }}" class="dropdown-item dropdown-footer">Voir toutes les notifications</a>
                </div>
            </li>
            <!-- User Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('profile.index') }}" class="dropdown-item">
                        <i class="fas fa-user-cog"></i> Mon profil
                    </a>
                    <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </a>
                </div>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('/admin') }}" class="brand-link">
            <img src="/public/frontend/assets/img/logo.webp" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Gestion Pneus</span>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <i class="fas fa-user-circle fa-2x text-white"></i>
                </div>
                <div class="info">
                    <a href="{{ route('profile.index') }}" class="d-block">{{ Auth::user()->name }}</a>
                    <span class="badge badge-info">{{ Auth::user()->role }}</span>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="@php
                            if(Auth::user()->role === 'logistique') echo url('/admin');
                            elseif(Auth::user()->role === 'direction') echo url('/users');
                            elseif(Auth::user()->role === 'bureau') echo url('/consultation-rapide');
                            else echo url('/home');
                        @endphp" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Accueil</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @if(Auth::user()->role === 'logistique')
                    <li class="nav-item">
                        <a href="{{ url('/vehicles') }}" class="nav-link"><i class="nav-icon fas fa-car"></i> <p>Véhicules</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/lockers') }}" class="nav-link"><i class="nav-icon fas fa-door-closed"></i> <p>Casiers</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/tyres') }}" class="nav-link"><i class="nav-icon fas fa-tire"></i> <p>Pneus</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/stock-movements') }}" class="nav-link"><i class="nav-icon fas fa-exchange-alt"></i> <p>Mouvements</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/reports') }}" class="nav-link"><i class="nav-icon fas fa-chart-bar"></i> <p>Rapports</p></a>
                    </li>
                    @endif
                    @if(Auth::user()->role === 'direction')
                    <li class="nav-item">
                        <a href="{{ url('/users') }}" class="nav-link"><i class="nav-icon fas fa-users"></i> <p>Utilisateurs</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/audits') }}" class="nav-link"><i class="nav-icon fas fa-history"></i> <p>Audit</p></a>
                    </li>
                    @endif
                    @if(Auth::user()->role === 'bureau')
                    <li class="nav-item">
                        <a href="{{ url('/consultation-rapide') }}" class="nav-link"><i class="nav-icon fas fa-search"></i> <p>Consultation rapide</p></a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    <footer class="main-footer text-center">
        <strong>&copy; {{ date('Y') }} Mercedes-Benz | Gestion Pneus.</strong> Tous droits réservés.
    </footer>
</div>
<script src="/vendor/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/vendor/adminlte/dist/js/adminlte.min.js"></script>
@stack('scripts')
<style>
button:focus, .btn:focus, a:focus {
    outline: 2px solid #007bff !important;
    outline-offset: 2px;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25) !important;
}
</style>
<script>
    function loadNotifications() {
        $.get('/notifications/unread-count', function(data) {
            $('#notif-count').text(data.count);
        });
        $.get('/notifications?ajax=1', function(html) {
            $('#notif-list').html(html);
        });
    }
    $(function() {
        loadNotifications();
        setInterval(loadNotifications, 30000); // refresh every 30s
        $('#notif-mark-all').on('click', function(e) {
            e.preventDefault();
            $.post('/notifications/read-all', {_token: '{{ csrf_token() }}'}, function() {
                loadNotifications();
            });
        });
    });

// Loader AJAX global
$(document).ajaxStart(function() {
    $('#global-loader').fadeIn(100);
}).ajaxStop(function() {
    $('#global-loader').fadeOut(100);
});
</script>
</body>
</html> 