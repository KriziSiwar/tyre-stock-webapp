@extends('layouts.adminlte')

@section('title', 'Inscription')
@section('body-class', 'register-page')

@section('content')
<p class="login-box-msg">Créer un nouveau compte</p>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Nom complet" required autofocus>
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user"></span></div>
        </div>
        @error('name')
            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <div class="input-group mb-3">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Adresse e-mail" required>
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
        </div>
        @error('email')
            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe" required>
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
        </div>
        @error('password')
            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <div class="input-group mb-3">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmer le mot de passe" required>
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <a href="{{ route('login') }}" class="text-center">Déjà inscrit ?</a>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
        </div>
    </div>
</form>
@endsection
