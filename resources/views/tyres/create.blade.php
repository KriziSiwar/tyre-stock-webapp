@extends('adminlte::page')

@section('title', 'Ajouter un pneu')

@section('content_header')
    <h1>Ajouter un pneu</h1>
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
    <form action="{{ route('tyres.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="vehicle_id">Véhicule *</label>
            <select name="vehicle_id" class="form-control" required>
                <option value="">-- Sélectionner un véhicule --</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>
                        {{ $vehicle->chassis_number }} ({{ $vehicle->marque }} {{ $vehicle->modele }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="locker_id">Casier</label>
            <select name="locker_id" class="form-control">
                <option value="">-- Hors casier --</option>
                @foreach($lockers as $locker)
                    <option value="{{ $locker->id }}" {{ old('locker_id') == $locker->id ? 'selected' : '' }}>
                        {{ $locker->code }} ({{ $locker->location }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="dimension">Dimension *</label>
            <input type="text" name="dimension" class="form-control" required value="{{ old('dimension') }}">
        </div>
        <div class="form-group">
            <label for="type">Type *</label>
            <input type="text" name="type" class="form-control" required value="{{ old('type') }}">
        </div>
        <div class="form-group">
            <label for="wear">Usure *</label>
            <input type="text" name="wear" class="form-control" required value="{{ old('wear') }}">
        </div>
        <div class="form-group">
            <label for="season">Saison</label>
            <input type="text" name="season" class="form-control" value="{{ old('season') }}">
        </div>
        <div class="form-group">
            <label for="qr_code">QR Code (optionnel)</label>
            <input type="text" name="qr_code" class="form-control" value="{{ old('qr_code') }}">
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('tyres.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection 