@extends('layouts.front')

@section('title', 'Notre Équipe - IT-Koncept SA')
@section('meta_description', 'Découvrez l\'équipe experte d\'IT-Koncept SA, spécialisée dans le stockage de pneus Mercedes-Benz et la logistique premium avec plus de 10 ans d\'expérience.')

@push('styles')
<style>
  /* Hero Section */
  .team-hero {
    background: linear-gradient(135deg, rgba(24, 24, 24, 0.9) 0%, rgba(24, 24, 24, 0.7) 100%), 
                url('/frontend/assets/img/about/about-18.webp');
    background-size: cover;
    background-position: center;
    padding: 8rem 0 4rem;
    color: white;
    text-align: center;
  }
  
  .team-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  
  .team-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
  }
  
  /* Team Section */
  .team-section {
    padding: 5rem 0;
    background: var(--light-bg);
  }
  
  .team-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
    position: relative;
  }
  
  .team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  }
  
  .team-image {
    height: 300px;
    overflow: hidden;
    position: relative;
  }
  
  .team-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }
  
  .team-card:hover .team-image img {
    transform: scale(1.1);
  }
  
  .team-overlay {
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
  
  .team-card:hover .team-overlay {
    opacity: 1;
  }
  
  .team-social {
    display: flex;
    gap: 1rem;
  }
  
  .team-social a {
    width: 50px;
    height: 50px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-color);
    text-decoration: none;
    transition: all 0.3s ease;
  }
  
  .team-social a:hover {
    background: var(--accent-color);
    color: white;
    transform: translateY(-3px);
  }
  
  .team-content {
    padding: 2rem;
    text-align: center;
  }
  
  .team-name {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
  }
  
  .team-position {
    color: var(--accent-color);
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 1rem;
  }
  
  .team-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 1.5rem;
  }
  
  .team-contact {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
  }
  
  .team-contact a {
    color: #666;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: color 0.3s ease;
  }
  
  .team-contact a:hover {
    color: var(--accent-color);
  }
  
  .team-contact i {
    color: var(--accent-color);
  }
  
  .team-expertise {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
  }
  
  .expertise-tag {
    background: rgba(255,145,0,0.1);
    color: var(--accent-color);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.85rem;
    font-weight: 500;
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
  
  .about-stats {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
  }
  
  .about-stat {
    text-align: center;
    padding: 1.5rem;
    background: var(--light-bg);
    border-radius: 15px;
  }
  
  .about-stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: var(--accent-color);
    margin-bottom: 0.5rem;
  }
  
  .about-stat-label {
    color: #666;
    font-weight: 500;
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
    .team-hero h1 {
      font-size: 2rem;
    }
    
    .team-hero p {
      font-size: 1rem;
    }
    
    .about-content {
      flex-direction: column;
    }
    
    .about-stats {
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
<section class="team-hero" data-aos="fade-up">
  <div class="container">
    <h1>Notre Équipe d'Experts</h1>
    <p>Une équipe passionnée et expérimentée, spécialisée dans le stockage de pneus Mercedes-Benz et la logistique premium.</p>
  </div>
</section>

<!-- Team Section -->
<section class="team-section" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
        L'Équipe IT-Koncept
      </h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
        Découvrez les experts qui font d'IT-Koncept SA le leader du stockage de pneus Mercedes-Benz en Suisse.
      </p>
    </div>
    
    <div class="row g-4">
      @foreach($teamMembers as $member)
        <div class="col-lg-4 col-md-6">
          <div class="team-card">
            <div class="team-image">
              <img src="/{{ $member->photo }}" alt="{{ $member->first_name }} {{ $member->last_name }}">
              <div class="team-overlay">
                <div class="team-social">
                  @if($member->linkedin)
                    <a href="{{ $member->linkedin }}" target="_blank" aria-label="LinkedIn">
                      <i class="fab fa-linkedin-in"></i>
                    </a>
                  @endif
                  @if($member->email)
                    <a href="mailto:{{ $member->email }}" aria-label="Email">
                      <i class="fas fa-envelope"></i>
                    </a>
                  @endif
                  @if($member->phone)
                    <a href="tel:{{ $member->phone }}" aria-label="Téléphone">
                      <i class="fas fa-phone"></i>
                    </a>
                  @endif
                </div>
              </div>
            </div>
            <div class="team-content">
              <h3 class="team-name">{{ $member->first_name }} {{ $member->last_name }}</h3>
              <div class="team-position">{{ $member->position }}</div>
              <p class="team-description">{{ $member->description }}</p>
              
              <div class="team-contact">
                @if($member->email)
                  <a href="mailto:{{ $member->email }}">
                    <i class="fas fa-envelope"></i>
                    {{ $member->email }}
                  </a>
                @endif
                @if($member->phone)
                  <a href="tel:{{ $member->phone }}">
                    <i class="fas fa-phone"></i>
                    {{ $member->phone }}
                  </a>
                @endif
              </div>
              
              <div class="team-expertise">
                <span class="expertise-tag">Mercedes-Benz</span>
                <span class="expertise-tag">Logistique</span>
                <span class="expertise-tag">Stockage</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- About Section -->
<section class="about-section" data-aos="fade-up">
  <div class="container">
    <div class="about-content">
      <div class="about-image">
        <img src="/frontend/assets/img/about/about-portrait-7.webp" alt="Équipe IT-Koncept">
      </div>
      <div class="about-text">
        <h2 class="about-title">Notre Expertise</h2>
        <p class="about-description">
          Avec plus de 10 ans d'expérience dans le secteur automobile et une spécialisation 
          exclusive Mercedes-Benz, notre équipe combine expertise technique et service premium 
          pour offrir des solutions logistiques de pointe.
        </p>
        
        <div class="about-stats">
          <div class="about-stat">
            <div class="about-stat-number">10+</div>
            <div class="about-stat-label">Années d'Expérience</div>
          </div>
          <div class="about-stat">
            <div class="about-stat-number">50+</div>
            <div class="about-stat-label">Clients Satisfaits</div>
          </div>
          <div class="about-stat">
            <div class="about-stat-number">5000+</div>
            <div class="about-stat-label">Pneus Gérés</div>
          </div>
          <div class="about-stat">
            <div class="about-stat-number">24/7</div>
            <div class="about-stat-label">Support Client</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-section" data-aos="fade-up">
  <div class="container">
    <h2 class="cta-title">Travaillons Ensemble</h2>
    <p class="cta-description">
      Notre équipe est prête à vous accompagner dans l'optimisation de votre gestion de pneus Mercedes-Benz.
    </p>
    <a href="{{ route('front.contact') }}" class="btn-cta">
      <i class="fas fa-handshake"></i>
      Rencontrer Notre Équipe
    </a>
  </div>
</section>
@endsection 