@extends('layouts.adminlte-app')

@section('title', 'Mon profil')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white"><h5 class="mb-0">Mon profil</h5></div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">Nom</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                        @error('name')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                        @error('email')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Nouveau mot de passe <small>(laisser vide pour ne pas changer)</small></label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 