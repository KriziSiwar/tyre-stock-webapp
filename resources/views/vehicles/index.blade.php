@extends('layouts.adminlte-app')

@section('title', 'Véhicules')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
    <h3 class="mb-0">Gestion des véhicules</h3>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Ajouter un véhicule</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Châssis</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Année</th>
                <th>Couleur</th>
                <th>Propriétaire</th>
                <th>Téléphone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->chassis_number }}</td>
                    <td>{{ $vehicle->marque }}</td>
                    <td>{{ $vehicle->modele }}</td>
                    <td>{{ $vehicle->year }}</td>
                    <td>{{ $vehicle->color }}</td>
                    <td>{{ $vehicle->owner_name }}</td>
                    <td>{{ $vehicle->owner_phone }}</td>
                    <td>
                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning btn-sm" title="Modifier"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Confirmer la suppression de ce véhicule ?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="9">Aucun véhicule trouvé.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection 