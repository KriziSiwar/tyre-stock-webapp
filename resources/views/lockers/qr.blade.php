@extends('adminlte::page')

@section('title', 'QR Code du casier '.$locker->code)

@section('content_header')
    <h1>QR Code du casier {{ $locker->code }}</h1>
    <a href="{{ route('lockers.index') }}" class="btn btn-secondary">Retour à la liste des casiers</a>
    <button onclick="window.print()" class="btn btn-success ml-2 d-print-none">Imprimer le QR</button>
    <style>
        @media print {
            body * { visibility: hidden; }
            #qr-section, #qr-section * { visibility: visible; }
            #qr-section { position: absolute; left: 0; top: 0; width: 100vw; }
            .d-print-none { display: none !important; }
        }
    </style>
@endsection

@section('content')
    <div id="qr-section" class="mt-3">
        {!! QrCode::size(180)->generate(url(route('lockers.qr', $locker->id, false))) !!}
        <p>QR Code du casier {{ $locker->code }}</p>
        <small>Scannez pour accéder à la fiche de ce casier.</small>
        <div class="mt-4">
            <h4>Détails du casier</h4>
            <ul>
                <li><strong>Code:</strong> {{ $locker->code }}</li>
                <li><strong>Emplacement:</strong> {{ $locker->location }}</li>
                <li><strong>Description:</strong> {{ $locker->description }}</li>
            </ul>
        </div>
    </div>
@endsection 