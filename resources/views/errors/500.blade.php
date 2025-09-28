@extends('layouts.front')

@section('title', 'Erreur serveur')
@section('meta_description', 'Erreur 500 - Problème interne sur Mercedes-Benz Garage')

@push('styles')
<style>
  .error-500-page {
    margin-top: 90px;
    min-height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
  }
  .error-500-page .error-icon {
    font-size: 4rem;
    color: #ff9100;
    margin-bottom: 1.5rem;
  }
  .error-500-page h1 {
    font-size: 3rem;
    color: #181818;
    font-weight: 800;
    margin-bottom: 1rem;
  }
  .error-500-page p {
    color: #555;
    font-size: 1.2rem;
    margin-bottom: 2rem;
  }
  .error-500-page .btn-primary {
    background: #ff9100;
    color: #181818;
    border-radius: 24px;
    font-weight: 600;
    border: none;
    transition: background 0.2s, color 0.2s;
    padding: 0.75rem 2.2rem;
    font-size: 1.1rem;
  }
  .error-500-page .btn-primary:hover {
    background: #181818;
    color: #ff9100;
  }
</style>
@endpush

@section('content')
<section class="error-500-page">
  <div class="container">
    <div class="error-icon mb-3"><i class="bi bi-bug-fill"></i></div>
    <h1>500 - Erreur serveur</h1>
    <p>Oups, une erreur interne est survenue.<br>Notre équipe a été prévenue et travaille à la résolution du problème.<br>Vous pouvez retourner à l'accueil ou réessayer plus tard.</p>
    <a href="/" class="btn btn-primary"><i class="bi bi-house"></i> Retour à l'accueil</a>
  </div>
</section>
@endsection 