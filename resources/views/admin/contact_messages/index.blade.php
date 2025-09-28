@extends('layouts.adminlte-app')

@section('title', 'Messages de contact')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
    <h3 class="mb-0">Messages de contact</h3>
    <a href="{{ route('admin.contact_messages.export') }}" class="btn btn-success mb-2"><i class="fas fa-file-csv"></i> Exporter CSV</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="thead-light">
            <tr>
                <th>Date</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Sujet</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $msg)
                <tr>
                    <td>{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $msg->name }}</td>
                    <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
                    <td>{{ $msg->subject }}</td>
                    <td>
                        <a href="{{ route('admin.contact_messages.show', $msg->id) }}" class="btn btn-info btn-sm" title="Voir"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('admin.contact_messages.destroy', $msg->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Supprimer ce message ?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Aucun message reçu.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    {{ $messages->links() }}
</div>
@endsection 