@extends('adminlte::page')

@section('title', 'Ajouter un véhicule')

@section('content_header')
    <h1>Ajouter un véhicule</h1>
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
    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="chassis_number">Numéro de châssis *</label>
            <input type="text" name="chassis_number" class="form-control" required value="{{ old('chassis_number') }}">
        </div>
        <div class="form-group">
            <label for="marque">Marque *</label>
            <input type="text" name="marque" class="form-control" required value="{{ old('marque') }}">
        </div>
        <div class="form-group">
            <label for="modele">Modèle *</label>
            <input type="text" name="modele" class="form-control" required value="{{ old('modele') }}">
        </div>
        <div class="form-group">
            <label for="year">Année</label>
            <input type="number" name="year" class="form-control" value="{{ old('year') }}">
        </div>
        <div class="form-group">
            <label for="color">Couleur</label>
            <input type="text" name="color" class="form-control" value="{{ old('color') }}">
        </div>
        <div class="form-group">
            <label for="owner_name">Nom du propriétaire</label>
            <input type="text" name="owner_name" class="form-control" value="{{ old('owner_name') }}">
        </div>
        <div class="form-group">
            <label for="owner_phone">Téléphone du propriétaire</label>
            <input type="text" name="owner_phone" class="form-control" value="{{ old('owner_phone') }}">
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection 