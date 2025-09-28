@extends('layouts.front')

@section('title', 'IT-Koncept SA - Stockage de Pneus Mercedes-Benz')
@section('meta_description', 'Solution professionnelle de stockage de pneus Mercedes-Benz. Traçabilité QR, sécurité premium, logistique optimisée. Certifié Mercedes-Benz.')

@push('styles')
<style>
  /* Hero Section */
  .hero-section {
    background: linear-gradient(135deg, rgba(24, 24, 24, 0.8) 0%, rgba(24, 24, 24, 0.6) 100%), 
                url('/frontend/assets/img/services/services-1.webp');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
  }
  
  .hero-content {
    color: white;
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
  }
  
  .hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  
  .hero-subtitle {
    font-size: 1.3rem;
    margin-bottom: 2rem;
    opacity: 0.9;
    line-height: 1.6;
  }
  
  .hero-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
  }
  
  .btn-hero-primary {
    background: var(--accent-color);
    color: white;
    padding: 1rem 2rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid var(--accent-color);
  }
  
  .btn-hero-primary:hover {
    background: transparent;
    color: var(--accent-color);
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(255,145,0,0.3);
  }
  
  .btn-hero-secondary {
    background: transparent;
    color: white;
    padding: 1rem 2rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid white;
  }
  
  .btn-hero-secondary:hover {
    background: white;
    color: var(--primary-color);
    transform: translateY(-3px);
  }
  
  /* Features Section */
  .features-section {
    padding: 5rem 0;
    background: var(--light-bg);
  }
  
  .feature-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem 2rem;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
    border: 1px solid rgba(0,0,0,0.05);
  }
  
  .feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  }
  
  .feature-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--accent-color), #e67e00);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: white;
    font-size: 2rem;
  }
  
  .feature-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1rem;
  }
  
  .feature-description {
    color: #666;
    line-height: 1.6;
  }
  
  /* About Section */
  .about-section {
    padding: 5rem 0;
  }
  
  .about-content {
    display: flex;
    align-items: center;
    gap: 3rem;
  }
  
  .about-image {
    flex: 1;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
  }
  
  .about-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
  }
  
  .about-text {
    flex: 1;
  }
  
  .about-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    border-left: 6px solid var(--accent-color);
    padding-left: 1rem;
  }
  
  .about-description {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #666;
    margin-bottom: 2rem;
  }
  
  /* Services Section */
  .services-section {
    padding: 5rem 0;
    background: var(--light-bg);
  }
  
  .service-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
  }
  
  .service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  }
  
  .service-image {
    height: 200px;
    overflow: hidden;
  }
  
  .service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }
  
  .service-card:hover .service-image img {
    transform: scale(1.1);
  }
  
  .service-content {
    padding: 2rem;
  }
  
  .service-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1rem;
  }
  
  .service-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 1.5rem;
  }
  
  .service-link {
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .service-link:hover {
    color: #e67e00;
  }
  
  /* Testimonials Section */
  .testimonials-section {
    padding: 5rem 0;
  }
  
  .testimonial-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    position: relative;
    margin-bottom: 2rem;
  }
  
  .testimonial-card::before {
    content: '"';
    font-size: 4rem;
    color: var(--accent-color);
    position: absolute;
    top: -10px;
    left: 30px;
    font-family: serif;
  }
  
  .testimonial-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #666;
    margin-bottom: 2rem;
    font-style: italic;
  }
  
  .testimonial-author {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
  }
  
  .testimonial-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--accent-color);
  }
  
  .testimonial-info h5 {
    color: var(--primary-color);
    font-weight: 700;
    margin-bottom: 0.25rem;
  }
  
  .testimonial-info .company {
    color: var(--accent-color);
    font-weight: 600;
  }
  
  .testimonial-rating {
    color: var(--accent-color);
    font-size: 1.2rem;
    margin-top: 0.5rem;
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
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    text-align: center;
  }
  
  .contact-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1rem;
  }
  
  .contact-description {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 2rem;
  }
  
  .contact-info {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
  }
  
  .contact-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #666;
  }
  
  .contact-item i {
    color: var(--accent-color);
    font-size: 1.2rem;
  }
  
  /* Responsive */
  @media (max-width: 768px) {
    .hero-title {
      font-size: 2.5rem;
    }
    
    .hero-subtitle {
      font-size: 1.1rem;
    }
    
    .hero-buttons {
      flex-direction: column;
      align-items: center;
    }
    
    .about-content {
      flex-direction: column;
    }
    
    .contact-info {
      flex-direction: column;
      align-items: center;
    }
  }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section" data-aos="fade-up">
  <div class="container">
    <div class="hero-content">
      <h1 class="hero-title">
        Stockage Premium de Pneus<br>
        <span style="color: var(--accent-color);">Mercedes-Benz</span>
      </h1>
      <p class="hero-subtitle">
        Solution professionnelle de stockage sécurisé avec traçabilité QR, 
        gestion logistique optimisée et certification Mercedes-Benz. 
        Votre partenaire de confiance pour la gestion de vos pneus.
      </p>
      <div class="hero-buttons">
        <a href="{{ route('front.services') }}" class="btn-hero-primary">
          <i class="fas fa-cogs fa-fw me-2"></i>Nos Services
        </a>
        <a href="{{ route('front.contact') }}" class="btn-hero-secondary">
          <i class="fas fa-envelope fa-fw me-2"></i>Demander un Devis
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="features-section" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
        Pourquoi Choisir IT-Koncept ?
      </h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
        Notre expertise et nos solutions innovantes font de nous le partenaire idéal 
        pour la gestion de vos pneus Mercedes-Benz.
      </p>
    </div>
    
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-shield-alt"></i>
          </div>
          <h3 class="feature-title">Sécurité Premium</h3>
          <p class="feature-description">
            Stockage dans des locaux surveillés 24h/24 avec système d'alarme 
            et assurance complète pour vos pneus.
          </p>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6">
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-qrcode"></i>
          </div>
          <h3 class="feature-title">Traçabilité QR</h3>
          <p class="feature-description">
            Chaque pneu est identifié par un QR code unique permettant 
            un suivi en temps réel et une gestion optimale.
          </p>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6">
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-certificate"></i>
          </div>
          <h3 class="feature-title">Certifié Mercedes-Benz</h3>
          <p class="feature-description">
            Partenaire officiel certifié Mercedes-Benz avec des standards 
            de qualité les plus élevés du secteur.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- About Section -->
<section class="about-section" data-aos="fade-up">
  <div class="container">
    <div class="about-content">
      <div class="about-image">
        <img src="/frontend/assets/img/about/about-18.webp" alt="IT-Koncept SA - Stockage de pneus">
      </div>
      <div class="about-text">
        <h2 class="about-title">À Propos d'IT-Koncept SA</h2>
        <p class="about-description">
          Spécialiste suisse du stockage de pneus Mercedes-Benz depuis plus de 10 ans, 
          IT-Koncept SA propose des solutions logistiques innovantes et sécurisées. 
          Notre expertise unique combine technologie de pointe et service premium 
          pour répondre aux exigences des garages Mercedes-Benz les plus exigeants.
        </p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-center">
              <i class="fas fa-check-circle text-success me-2"></i>
              <span>Stockage sécurisé</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <i class="fas fa-check-circle text-success me-2"></i>
              <span>Traçabilité QR</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <i class="fas fa-check-circle text-success me-2"></i>
              <span>Certification MB</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <i class="fas fa-check-circle text-success me-2"></i>
              <span>Service 24h/24</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section class="services-section" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
        Nos Services
      </h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
        Découvrez notre gamme complète de services pour la gestion optimale 
        de vos pneus Mercedes-Benz.
      </p>
    </div>
    
    <div class="row g-4">
      @foreach($services as $service)
        <div class="col-lg-4 col-md-6">
          <div class="service-card">
            <div class="service-image">
              <img src="/{{ $service->image }}" alt="{{ $service->name }}">
            </div>
            <div class="service-content">
              <h3 class="service-title">{{ $service->name }}</h3>
              <p class="service-description">{{ $service->description }}</p>
              <a href="{{ route('front.services') }}" class="service-link">
                En savoir plus <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
        Témoignages Clients
      </h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
        Ce que disent nos clients satisfaits de nos services de stockage de pneus.
      </p>
    </div>
    
    <div class="row g-4">
      @foreach($testimonials as $testimonial)
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card">
            <p class="testimonial-content">{{ $testimonial->testimonial }}</p>
            <div class="testimonial-author">
              <img src="/{{ $testimonial->photo }}" alt="{{ $testimonial->client_name }}" class="testimonial-avatar">
              <div class="testimonial-info">
                <h5>{{ $testimonial->client_name }}</h5>
                @if($testimonial->company)
                  <div class="company">{{ $testimonial->company }}</div>
                @endif
                <div class="testimonial-rating">
                  @for($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star{{ $i <= $testimonial->rating ? '' : '-o' }}"></i>
                  @endfor
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Contact Section -->
<section class="contact-section" data-aos="fade-up">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="contact-card">
          <h2 class="contact-title">Prêt à Commencer ?</h2>
          <p class="contact-description">
            Contactez-nous dès aujourd'hui pour découvrir comment IT-Koncept SA 
            peut optimiser la gestion de vos pneus Mercedes-Benz.
          </p>
          
          <div class="contact-info">
            <div class="contact-item">
              <i class="fas fa-phone"></i>
              <span>+41 22 123 45 67</span>
            </div>
            <div class="contact-item">
              <i class="fas fa-envelope"></i>
              <span>info@it-koncept.ch</span>
            </div>
            <div class="contact-item">
              <i class="fas fa-map-marker-alt"></i>
              <span>Genève, Suisse</span>
            </div>
          </div>
          
          <a href="{{ route('front.contact') }}" class="btn-hero-primary">
            <i class="fas fa-envelope fa-fw me-2"></i>Nous Contacter
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection 