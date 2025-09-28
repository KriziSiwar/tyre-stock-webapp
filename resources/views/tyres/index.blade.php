@extends('layouts.adminlte-app')

@section('title', 'Pneus')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
    <h3 class="mb-0">Gestion des pneus</h3>
    <a href="{{ route('tyres.create') }}" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Ajouter un pneu</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Véhicule</th>
                <th>Casier</th>
                <th>Dimension</th>
                <th>Type</th>
                <th>Usure</th>
                <th>Saison</th>
                <th>QR Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tyres as $tyre)
                <tr>
                    <td>{{ $tyre->id }}</td>
                    <td>{{ $tyre->vehicle ? $tyre->vehicle->chassis_number : '' }}</td>
                    <td>{{ $tyre->locker ? $tyre->locker->code : '' }}</td>
                    <td>{{ $tyre->dimension }}</td>
                    <td>{{ $tyre->type }}</td>
                    <td>{{ $tyre->wear }}</td>
                    <td>{{ $tyre->season }}</td>
                    <td>{{ $tyre->qr_code }}</td>
                    <td>
                        <a href="{{ route('stock-movements.tyre', $tyre->id) }}" class="btn btn-info btn-sm" title="Historique du pneu"><i class="fas fa-history"></i></a>
                        <form action="{{ route('tyres.destroy', $tyre->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Sortie du stock" onclick="return confirm('Confirmer la sortie de ce pneu du stock ?')">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="9">Aucun pneu trouvé.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection 