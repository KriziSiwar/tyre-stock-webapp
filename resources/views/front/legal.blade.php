@extends('layouts.front')

@section('title', 'Mentions Légales - IT-Koncept SA')
@section('meta_description', 'Mentions légales, conditions d\'utilisation et politique de confidentialité d\'IT-Koncept SA, spécialiste du stockage de pneus Mercedes-Benz.')

@push('styles')
<style>
  /* Hero Section */
  .legal-hero {
    background: linear-gradient(135deg, rgba(24, 24, 24, 0.9) 0%, rgba(24, 24, 24, 0.7) 100%), 
                url('/frontend/assets/img/services/services-7.webp');
    background-size: cover;
    background-position: center;
    padding: 8rem 0 4rem;
    color: white;
    text-align: center;
  }
  
  .legal-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  
  .legal-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
  }
  
  /* Legal Content */
  .legal-section {
    padding: 5rem 0;
  }
  
  .legal-container {
    max-width: 800px;
    margin: 0 auto;
  }
  
  .legal-card {
    background: white;
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
  }
  
  .legal-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    border-left: 6px solid var(--accent-color);
    padding-left: 1rem;
  }
  
  .legal-subtitle {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--primary-color);
    margin: 2rem 0 1rem;
  }
  
  .legal-text {
    color: #666;
    line-height: 1.8;
    margin-bottom: 1.5rem;
  }
  
  .legal-list {
    color: #666;
    line-height: 1.8;
    margin-bottom: 1.5rem;
    padding-left: 1.5rem;
  }
  
  .legal-list li {
    margin-bottom: 0.5rem;
  }
  
  .legal-highlight {
    background: rgba(255,145,0,0.1);
    border-left: 4px solid var(--accent-color);
    padding: 1.5rem;
    margin: 1.5rem 0;
    border-radius: 0 10px 10px 0;
  }
  
  .legal-highlight strong {
    color: var(--primary-color);
  }
  
  .legal-table {
    width: 100%;
    border-collapse: collapse;
    margin: 1.5rem 0;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  }
  
  .legal-table th {
    background: var(--primary-color);
    color: white;
    padding: 1rem;
    text-align: left;
    font-weight: 600;
  }
  
  .legal-table td {
    padding: 1rem;
    border-bottom: 1px solid #e9ecef;
  }
  
  .legal-table tr:last-child td {
    border-bottom: none;
  }
  
  .legal-table tr:hover {
    background: #f8f9fa;
  }
  
  /* Contact Section */
  .contact-section {
    padding: 5rem 0;
    background: var(--light-bg);
  }
  
  .contact-card {
    background: white;
    border-radius: 20px;
    padding: 3rem;
    text-align: center;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
  }
  
  .contact-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1rem;
  }
  
  .contact-description {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 2rem;
  }
  
  .btn-contact {
    background: var(--accent-color);
    color: white;
    padding: 1rem 2rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid var(--accent-color);
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .btn-contact:hover {
    background: transparent;
    color: var(--accent-color);
    transform: translateY(-3px);
  }
  
  /* Responsive */
  @media (max-width: 768px) {
    .legal-hero h1 {
      font-size: 2rem;
    }
    
    .legal-hero p {
      font-size: 1rem;
    }
    
    .legal-card {
      padding: 2rem;
    }
    
    .legal-title {
      font-size: 1.5rem;
    }
    
    .legal-table {
      font-size: 0.9rem;
    }
    
    .legal-table th,
    .legal-table td {
      padding: 0.75rem;
    }
  }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="legal-hero" data-aos="fade-up">
  <div class="container">
    <h1>Mentions Légales</h1>
    <p>Informations légales et conditions d'utilisation d'IT-Koncept SA</p>
  </div>
</section>

<!-- Legal Content -->
<section class="legal-section" data-aos="fade-up">
  <div class="container">
    <div class="legal-container">
      
      <!-- Éditeur -->
      <div class="legal-card">
        <h2 class="legal-title">Éditeur du Site</h2>
        <div class="legal-highlight">
          <strong>IT-Koncept SA</strong><br>
          Route de Lausanne 123<br>
          1260 Nyon, Suisse<br>
          Téléphone : +41 22 123 45 67<br>
          Email : contact@it-koncept.ch<br>
          Site web : www.it-koncept.ch
        </div>
        
        <h3 class="legal-subtitle">Informations Légales</h3>
        <p class="legal-text">
          IT-Koncept SA est une société anonyme de droit suisse, immatriculée au Registre du Commerce 
          du Canton de Vaud sous le numéro CHE-123.456.789, dont le siège social est situé à Nyon, Suisse.
        </p>
        
        <p class="legal-text">
          <strong>Directeur de publication :</strong> Jean Dupont<br>
          <strong>Responsable de la rédaction :</strong> Marie Martin
        </p>
      </div>
      
      <!-- Hébergement -->
      <div class="legal-card">
        <h2 class="legal-title">Hébergement</h2>
        <p class="legal-text">
          Ce site web est hébergé par :<br>
          <strong>Swiss Cloud Solutions SA</strong><br>
          Route de Genève 456<br>
          1000 Lausanne, Suisse<br>
          Téléphone : +41 21 987 65 43<br>
          Site web : www.swisscloud.ch
        </p>
      </div>
      
      <!-- Conditions d'Utilisation -->
      <div class="legal-card">
        <h2 class="legal-title">Conditions d'Utilisation</h2>
        
        <h3 class="legal-subtitle">1. Acceptation des Conditions</h3>
        <p class="legal-text">
          L'utilisation de ce site web implique l'acceptation pleine et entière des conditions générales 
          d'utilisation ci-après décrites. Ces conditions d'utilisation sont susceptibles d'être modifiées 
          ou complétées à tout moment.
        </p>
        
        <h3 class="legal-subtitle">2. Description des Services</h3>
        <p class="legal-text">
          Le site www.it-koncept.ch a pour objet de fournir une information concernant l'ensemble des 
          activités de la société IT-Koncept SA, spécialisée dans le stockage et la gestion de pneus 
          Mercedes-Benz.
        </p>
        
        <h3 class="legal-subtitle">3. Limitations de Responsabilité</h3>
        <p class="legal-text">
          Les informations contenues sur ce site sont aussi précises que possible et le site est périodiquement 
          remis à jour, mais peut toutefois contenir des inexactitudes, des omissions ou des lacunes.
        </p>
        
        <div class="legal-highlight">
          <strong>IT-Koncept SA ne pourra être tenue responsable :</strong>
          <ul class="legal-list">
            <li>Des dommages directs ou indirects causés au matériel de l'utilisateur</li>
            <li>De l'apparition de bugs ou d'incompatibilités</li>
            <li>De l'utilisation non autorisée du site</li>
            <li>De la perte de données ou de tout autre dommage</li>
          </ul>
        </div>
      </div>
      
      <!-- Propriété Intellectuelle -->
      <div class="legal-card">
        <h2 class="legal-title">Propriété Intellectuelle</h2>
        
        <h3 class="legal-subtitle">Droits d'Auteur</h3>
        <p class="legal-text">
          L'ensemble de ce site relève de la législation suisse et internationale sur le droit d'auteur 
          et la propriété intellectuelle. Tous les droits de reproduction sont réservés, y compris pour 
          les documents téléchargeables et les représentations iconographiques et photographiques.
        </p>
        
        <h3 class="legal-subtitle">Marques Déposées</h3>
        <p class="legal-text">
          Les marques et logos figurant sur le site sont des marques déposées par leurs propriétaires respectifs. 
          Toute reproduction, représentation, modification, publication, transmission, dénaturation, 
          totale ou partielle du site ou de son contenu, par quelque procédé que ce soit, et sur quelque 
          support que ce soit est interdite.
        </p>
      </div>
      
      <!-- Protection des Données -->
      <div class="legal-card">
        <h2 class="legal-title">Protection des Données Personnelles</h2>
        
        <h3 class="legal-subtitle">Collecte des Données</h3>
        <p class="legal-text">
          Conformément à la Loi fédérale sur la protection des données (LPD), vous disposez d'un droit 
          d'accès, de rectification et de suppression des données vous concernant.
        </p>
        
        <h3 class="legal-subtitle">Cookies</h3>
        <p class="legal-text">
          Ce site utilise des cookies pour améliorer l'expérience utilisateur. Vous pouvez désactiver 
          les cookies dans les paramètres de votre navigateur.
        </p>
        
        <h3 class="legal-subtitle">Données Collectées</h3>
        <table class="legal-table">
          <thead>
            <tr>
              <th>Type de Données</th>
              <th>Finalité</th>
              <th>Durée de Conservation</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Nom, email, téléphone</td>
              <td>Contact et devis</td>
              <td>3 ans</td>
            </tr>
            <tr>
              <td>Données de navigation</td>
              <td>Amélioration du site</td>
              <td>13 mois</td>
            </tr>
            <tr>
              <td>Données de connexion</td>
              <td>Sécurité</td>
              <td>12 mois</td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <!-- Droit Applicable -->
      <div class="legal-card">
        <h2 class="legal-title">Droit Applicable</h2>
        <p class="legal-text">
          Tout litige en relation avec l'utilisation du site www.it-koncept.ch est soumis au droit suisse. 
          En dehors des cas où la loi ne le permet pas, il est fait attribution exclusive de juridiction 
          aux tribunaux compétents de Nyon, Suisse.
        </p>
        
        <div class="legal-highlight">
          <strong>Dernière mise à jour :</strong> {{ date('d/m/Y') }}<br>
          <strong>Version :</strong> 2.0
        </div>
      </div>
      
    </div>
  </div>
</section>

<!-- Contact Section -->
<section class="contact-section" data-aos="fade-up">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="contact-card">
          <h2 class="contact-title">Questions Légales ?</h2>
          <p class="contact-description">
            Notre équipe juridique est à votre disposition pour répondre à toutes vos questions 
            concernant nos mentions légales et conditions d'utilisation.
          </p>
          <a href="{{ route('front.contact') }}" class="btn-contact">
            <i class="fas fa-envelope"></i>
            Nous Contacter
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection 