@extends('layouts.adminlte-app')

@section('title', 'Mouvements de stock')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
    <h3 class="mb-0">Historique des mouvements de stock</h3>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="thead-light">
            <tr>
                <th>Date</th>
                <th>Action</th>
                <th>Pneu (ID)</th>
                <th>Véhicule</th>
                <th>Utilisateur</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @forelse($movements as $move)
                <tr>
                    <td>{{ $move->date }}</td>
                    <td>
                        @if($move->action === 'entry')
                            <span class="badge badge-success"><i class="fas fa-arrow-down"></i> Entrée</span>
                        @else
                            <span class="badge badge-danger"><i class="fas fa-arrow-up"></i> Sortie</span>
                        @endif
                    </td>
                    <td>{{ $move->tyre ? $move->tyre->id : '' }}</td>
                    <td>{{ $move->tyre && $move->tyre->vehicle ? $move->tyre->vehicle->chassis_number : '' }}</td>
                    <td>{{ $move->user ? $move->user->name : '' }}</td>
                    <td>{{ $move->notes }}</td>
                </tr>
            @empty
                <tr><td colspan="6">Aucun mouvement trouvé.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection 