@extends('layouts.adminlte-app')

@section('title', 'Casiers')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
    <h3 class="mb-0">Gestion des casiers</h3>
    <a href="{{ route('lockers.create') }}" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Ajouter un casier</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Emplacement</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lockers as $locker)
                <tr>
                    <td>{{ $locker->id }}</td>
                    <td>{{ $locker->code }}</td>
                    <td>{{ $locker->location }}</td>
                    <td>{{ $locker->description }}</td>
                    <td>
                        <a href="{{ route('lockers.qr', $locker->id) }}" class="btn btn-info btn-sm" title="Voir QR Code"><i class="fas fa-qrcode"></i></a>
                        <a href="{{ route('lockers.edit', $locker->id) }}" class="btn btn-warning btn-sm" title="Modifier"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('lockers.destroy', $locker->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Confirmer la suppression de ce casier ?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Aucun casier trouvé.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection 