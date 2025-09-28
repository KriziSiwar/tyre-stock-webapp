@extends('layouts.front')

@section('title', 'Statistiques & Métriques')
@section('meta_description', 'Découvrez les statistiques et métriques de notre activité de stockage de pneus Mercedes-Benz.')

@push('styles')
<style>
  .stats-page .section-title h2 {
    color: #181818;
    font-weight: 700;
    letter-spacing: 1px;
    border-left: 6px solid #ff9100;
    padding-left: 12px;
    margin-bottom: 18px;
    display: inline-block;
  }
  .stats-page .stat-card {
    background: linear-gradient(135deg, #181818 0%, #333 100%);
    color: white;
    border-radius: 18px;
    padding: 2rem;
    text-align: center;
    margin-bottom: 2rem;
    box-shadow: 0 4px 16px #18181822;
    transition: transform 0.2s;
  }
  .stats-page .stat-card:hover {
    transform: translateY(-4px);
  }
  .stats-page .stat-card .stat-number {
    font-size: 3rem;
    font-weight: 700;
    color: #ff9100;
    margin-bottom: 0.5rem;
  }
  .stats-page .stat-card .stat-label {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
  }
  .stats-page .stat-card .stat-description {
    font-size: 0.9rem;
    opacity: 0.8;
  }
  .stats-page .metric-card {
    background: white;
    border: 1px solid #eee;
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 8px #18181811;
  }
  .stats-page .metric-card h4 {
    color: #181818;
    font-weight: 700;
    margin-bottom: 1rem;
    border-bottom: 2px solid #ff9100;
    padding-bottom: 0.5rem;
  }
  .stats-page .rating-display {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
  }
  .stats-page .rating-display .stars {
    color: #ff9100;
    font-size: 1.2rem;
  }
  .stats-page .rating-display .rating-text {
    font-weight: 600;
    color: #181818;
  }
  .stats-page .recent-item {
    border-bottom: 1px solid #eee;
    padding-bottom: 1rem;
    margin-bottom: 1rem;
  }
  .stats-page .recent-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
    margin-bottom: 0;
  }
  .stats-page .recent-item h6 {
    color: #181818;
    font-weight: 600;
    margin-bottom: 0.25rem;
  }
  .stats-page .recent-item .meta {
    font-size: 0.85rem;
    color: #666;
  }
  .stats-page .recent-item a {
    color: #ff9100;
    text-decoration: none;
    font-size: 0.9rem;
  }
  .stats-page .recent-item a:hover {
    text-decoration: underline;
  }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des compteurs
    const counters = document.querySelectorAll('.stat-number');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;
                
                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.textContent = Math.floor(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };
                
                updateCounter();
                observer.unobserve(counter);
            }
        });
    });
    
    counters.forEach(counter => observer.observe(counter));
});
</script>
@endpush

@section('content')
<section class="stats-page section py-5">
  <div class="container">
    <div class="section-title text-center mb-5" data-aos="fade-up">
      <h2>Statistiques & Métriques</h2>
      <p>Découvrez les chiffres clés de notre activité et la satisfaction de nos clients.</p>
    </div>

    <!-- Statistiques principales -->
    <div class="row mb-5">
      <div class="col-lg-3 col-md-6">
        <div class="stat-card">
          <div class="stat-number" data-target="{{ $stats['services_count'] }}">0</div>
          <div class="stat-label">Services</div>
          <div class="stat-description">Solutions proposées</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-card">
          <div class="stat-number" data-target="{{ $stats['team_members_count'] }}">0</div>
          <div class="stat-label">Membres d'équipe</div>
          <div class="stat-description">Experts actifs</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-card">
          <div class="stat-number" data-target="{{ $stats['testimonials_count'] }}">0</div>
          <div class="stat-label">Témoignages</div>
          <div class="stat-description">Clients satisfaits</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-card">
          <div class="stat-number" data-target="{{ $stats['articles_count'] }}">0</div>
          <div class="stat-label">Articles</div>
          <div class="stat-description">Contenus publiés</div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Note moyenne -->
      <div class="col-lg-6">
        <div class="metric-card">
          <h4>Note moyenne des clients</h4>
          <div class="rating-display">
            <div class="stars">
              @for($i = 1; $i <= 5; $i++)
                <i class="fas fa-star{{ $i <= round($stats['average_rating']) ? '' : '-o' }}"></i>
              @endfor
            </div>
            <div class="rating-text">{{ number_format($stats['average_rating'], 1) }}/5</div>
          </div>
          <p class="text-muted">Basé sur {{ $stats['testimonials_count'] }} témoignages clients</p>
        </div>
      </div>

      <!-- Articles récents -->
      <div class="col-lg-6">
        <div class="metric-card">
          <h4>Articles récents</h4>
          @foreach($stats['recent_articles'] as $article)
            <div class="recent-item">
              <h6>{{ $article->title }}</h6>
              <div class="meta">{{ $article->author }} • {{ $article->published_at->format('d/m/Y') }}</div>
              <a href="{{ route('front.article', $article->slug) }}">Lire l'article →</a>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Témoignages 5 étoiles -->
    <div class="row mt-4">
      <div class="col-12">
        <div class="metric-card">
          <h4>Témoignages 5 étoiles</h4>
          <div class="row">
            @foreach($stats['top_rated_testimonials'] as $testimonial)
              <div class="col-md-4">
                <div class="recent-item">
                  <div class="rating-display mb-2">
                    <div class="stars">
                      @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star"></i>
                      @endfor
                    </div>
                  </div>
                  <h6>{{ $testimonial->client_name }}</h6>
                  @if($testimonial->company)
                    <div class="meta">{{ $testimonial->company }}</div>
                  @endif
                  <p class="small">{{ Str::limit($testimonial->testimonial, 100) }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection 