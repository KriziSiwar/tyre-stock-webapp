@extends('adminlte::page')

@section('title', 'Audit Log Utilisateurs')

@section('content_header')
    <h1>Audit Log Utilisateurs</h1>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour à la gestion des utilisateurs</a>
@endsection

@section('content')
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Date</th>
                <th>Action</th>
                <th>Effectué par</th>
                <th>Cible</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            @forelse($audits as $audit)
                <tr>
                    <td>{{ $audit->created_at }}</td>
                    <td>{{ $audit->action }}</td>
                    <td>{{ $audit->user ? $audit->user->name : 'N/A' }}</td>
                    <td>{{ $audit->target_type }} #{{ $audit->target_id }}</td>
                    <td><pre style="white-space: pre-wrap; word-break: break-all;">{{ $audit->details }}</pre></td>
                </tr>
            @empty
                <tr><td colspan="5">Aucune action trouvée.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection 