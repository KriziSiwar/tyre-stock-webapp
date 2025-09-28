@extends('adminlte::page')

@section('title', 'Modifier un utilisateur')

@section('content_header')
    <h1>Modifier un utilisateur</h1>
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom *</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
        </div>
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
        </div>
        <div class="form-group">
            <label for="role">Rôle *</label>
            <select name="role" class="form-control" required>
                <option value="">-- Sélectionner un rôle --</option>
                @foreach($roles as $role)
                    <option value="{{ $role }}" {{ old('role', $user->role) == $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="password">Nouveau mot de passe (laisser vide pour ne pas changer)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmer le nouveau mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection 