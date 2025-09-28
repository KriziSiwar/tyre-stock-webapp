@extends('layouts.front')
@section('title', 'Vérification de l\'adresse e-mail')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
            <div class="card shadow-lg border-0 rounded-4 p-4">
                <div class="text-center mb-4">
                    <img src="/frontend/assets/img/logo.webp" alt="Logo Mercedes" style="width:70px; height:70px; object-fit:contain;">
                    <h2 class="mt-3 mb-1" style="font-weight:700; color:#181818;">Vérification de votre e-mail</h2>
                    <p class="text-warning mb-0" style="font-size:1.1rem;">Merci de confirmer votre adresse pour activer votre espace professionnel Mercedes-Benz.</p>
                </div>
                <div class="card-body pt-0">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un nouveau lien de vérification a été envoyé à votre adresse e-mail.
                        </div>
                    @endif
                    <div class="mb-3" style="font-size:1.08rem;">
                        Avant de continuer, veuillez vérifier votre boîte mail et cliquer sur le lien de confirmation.<br>
                        <span class="text-muted">(Pensez à vérifier vos spams ou courriers indésirables.)</span>
                    </div>
                    <div class="mb-3">
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="fas fa-envelope"></i> Renvoyer l'e-mail de vérification
                            </button>
                        </form>
                    </div>
                    <div class="text-center mt-4">
                        <a href="/" class="btn btn-link text-warning"><i class="fas fa-home"></i> Retour à l'accueil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
