@extends('layouts.front')

@section('title', 'Merci')
@section('meta_description', 'Merci pour votre message - Mercedes-Benz Garage')

@push('styles')
<style>
  .merci-page {
    margin-top: 90px;
  }
  .merci-page .merci-card {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 24px #ff910022;
    padding: 2.5rem 2rem;
    margin-bottom: 2rem;
    border: 1px solid #eee;
    color: #181818;
  }
  .merci-page h2 {
    color: #181818;
    font-weight: 700;
    margin-bottom: 1rem;
  }
  .merci-page .bi-check-circle-fill {
    color: #ff9100 !important;
    font-size: 2.2rem;
    vertical-align: middle;
    margin-right: 8px;
  }
  .merci-page .btn-primary {
    background: #ff9100;
    color: #181818;
    border-radius: 24px;
    font-weight: 600;
    border: none;
    transition: background 0.2s, color 0.2s;
  }
  .merci-page .btn-primary:hover {
    background: #181818;
    color: #ff9100;
  }
</style>
@endpush

@section('content')
<section class="merci-page section py-5 text-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="merci-card">
          <h2 class="mb-3"><i class="bi bi-check-circle-fill"></i> Merci pour votre message !</h2>
          <p class="lead">Votre demande a bien été envoyée à notre équipe. Nous vous répondrons dans les plus brefs délais.</p>
        </div>
        <a href="/" class="btn btn-primary"><i class="bi bi-house"></i> Retour à l'accueil</a>
      </div>
    </div>
  </div>
</section>
@endsection 