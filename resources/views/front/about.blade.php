@extends('layouts.front')

@section('title', 'À Propos - IT-Koncept SA')
@section('meta_description', 'Découvrez l\'histoire, les valeurs et l\'expertise d\'IT-Koncept SA, leader du stockage de pneus Mercedes-Benz en Suisse depuis plus de 10 ans.')

@push('styles')
<style>
  /* Hero Section */
  .about-hero {
    background: linear-gradient(135deg, rgba(24, 24, 24, 0.9) 0%, rgba(24, 24, 24, 0.7) 100%), 
                url('/frontend/assets/img/about/about-18.webp');
    background-size: cover;
    background-position: center;
    padding: 8rem 0 4rem;
    color: white;
    text-align: center;
  }
  
  .about-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  
  .about-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
  }
  
  /* Story Section */
  .story-section {
    padding: 5rem 0;
  }
  
  .story-content {
    display: flex;
    align-items: center;
    gap: 3rem;
  }
  
  .story-image {
    flex: 1;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
  }
  
  .story-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
  }
  
  .story-text {
    flex: 1;
  }
  
  .story-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    border-left: 6px solid var(--accent-color);
    padding-left: 1rem;
  }
  
  .story-description {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #666;
    margin-bottom: 2rem;
  }
  
  /* Timeline Section */
  .timeline-section {
    padding: 5rem 0;
    background: var(--light-bg);
  }
  
  .timeline {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
  }
  
  .timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 4px;
    background: var(--accent-color);
    transform: translateX(-50%);
  }
  
  .timeline-item {
    position: relative;
    margin-bottom: 3rem;
  }
  
  .timeline-item:nth-child(odd) .timeline-content {
    margin-left: 0;
    margin-right: 50%;
    padding-right: 2rem;
    text-align: right;
  }
  
  .timeline-item:nth-child(even) .timeline-content {
    margin-left: 50%;
    margin-right: 0;
    padding-left: 2rem;
    text-align: left;
  }
  
  .timeline-marker {
    position: absolute;
    left: 50%;
    top: 0;
    width: 20px;
    height: 20px;
    background: var(--accent-color);
    border: 4px solid white;
    border-radius: 50%;
    transform: translateX(-50%);
    box-shadow: 0 0 0 4px rgba(255,145,0,0.2);
  }
  
  .timeline-content {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  }
  
  .timeline-year {
    color: var(--accent-color);
    font-weight: 700;
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
  }
  
  .timeline-title {
    color: var(--primary-color);
    font-weight: 700;
    font-size: 1.3rem;
    margin-bottom: 1rem;
  }
  
  .timeline-description {
    color: #666;
    line-height: 1.6;
  }
  
  /* Values Section */
  .values-section {
    padding: 5rem 0;
  }
  
  .value-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem 2rem;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
  }
  
  .value-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  }
  
  .value-icon {
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
  
  .value-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1rem;
  }
  
  .value-description {
    color: #666;
    line-height: 1.6;
  }
  
  /* Stats Section */
  .stats-section {
    padding: 5rem 0;
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
  
  /* Mission Section */
  .mission-section {
    padding: 5rem 0;
    background: var(--light-bg);
  }
  
  .mission-card {
    background: white;
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    text-align: center;
  }
  
  .mission-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1.5rem;
  }
  
  .mission-description {
    font-size: 1.2rem;
    line-height: 1.8;
    color: #666;
    margin-bottom: 2rem;
  }
  
  .mission-points {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
  }
  
  .mission-point {
    text-align: center;
    padding: 1.5rem;
  }
  
  .mission-point i {
    color: var(--accent-color);
    font-size: 2rem;
    margin-bottom: 1rem;
  }
  
  .mission-point h4 {
    color: var(--primary-color);
    font-weight: 700;
    margin-bottom: 0.5rem;
  }
  
  .mission-point p {
    color: #666;
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
    .about-hero h1 {
      font-size: 2rem;
    }
    
    .about-hero p {
      font-size: 1rem;
    }
    
    .story-content {
      flex-direction: column;
    }
    
    .timeline::before {
      left: 20px;
    }
    
    .timeline-item:nth-child(odd) .timeline-content,
    .timeline-item:nth-child(even) .timeline-content {
      margin-left: 50px;
      margin-right: 0;
      padding-left: 2rem;
      padding-right: 0;
      text-align: left;
    }
    
    .timeline-marker {
      left: 20px;
    }
    
    .mission-points {
      grid-template-columns: 1fr;
    }
    
    .cta-title {
      font-size: 2rem;
    }
  }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="about-hero" data-aos="fade-up">
  <div class="container">
    <h1>À Propos d'IT-Koncept SA</h1>
    <p>Plus de 10 ans d'expertise dans le stockage de pneus Mercedes-Benz et la logistique premium en Suisse.</p>
  </div>
</section>

<!-- Story Section -->
<section class="story-section" data-aos="fade-up">
  <div class="container">
    <div class="story-content">
      <div class="story-image">
        <img src="/frontend/assets/img/about/about-portrait-7.webp" alt="IT-Koncept SA">
      </div>
      <div class="story-text">
        <h2 class="story-title">Notre Histoire</h2>
        <p class="story-description">
          Fondée en 2014, IT-Koncept SA est née de la vision d'offrir une solution logistique 
          innovante et sécurisée pour les pneus Mercedes-Benz. Notre passion pour l'excellence 
          et notre expertise technique nous ont permis de devenir le partenaire de confiance 
          des garages et concessionnaires Mercedes-Benz en Suisse.
        </p>
        <p class="story-description">
          Aujourd'hui, avec plus de 50 clients satisfaits et plus de 5000 pneus gérés, 
          nous continuons d'innover pour offrir des services toujours plus performants 
          et adaptés aux besoins de nos clients.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Timeline Section -->
<section class="timeline-section" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
        Notre Parcours
      </h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
        Découvrez les étapes clés qui ont fait d'IT-Koncept SA le leader du stockage de pneus Mercedes-Benz.
      </p>
    </div>
    
    <div class="timeline">
      <div class="timeline-item">
        <div class="timeline-marker"></div>
        <div class="timeline-content">
          <div class="timeline-year">2014</div>
          <h3 class="timeline-title">Création d'IT-Koncept SA</h3>
          <p class="timeline-description">
            Fondation de l'entreprise avec la vision d'innover dans la logistique automobile. 
            Premiers locaux de stockage sécurisé à Nyon.
          </p>
        </div>
      </div>
      
      <div class="timeline-item">
        <div class="timeline-marker"></div>
        <div class="timeline-content">
          <div class="timeline-year">2016</div>
          <h3 class="timeline-title">Certification Mercedes-Benz</h3>
          <p class="timeline-description">
            Obtention de la certification officielle Mercedes-Benz. 
            Début des partenariats avec les concessionnaires MB.
          </p>
        </div>
      </div>
      
      <div class="timeline-item">
        <div class="timeline-marker"></div>
        <div class="timeline-content">
          <div class="timeline-year">2018</div>
          <h3 class="timeline-title">Système de Traçabilité QR</h3>
          <p class="timeline-description">
            Développement et mise en place du système de traçabilité QR unique. 
            Innovation majeure dans le secteur.
          </p>
        </div>
      </div>
      
      <div class="timeline-item">
        <div class="timeline-marker"></div>
        <div class="timeline-content">
          <div class="timeline-year">2020</div>
          <h3 class="timeline-title">Expansion Régionale</h3>
          <p class="timeline-description">
            Ouverture de nouveaux centres de stockage. 
            Couverture étendue à toute la Suisse romande.
          </p>
        </div>
      </div>
      
      <div class="timeline-item">
        <div class="timeline-marker"></div>
        <div class="timeline-content">
          <div class="timeline-year">2024</div>
          <h3 class="timeline-title">Leader du Secteur</h3>
          <p class="timeline-description">
            IT-Koncept SA devient le leader incontesté du stockage de pneus Mercedes-Benz 
            en Suisse avec plus de 50 clients fidèles.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Values Section -->
<section class="values-section" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
        Nos Valeurs
      </h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
        Les principes qui guident nos actions et définissent notre engagement envers l'excellence.
      </p>
    </div>
    
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="value-card">
          <div class="value-icon">
            <i class="fas fa-award"></i>
          </div>
          <h3 class="value-title">Excellence</h3>
          <p class="value-description">
            Nous visons l'excellence dans chaque aspect de nos services, 
            en respectant les plus hauts standards de qualité Mercedes-Benz.
          </p>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6">
        <div class="value-card">
          <div class="value-icon">
            <i class="fas fa-shield-alt"></i>
          </div>
          <h3 class="value-title">Sécurité</h3>
          <p class="value-description">
            La sécurité de vos pneus est notre priorité absolue. 
            Surveillance 24h/24, accès sécurisé et assurance complète.
          </p>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6">
        <div class="value-card">
          <div class="value-icon">
            <i class="fas fa-users"></i>
          </div>
          <h3 class="value-title">Proximité</h3>
          <p class="value-description">
            Une équipe dédiée et réactive, toujours disponible pour vous accompagner 
            et répondre à vos besoins spécifiques.
          </p>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6">
        <div class="value-card">
          <div class="value-icon">
            <i class="fas fa-lightbulb"></i>
          </div>
          <h3 class="value-title">Innovation</h3>
          <p class="value-description">
            Nous innovons constamment pour améliorer nos services et 
            offrir des solutions toujours plus performantes.
          </p>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6">
        <div class="value-card">
          <div class="value-icon">
            <i class="fas fa-handshake"></i>
          </div>
          <h3 class="value-title">Confiance</h3>
          <p class="value-description">
            La confiance de nos clients est notre plus grande récompense. 
            Nous la méritons chaque jour par notre professionnalisme.
          </p>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6">
        <div class="value-card">
          <div class="value-icon">
            <i class="fas fa-leaf"></i>
          </div>
          <h3 class="value-title">Durabilité</h3>
          <p class="value-description">
            Nous nous engageons pour un avenir durable en optimisant 
            la durée de vie des pneus et en réduisant l'impact environnemental.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Stats Section -->
<section class="stats-section" data-aos="fade-up">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-number" data-count="10">0</div>
          <div class="stat-label">Années d'Expérience</div>
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
          <div class="stat-number" data-count="5000">0</div>
          <div class="stat-label">Pneus Gérés</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-number" data-count="99">0</div>
          <div class="stat-label">% de Satisfaction</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Mission Section -->
<section class="mission-section" data-aos="fade-up">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="mission-card">
          <h2 class="mission-title">Notre Mission</h2>
          <p class="mission-description">
            Offrir aux garages et concessionnaires Mercedes-Benz des solutions logistiques 
            innovantes, sécurisées et durables pour la gestion de leurs pneus, 
            en contribuant à l'optimisation de leurs opérations et à la satisfaction de leurs clients.
          </p>
          
          <div class="mission-points">
            <div class="mission-point">
              <i class="fas fa-target"></i>
              <h4>Objectif</h4>
              <p>Devenir le partenaire logistique de référence pour tous les professionnels Mercedes-Benz</p>
            </div>
            <div class="mission-point">
              <i class="fas fa-eye"></i>
              <h4>Vision</h4>
              <p>Révolutionner la gestion logistique des pneus par l'innovation technologique</p>
            </div>
            <div class="mission-point">
              <i class="fas fa-heart"></i>
              <h4>Passion</h4>
              <p>Servir l'excellence automobile avec dévouement et professionnalisme</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-section" data-aos="fade-up">
  <div class="container">
    <h2 class="cta-title">Prêt à Nous Rejoindre ?</h2>
    <p class="cta-description">
      Découvrez comment IT-Koncept SA peut transformer votre gestion de pneus Mercedes-Benz 
      et vous accompagner vers l'excellence opérationnelle.
    </p>
    <a href="{{ route('front.contact') }}" class="btn-cta">
      <i class="fas fa-rocket"></i>
      Démarrer Maintenant
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