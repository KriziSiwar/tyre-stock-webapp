@extends('layouts.adminlte-app')

@section('title', 'Rapports')

@section('content')
<div class="row">
    <div class="col-12 col-md-4 mb-3">
        <div class="card bg-primary text-white h-100">
            <div class="card-body text-center">
                <h4><i class="fas fa-chart-bar"></i></h4>
                <h5>Résumé du Stock</h5>
                <p>Vue d'ensemble du stock actuel</p>
                <a href="{{ route('reports.stock-summary') }}" class="btn btn-light">Voir le rapport</a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 mb-3">
        <div class="card bg-success text-white h-100">
            <div class="card-body text-center">
                <h4><i class="fas fa-exchange-alt"></i></h4>
                <h5>Mouvements de Stock</h5>
                <p>Historique des entrées et sorties</p>
                <a href="{{ route('reports.movement-report') }}" class="btn btn-light">Voir le rapport</a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 mb-3">
        <div class="card bg-info text-white h-100">
            <div class="card-body text-center">
                <h4><i class="fas fa-car"></i></h4>
                <h5>Rapport Véhicules</h5>
                <p>Stock par véhicule</p>
                <a href="{{ route('reports.vehicle-report') }}" class="btn btn-light">Voir le rapport</a>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12 col-md-6 mb-3">
        <div class="card bg-warning text-dark h-100">
            <div class="card-body text-center">
                <h4><i class="fas fa-download"></i></h4>
                <h5>Export CSV</h5>
                <p>Exporter les données en format CSV</p>
                <a href="{{ route('reports.export-stock') }}" class="btn btn-dark">Télécharger</a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 mb-3">
        <div class="card bg-secondary text-white h-100">
            <div class="card-body text-center">
                <h4><i class="fas fa-tachometer-alt"></i></h4>
                <h5>Tableau de Bord</h5>
                <p>Statistiques et indicateurs</p>
                <a href="{{ route('reports.dashboard') }}" class="btn btn-light">Voir le tableau</a>
            </div>
        </div>
    </div>
</div>
@endsection 