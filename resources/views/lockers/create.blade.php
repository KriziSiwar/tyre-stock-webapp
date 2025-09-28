@extends('adminlte::page')

@section('title', 'Ajouter un casier')

@section('content_header')
    <h1>Ajouter un casier</h1>
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
    <form action="{{ route('lockers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Code du casier *</label>
            <input type="text" name="code" class="form-control" required value="{{ old('code') }}">
        </div>
        <div class="form-group">
            <label for="location">Emplacement</label>
            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('lockers.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection 