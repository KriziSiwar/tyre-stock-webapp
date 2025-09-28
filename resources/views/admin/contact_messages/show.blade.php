@extends('layouts.adminlte-app')

@section('title', 'Message de contact')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Message reçu le {{ $message->created_at->format('d/m/Y H:i') }}</h4>
    </div>
    <div class="card-body">
        <p><strong>Nom :</strong> {{ $message->name }}</p>
        <p><strong>Email :</strong> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
        <p><strong>Sujet :</strong> {{ $message->subject }}</p>
        <hr>
        <p><strong>Message :</strong></p>
        <div class="bg-light p-3 rounded">{{ $message->message }}</div>
    </div>
    <div class="card-footer text-end">
        <a href="{{ route('admin.contact_messages.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour</a>
        <form action="{{ route('admin.contact_messages.destroy', $message->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce message ?')"><i class="fas fa-trash"></i> Supprimer</button>
        </form>
    </div>
</div>
@endsection 