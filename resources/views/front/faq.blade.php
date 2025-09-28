@extends('layouts.front')

@section('title', 'FAQ - Questions Fréquentes - IT-Koncept SA')
@section('meta_description', 'Trouvez rapidement les réponses à vos questions sur le stockage de pneus Mercedes-Benz, la sécurité, la traçabilité QR et nos services logistiques.')

@push('styles')
<style>
  /* Hero Section */
  .faq-hero {
    background: linear-gradient(135deg, rgba(24, 24, 24, 0.9) 0%, rgba(24, 24, 24, 0.7) 100%), 
                url('/frontend/assets/img/services/services-8.webp');
    background-size: cover;
    background-position: center;
    padding: 8rem 0 4rem;
    color: white;
    text-align: center;
  }
  
  .faq-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  
  .faq-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
  }
  
  /* Search Section */
  .search-section {
    padding: 3rem 0;
    background: var(--light-bg);
  }
  
  .search-container {
    max-width: 600px;
    margin: 0 auto;
  }
  
  .search-box {
    position: relative;
    margin-bottom: 2rem;
  }
  
  .search-input {
    width: 100%;
    padding: 1.5rem 1rem 1.5rem 3rem;
    border: 2px solid #e9ecef;
    border-radius: 50px;
    font-size: 1.1rem;
    transition: all 0.3s ease;
  }
  
  .search-input:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 0.2rem rgba(255,145,0,0.25);
    outline: none;
  }
  
  .search-icon {
    position: absolute;
    left: 1.5rem;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 1.2rem;
  }
  
  /* Categories */
  .categories {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 2rem;
  }
  
  .category-btn {
    background: white;
    color: var(--primary-color);
    border: 2px solid #e9ecef;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: pointer;
  }
  
  .category-btn:hover,
  .category-btn.active {
    background: var(--accent-color);
    color: white;
    border-color: var(--accent-color);
    transform: translateY(-2px);
  }
  
  /* FAQ Section */
  .faq-section {
    padding: 5rem 0;
  }
  
  .faq-container {
    max-width: 800px;
    margin: 0 auto;
  }
  
  .faq-item {
    background: white;
    border-radius: 15px;
    margin-bottom: 1rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    overflow: hidden;
    transition: all 0.3s ease;
  }
  
  .faq-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
  }
  
  .faq-header {
    background: white;
    border: none;
    padding: 1.5rem 2rem;
    width: 100%;
    text-align: left;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: all 0.3s ease;
  }
  
  .faq-header:hover {
    background: rgba(255,145,0,0.05);
  }
  
  .faq-header[aria-expanded="true"] {
    background: var(--accent-color);
    color: white;
  }
  
  .faq-title {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-weight: 600;
    font-size: 1.1rem;
    margin: 0;
  }
  
  .faq-icon {
    width: 40px;
    height: 40px;
    background: rgba(255,145,0,0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-color);
    font-size: 1.2rem;
  }
  
  .faq-header[aria-expanded="true"] .faq-icon {
    background: rgba(255,255,255,0.2);
    color: white;
  }
  
  .faq-toggle {
    width: 30px;
    height: 30px;
    background: rgba(255,145,0,0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-color);
    transition: all 0.3s ease;
  }
  
  .faq-header[aria-expanded="true"] .faq-toggle {
    background: rgba(255,255,255,0.2);
    color: white;
    transform: rotate(45deg);
  }
  
  .faq-body {
    padding: 0 2rem 1.5rem;
    color: #666;
    line-height: 1.6;
  }
  
  .faq-body p {
    margin-bottom: 1rem;
  }
  
  .faq-body ul {
    margin-bottom: 1rem;
    padding-left: 1.5rem;
  }
  
  .faq-body li {
    margin-bottom: 0.5rem;
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
    .faq-hero h1 {
      font-size: 2rem;
    }
    
    .faq-hero p {
      font-size: 1rem;
    }
    
    .categories {
      flex-direction: column;
      align-items: center;
    }
    
    .category-btn {
      width: 100%;
      max-width: 300px;
      text-align: center;
    }
    
    .faq-header {
      padding: 1rem 1.5rem;
    }
    
    .faq-body {
      padding: 0 1.5rem 1rem;
    }
  }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="faq-hero" data-aos="fade-up">
  <div class="container">
    <h1>Questions Fréquentes</h1>
    <p>Trouvez rapidement les réponses à vos questions sur nos services de stockage de pneus Mercedes-Benz.</p>
  </div>
</section>

<!-- Search Section -->
<section class="search-section" data-aos="fade-up">
  <div class="container">
    <div class="search-container">
      <div class="search-box">
        <i class="fas fa-search search-icon"></i>
        <input type="text" class="search-input" id="faqSearch" placeholder="Rechercher une question...">
      </div>
      
      <div class="categories">
        <button class="category-btn active" data-category="all">Toutes</button>
        <button class="category-btn" data-category="security">Sécurité</button>
        <button class="category-btn" data-category="tracking">Traçabilité</button>
        <button class="category-btn" data-category="logistics">Logistique</button>
        <button class="category-btn" data-category="pricing">Tarifs</button>
        <button class="category-btn" data-category="support">Support</button>
        <button class="category-btn" data-category="services">Services</button>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="faq-section" data-aos="fade-up">
  <div class="container">
    <div class="faq-container">
      @forelse($faqs as $index => $faq)
        <div class="faq-item" data-category="{{ $faq->category }}">
          <button class="faq-header" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}" aria-expanded="false">
            <div class="faq-title">
              <div class="faq-icon">
                <i class="{{ $faq->icon }}"></i>
              </div>
              {{ $faq->question }}
            </div>
            <div class="faq-toggle">
              <i class="fas fa-plus"></i>
            </div>
          </button>
          <div id="faq{{ $faq->id }}" class="collapse">
            <div class="faq-body">
              {!! nl2br(e($faq->answer)) !!}
            </div>
          </div>
        </div>
      @empty
        <div class="text-center py-5">
          <i class="fas fa-question-circle" style="font-size: 3rem; color: #ddd; margin-bottom: 1rem;"></i>
          <h4>Aucune FAQ disponible</h4>
          <p>Les questions fréquentes seront bientôt disponibles.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Contact Section -->
<section class="contact-section" data-aos="fade-up">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="contact-card">
          <h2 class="contact-title">Vous ne trouvez pas votre réponse ?</h2>
          <p class="contact-description">
            Notre équipe d'experts est là pour vous aider. Contactez-nous pour une réponse personnalisée.
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

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('faqSearch');
    const faqItems = document.querySelectorAll('.faq-item');
    
    searchInput.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      
      faqItems.forEach(item => {
        const title = item.querySelector('.faq-title').textContent.toLowerCase();
        const body = item.querySelector('.faq-body').textContent.toLowerCase();
        
        if (title.includes(searchTerm) || body.includes(searchTerm)) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
    
    // Category filtering
    const categoryBtns = document.querySelectorAll('.category-btn');
    
    categoryBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        const category = this.getAttribute('data-category');
        
        // Update active button
        categoryBtns.forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        // Filter items
        faqItems.forEach(item => {
          const itemCategory = item.getAttribute('data-category');
          
          if (category === 'all' || itemCategory === category) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
        
        // Clear search
        searchInput.value = '';
      });
    });
    
    // Smooth scroll to FAQ items when searching
    searchInput.addEventListener('keyup', function(e) {
      if (e.key === 'Enter') {
        const visibleItems = document.querySelectorAll('.faq-item[style="display: block"]');
        if (visibleItems.length > 0) {
          visibleItems[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
      }
    });
  });
</script>
@endpush 