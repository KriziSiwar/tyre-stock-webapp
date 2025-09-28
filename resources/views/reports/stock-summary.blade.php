@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Résumé du Stock</h3>
                    <div class="card-tools">
                        <a href="{{ route('reports.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Statistiques générales -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $totalTyres }}</h3>
                                    <p>Total Pneus</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-tire"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $inStockTyres }}</h3>
                                    <p>En Stock</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-boxes"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $removedTyres }}</h3>
                                    <p>Retirés</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-minus-circle"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $lockerUtilization->count() }}</h3>
                                    <p>Casiers Utilisés</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-door-closed"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Répartition par saison -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Répartition par Saison</h3>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="seasonChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Répartition par usure -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Répartition par Usure</h3>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="wearChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Utilisation des casiers -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Utilisation des Casiers</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Casier</th>
                                                    <th>Localisation</th>
                                                    <th>Pneus Stockés</th>
                                                    <th>Utilisation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($lockerUtilization as $locker)
                                                <tr>
                                                    <td>{{ $locker->code }}</td>
                                                    <td>{{ $locker->location }}</td>
                                                    <td>{{ $locker->tyres_count }}</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: {{ min(100, ($locker->tyres_count / 10) * 100) }}%">
                                                                {{ $locker->tyres_count }}/10
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Mouvements récents -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Mouvements Récents</h3>
                                </div>
                                <div class="card-body">
                                    <div class="timeline">
                                        @foreach($recentMovements as $movement)
                                        <div class="time-label">
                                            <span class="bg-{{ $movement->action == 'entry' ? 'success' : 'danger' }}">
                                                {{ $movement->date->format('d/m/Y') }}
                                            </span>
                                        </div>
                                        <div>
                                            <i class="fas fa-{{ $movement->action == 'entry' ? 'plus' : 'minus' }} bg-{{ $movement->action == 'entry' ? 'success' : 'danger' }}"></i>
                                            <div class="timeline-item">
                                                <span class="time">
                                                    <i class="fas fa-clock"></i> {{ $movement->date->format('H:i') }}
                                                </span>
                                                <h3 class="timeline-header">
                                                    {{ $movement->action == 'entry' ? 'Entrée' : 'Sortie' }} - {{ $movement->user->name }}
                                                </h3>
                                                <div class="timeline-body">
                                                    Pneu #{{ $movement->tyre->id }} - {{ $movement->tyre->dimension }}
                                                    @if($movement->notes)
                                                        <br><small>{{ $movement->notes }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Chart pour les saisons
const seasonCtx = document.getElementById('seasonChart').getContext('2d');
new Chart(seasonCtx, {
    type: 'doughnut',
    data: {
        labels: {!! json_encode($tyresBySeason->pluck('season')) !!},
        datasets: [{
            data: {!! json_encode($tyresBySeason->pluck('count')) !!},
            backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545']
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

// Chart pour l'usure
const wearCtx = document.getElementById('wearChart').getContext('2d');
new Chart(wearCtx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($tyresByWear->pluck('wear')) !!},
        datasets: [{
            label: 'Nombre de pneus',
            data: {!! json_encode($tyresByWear->pluck('count')) !!},
            backgroundColor: '#17a2b8'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endpush
@endsection 