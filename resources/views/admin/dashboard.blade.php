@extends('layouts.adminlte-app')

@section('title', 'Tableau de bord Logistique')

@section('content')
<div class="row">
    <div class="col-12 col-sm-6 col-md-3 mb-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalTyres }}</h3>
                <p>Pneus en stock</p>
            </div>
            <div class="icon"><i class="fas fa-tire"></i></div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 mb-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $tyresAddedThisWeek }}</h3>
                <p>Pneus ajoutés cette semaine</p>
            </div>
            <div class="icon"><i class="fas fa-plus-circle"></i></div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 mb-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $tyresRemovedThisWeek }}</h3>
                <p>Pneus sortis cette semaine</p>
            </div>
            <div class="icon"><i class="fas fa-minus-circle"></i></div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 mb-3">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $usedLockers }}/{{ $totalLockers }}</h3>
                <p>Casiers utilisés / total</p>
            </div>
            <div class="icon"><i class="fas fa-warehouse"></i></div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12">
        <a href="{{ route('tyres.create') }}" class="btn btn-primary mr-2 mb-2"><i class="fas fa-plus"></i> Ajouter un pneu</a>
        <a href="{{ route('vehicles.create') }}" class="btn btn-secondary mr-2 mb-2"><i class="fas fa-car"></i> Ajouter un véhicule</a>
        <a href="{{ route('lockers.create') }}" class="btn btn-info mb-2"><i class="fas fa-box"></i> Ajouter un casier</a>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12 col-lg-8 mb-3">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center align-items-start">
                <strong>Derniers mouvements de stock</strong>
                <div class="mt-2 mt-md-0">
                    <select id="filter-period" class="form-control form-control-sm d-inline-block w-auto mb-1">
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                        <option value="custom">Personnalisé</option>
                    </select>
                    <input type="date" id="filter-start" class="form-control form-control-sm d-inline-block w-auto mb-1" style="display:none;">
                    <input type="date" id="filter-end" class="form-control form-control-sm d-inline-block w-auto mb-1" style="display:none;">
                    <button id="export-csv" class="btn btn-outline-success btn-sm ml-2 mb-1"><i class="fas fa-file-csv"></i> Exporter CSV</button>
                </div>
            </div>
            <div class="card-body p-0 table-responsive" id="movements-table-container">
                @include('admin.partials.movements-table', ['movements' => $recentMovements])
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 mb-3">
        <div class="card h-100">
            <div class="card-header"><strong>Évolution des mouvements</strong></div>
            <div class="card-body">
                <canvas id="movementsChart" height="200"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
function loadMovements(period, start, end) {
    let params = {period: period};
    if (period === 'custom') {
        params.start = start;
        params.end = end;
    }
    $.get('/admin/movements-table', params, function(html) {
        $('#movements-table-container').html(html);
    });
    $.get('/admin/movements-chart', params, function(data) {
        updateChart(data.labels, data.entries, data.removals);
    });
}
function updateChart(labels, entries, removals) {
    if(window.movementsChartInstance) window.movementsChartInstance.destroy();
    const ctx = document.getElementById('movementsChart').getContext('2d');
    window.movementsChartInstance = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {label: 'Entrées', data: entries, borderColor: '#28a745', fill: false},
                {label: 'Sorties', data: removals, borderColor: '#dc3545', fill: false}
            ]
        },
        options: {responsive: true, maintainAspectRatio: false}
    });
}
$(function() {
    $('#filter-period').change(function() {
        if($(this).val() === 'custom') {
            $('#filter-start,#filter-end').show();
        } else {
            $('#filter-start,#filter-end').hide();
            loadMovements($(this).val());
        }
    });
    $('#filter-start,#filter-end').change(function() {
        if($('#filter-period').val() === 'custom') {
            loadMovements('custom', $('#filter-start').val(), $('#filter-end').val());
        }
    });
    // Initial chart load
    $.get('/admin/movements-chart', {period: 'week'}, function(data) {
        updateChart(data.labels, data.entries, data.removals);
    });
    $('#export-csv').click(function(e) {
        e.preventDefault();
        let period = $('#filter-period').val();
        let url = '/admin/movements-export?period=' + period;
        if(period === 'custom') {
            url += '&start=' + $('#filter-start').val() + '&end=' + $('#filter-end').val();
        }
        window.location = url;
    });
});
</script>
@endpush 