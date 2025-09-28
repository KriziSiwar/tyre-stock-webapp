@extends('layouts.app')
@section('title', 'Historique du pneu #'.$tyreId)
@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="mb-3">Historique du pneu #{{ $tyreId }}</h1>
            <a href="{{ route('tyres.index') }}" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Retour à la liste des pneus</a>
        </div>
        <div class="col-md-4 text-center">
            <div class="card p-3 mb-3">
                <h5 class="mb-2"><i class="fas fa-qrcode"></i> QR Code du pneu</h5>
                <div id="qrcode-container">
                    {!! QrCode::size(180)->generate(url(route('stock-movements.tyre', $tyreId, false))) !!}
                </div>
                <button id="download-qr" class="btn btn-outline-primary mt-2"><i class="fas fa-download"></i> Télécharger le QR</button>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header"><strong>Historique des mouvements</strong></div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Action</th>
                        <th>Utilisateur</th>
                        <th>Châssis</th>
                        <th>Commentaire</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($movements as $move)
                    <tr>
                        <td>{{ $move->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $move->action }}</td>
                        <td>{{ $move->user ? $move->user->name : '-' }}</td>
                        <td>{{ $move->tyre && $move->tyre->vehicle ? $move->tyre->vehicle->chassis_number : '' }}</td>
                        <td>{{ $move->comment }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">Aucun mouvement trouvé.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts')
<script>
// Téléchargement du QR code en PNG
window.addEventListener('DOMContentLoaded', function() {
    document.getElementById('download-qr').addEventListener('click', function() {
        const svg = document.querySelector('#qrcode-container svg');
        if (!svg) return alert('QR code non généré');
        const svgData = new XMLSerializer().serializeToString(svg);
        const canvas = document.createElement('canvas');
        const img = new Image();
        img.onload = function() {
            canvas.width = img.width;
            canvas.height = img.height;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0);
            const pngFile = canvas.toDataURL('image/png');
            const a = document.createElement('a');
            a.href = pngFile;
            a.download = 'qr-pneu-{{ $tyreId }}.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        };
        img.src = 'data:image/svg+xml;base64,' + btoa(svgData);
    });
});
</script>
@endpush
@endsection 