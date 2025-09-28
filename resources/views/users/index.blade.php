@extends('layouts.adminlte-app')

@section('title', 'Utilisateurs')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
    <h3 class="mb-0">Gestion des utilisateurs</h3>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-2"><i class="fas fa-user-plus"></i> Ajouter un utilisateur</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><span class="badge badge-info text-uppercase">{{ $user->role }}</span></td>
                    <td>
                        @if($user->trashed())
                            <span class="badge badge-danger">Désactivé</span>
                        @else
                            <span class="badge badge-success">Actif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm" title="Modifier"><i class="fas fa-edit"></i></a>
                        @if($user->trashed())
                            <form action="{{ route('users.restore', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm" title="Réactiver" onclick="return confirm('Confirmer la réactivation de cet utilisateur ?')">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </form>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer définitivement" onclick="return confirm('Supprimer définitivement cet utilisateur ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Désactiver" onclick="return confirm('Désactiver cet utilisateur ?')">
                                    <i class="fas fa-user-slash"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Aucun utilisateur trouvé.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection 