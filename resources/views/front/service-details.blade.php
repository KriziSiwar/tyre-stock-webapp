@extends('layouts.front')

@section('title', 'Nos Services - IT-Koncept SA')
@section('meta_description', 'Découvrez nos services premium de stockage de pneus Mercedes-Benz : traçabilité QR, sécurité 24h/24, gestion logistique optimisée et conseil expert.')

@push('styles')
<style>
  /* Hero Section */
  .services-hero {
    background: linear-gradient(135deg, rgba(24, 24, 24, 0.9) 0%, rgba(24, 24, 24, 0.7) 100%), 
                url('/frontend/assets/img/services/services-1.webp');
    background-size: cover;
    background-position: center;
    padding: 8rem 0 4rem;
    color: white;
    text-align: center;
  }
  
  .services-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  
  .services-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
  }
  
  /* Services Grid */
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
    position: relative;
  }
  
  .service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  }
  
  .service-image {
    height: 250px;
    overflow: hidden;
    position: relative;
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
  
  .service-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255,145,0,0.8), rgba(230,126,0,0.8));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  
  .service-card:hover .service-overlay {
    opacity: 1;
  }
  
  .service-overlay i {
    font-size: 3rem;
    color: white;
  }
  
  .service-content {
    padding: 2rem;
  }
  
  .service-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }
  
  .service-title i {
    color: var(--accent-color);
    font-size: 1.2rem;
  }
  
  .service-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 1.5rem;
  }
  
  .service-features {
    list-style: none;
    padding: 0;
    margin: 0 0 1.5rem 0;
  }
  
  .service-features li {
    padding: 0.5rem 0;
    color: #666;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .service-features li i {
    color: var(--accent-color);
    font-size: 0.9rem;
  }
  
  .service-action {
    text-align: center;
  }
  
  .btn-service {
    background: var(--accent-color);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid var(--accent-color);
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .btn-service:hover {
    background: transparent;
    color: var(--accent-color);
    transform: translateY(-2px);
  }
  
  /* Stats Section */
  .stats-section {
    padding: 4rem 0;
    background: var(--primary-color);
    color: white;
  }
  
  .stat-item {
    text-align: center;
    padding: 2rem 1rem;
  }
  
  .stat-number {
    font-size: 3rem;
    font-weight: 700;
    color: var(--accent-color);
    margin-bottom: 0.5rem;
  }
  
  .stat-label {
    font-size: 1.1rem;
    opacity: 0.9;
  }
  
  /* CTA Section */
  .cta-section {
    padding: 5rem 0;
    background: linear-gradient(135deg, var(--accent-color), #e67e00);
    color: white;
    text-align: center;
  }
  
  .cta-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
  }
  
  .cta-description {
    font-size: 1.1rem;
    margin-bottom: 2rem;
    opacity: 0.9;
  }
  
  .btn-cta {
    background: white;
    color: var(--accent-color);
    padding: 1rem 2rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid white;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .btn-cta:hover {
    background: transparent;
    color: white;
    transform: translateY(-3px);
  }
  
  /* Responsive */
  @media (max-width: 768px) {
    .services-hero h1 {
      font-size: 2rem;
    }
    
    .services-hero p {
      font-size: 1rem;
    }
    
    .cta-title {
      font-size: 2rem;
    }
  }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="services-hero" data-aos="fade-up">
  <div class="container">
    <h1>Nos Services Premium</h1>
    <p>Solution complète de stockage et gestion de pneus Mercedes-Benz avec traçabilité QR, sécurité 24h/24 et expertise certifiée.</p>
  </div>
</section>

<!-- Services Section -->
<section class="services-section" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
        Services Spécialisés
      </h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
        Découvrez notre gamme complète de services conçus pour optimiser la gestion de vos pneus Mercedes-Benz.
      </p>
    </div>
    
    <div class="row g-4">
      @foreach($services as $service)
        <div class="col-lg-4 col-md-6">
          <div class="service-card">
            <div class="service-image">
              <img src="/{{ $service->image }}" alt="{{ $service->name }}">
              <div class="service-overlay">
                <i class="fas fa-cogs"></i>
              </div>
            </div>
            <div class="service-content">
              <h3 class="service-title">
                <i class="fas fa-shield-alt"></i>
                {{ $service->name }}
              </h3>
              <p class="service-description">{{ $service->description }}</p>
              
              <ul class="service-features">
                <li><i class="fas fa-check"></i> Sécurité maximale</li>
                <li><i class="fas fa-check"></i> Traçabilité complète</li>
                <li><i class="fas fa-check"></i> Service 24h/24</li>
              </ul>
              
              <div class="service-action">
                <a href="{{ route('front.contact') }}" class="btn-service">
                  <i class="fas fa-envelope"></i>
                  Demander un Devis
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Stats Section -->
<section class="stats-section" data-aos="fade-up">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-number" data-count="5000">0</div>
          <div class="stat-label">Pneus Stockés</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-number" data-count="50">0</div>
          <div class="stat-label">Clients Satisfaits</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-number" data-count="99">0</div>
          <div class="stat-label">% de Satisfaction</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-number" data-count="10">0</div>
          <div class="stat-label">Années d'Expérience</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-section" data-aos="fade-up">
  <div class="container">
    <h2 class="cta-title">Prêt à Optimiser Votre Gestion de Pneus ?</h2>
    <p class="cta-description">
      Contactez-nous dès aujourd'hui pour découvrir comment IT-Koncept SA peut transformer 
      votre logistique de pneus Mercedes-Benz.
    </p>
    <a href="{{ route('front.contact') }}" class="btn-cta">
      <i class="fas fa-phone"></i>
      Nous Contacter
    </a>
  </div>
</section>
@endsection

@push('scripts')
<script>
  // Animated Counter
  function animateCounter(element, target) {
    let current = 0;
    const increment = target / 100;
    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        current = target;
        clearInterval(timer);
      }
      element.textContent = Math.floor(current);
    }, 20);
  }

  // Trigger counters when in view
  const observerOptions = {
    threshold: 0.5,
    rootMargin: '0px 0px -100px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        const target = parseInt(counter.getAttribute('data-count'));
        animateCounter(counter, target);
        observer.unobserve(counter);
      }
    });
  }, observerOptions);

  // Observe all counters
  document.querySelectorAll('.stat-number').forEach(counter => {
    observer.observe(counter);
  });
</script>
@endpush 