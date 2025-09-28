@extends('layouts.front')

@section('title', 'Blog & Actualités - IT-Koncept SA')
@section('meta_description', 'Découvrez nos derniers articles sur le stockage de pneus Mercedes-Benz, la logistique innovante et les actualités du secteur automobile.')

@push('styles')
<style>
  /* Hero Section */
  .blog-hero {
    background: linear-gradient(135deg, rgba(24, 24, 24, 0.9) 0%, rgba(24, 24, 24, 0.7) 100%), 
                url('/frontend/assets/img/services/services-11.webp');
    background-size: cover;
    background-position: center;
    padding: 8rem 0 4rem;
    color: white;
    text-align: center;
  }
  
  .blog-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  
  .blog-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
  }
  
  /* Search & Filters Section */
  .filters-section {
    padding: 3rem 0;
    background: var(--light-bg);
  }
  
  .filters-container {
    max-width: 1000px;
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
  
  .filters-row {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 2rem;
  }
  
  .filter-group {
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .filter-label {
    font-weight: 600;
    color: var(--primary-color);
    white-space: nowrap;
  }
  
  .filter-select {
    padding: 0.75rem 1rem;
    border: 2px solid #e9ecef;
    border-radius: 25px;
    background: white;
    color: var(--primary-color);
    font-weight: 500;
    transition: all 0.3s ease;
    min-width: 150px;
  }
  
  .filter-select:focus {
    border-color: var(--accent-color);
    outline: none;
  }
  
  .clear-filters {
    background: var(--accent-color);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .clear-filters:hover {
    background: #e67e00;
    transform: translateY(-2px);
    color: white;
  }
  
  /* Results Info */
  .results-info {
    background: white;
    border-radius: 15px;
    padding: 1.5rem 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
  }
  
  .results-count {
    color: var(--primary-color);
    font-weight: 600;
  }
  
  .results-filters {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
  }
  
  .filter-tag {
    background: rgba(255,145,0,0.1);
    color: var(--accent-color);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  /* Blog Section */
  .blog-section {
    padding: 5rem 0;
  }
  
  .article-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  
  .article-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  }
  
  .article-image {
    position: relative;
    height: 250px;
    overflow: hidden;
  }
  
  .article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }
  
  .article-card:hover .article-image img {
    transform: scale(1.1);
  }
  
  .article-category {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background: var(--accent-color);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
  }
  
  .article-content {
    padding: 2rem;
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  
  .article-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
    font-size: 0.9rem;
    color: #666;
  }
  
  .article-author {
    color: var(--accent-color);
    font-weight: 600;
  }
  
  .article-date {
    color: #999;
  }
  
  .article-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1rem;
    line-height: 1.4;
  }
  
  .article-excerpt {
    color: #666;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    flex: 1;
  }
  
  .article-link {
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
  }
  
  .article-link:hover {
    color: #e67e00;
    transform: translateX(5px);
  }
  
  /* Empty State */
  .empty-state {
    text-align: center;
    padding: 5rem 2rem;
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  }
  
  .empty-icon {
    font-size: 4rem;
    color: #ddd;
    margin-bottom: 2rem;
  }
  
  .empty-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1rem;
  }
  
  .empty-description {
    color: #666;
    margin-bottom: 2rem;
  }
  
  /* Pagination */
  .pagination-container {
    margin-top: 4rem;
    text-align: center;
  }
  
  .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    flex-wrap: wrap;
  }
  
  .page-link {
    background: white;
    color: var(--primary-color);
    border: 2px solid #e9ecef;
    padding: 0.75rem 1rem;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    min-width: 45px;
    text-align: center;
  }
  
  .page-link:hover,
  .page-link.active {
    background: var(--accent-color);
    color: white;
    border-color: var(--accent-color);
    transform: translateY(-2px);
  }
  
  .page-link.disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }
  
  /* Responsive */
  @media (max-width: 768px) {
    .blog-hero h1 {
      font-size: 2rem;
    }
    
    .blog-hero p {
      font-size: 1rem;
    }
    
    .filters-row {
      flex-direction: column;
      align-items: center;
    }
    
    .filter-group {
      width: 100%;
      max-width: 300px;
    }
    
    .results-info {
      flex-direction: column;
      text-align: center;
    }
    
    .article-content {
      padding: 1.5rem;
    }
    
    .article-title {
      font-size: 1.1rem;
    }
  }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="blog-hero" data-aos="fade-up">
  <div class="container">
    <h1>Blog & Actualités</h1>
    <p>Restez informés des dernières innovations et actualités du secteur du stockage de pneus Mercedes-Benz.</p>
  </div>
</section>

<!-- Search & Filters Section -->
<section class="filters-section" data-aos="fade-up">
  <div class="container">
    <div class="filters-container">
      <form method="GET" action="{{ route('front.blog') }}" id="blogFilters">
        <div class="search-box">
          <i class="fas fa-search search-icon"></i>
          <input type="text" name="search" class="search-input" 
                 placeholder="Rechercher un article..." 
                 value="{{ request('search') }}">
        </div>
        
        <div class="filters-row">
          <div class="filter-group">
            <span class="filter-label">Catégorie :</span>
            <select name="category" class="filter-select">
              <option value="">Toutes les catégories</option>
              <option value="stockage" {{ request('category') == 'stockage' ? 'selected' : '' }}>Stockage</option>
              <option value="logistique" {{ request('category') == 'logistique' ? 'selected' : '' }}>Logistique</option>
              <option value="technologie" {{ request('category') == 'technologie' ? 'selected' : '' }}>Technologie</option>
              <option value="mercedes-benz" {{ request('category') == 'mercedes-benz' ? 'selected' : '' }}>Mercedes-Benz</option>
              <option value="actualites" {{ request('category') == 'actualites' ? 'selected' : '' }}>Actualités</option>
            </select>
          </div>
          
          <div class="filter-group">
            <span class="filter-label">Auteur :</span>
            <select name="author" class="filter-select">
              <option value="">Tous les auteurs</option>
              @if(isset($authors))
                @foreach($authors as $author)
                  <option value="{{ $author }}" {{ request('author') == $author ? 'selected' : '' }}>
                    {{ $author }}
                  </option>
                @endforeach
              @endif
            </select>
          </div>
          
          <div class="filter-group">
            <span class="filter-label">Date :</span>
            <select name="date" class="filter-select">
              <option value="">Toutes les dates</option>
              <option value="week" {{ request('date') == 'week' ? 'selected' : '' }}>Cette semaine</option>
              <option value="month" {{ request('date') == 'month' ? 'selected' : '' }}>Ce mois</option>
              <option value="quarter" {{ request('date') == 'quarter' ? 'selected' : '' }}>Ce trimestre</option>
              <option value="year" {{ request('date') == 'year' ? 'selected' : '' }}>Cette année</option>
            </select>
          </div>
          
          @if(request('search') || request('category') || request('author') || request('date'))
            <a href="{{ route('front.blog') }}" class="clear-filters">
              <i class="fas fa-times"></i>
              Effacer
            </a>
          @endif
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Results Info -->
@if(request('search') || request('category') || request('author') || request('date'))
  <section data-aos="fade-up">
    <div class="container">
      <div class="results-info">
        <div class="results-count">
          <i class="fas fa-search"></i>
          {{ $articles->total() }} article(s) trouvé(s)
        </div>
        <div class="results-filters">
          @if(request('search'))
            <span class="filter-tag">
              Recherche: "{{ request('search') }}"
              <i class="fas fa-times"></i>
            </span>
          @endif
          @if(request('category'))
            <span class="filter-tag">
              Catégorie: {{ ucfirst(request('category')) }}
              <i class="fas fa-times"></i>
            </span>
          @endif
          @if(request('author'))
            <span class="filter-tag">
              Auteur: {{ request('author') }}
              <i class="fas fa-times"></i>
            </span>
          @endif
          @if(request('date'))
            <span class="filter-tag">
              Date: {{ ucfirst(request('date')) }}
              <i class="fas fa-times"></i>
            </span>
          @endif
        </div>
      </div>
    </div>
  </section>
@endif

<!-- Blog Section -->
<section class="blog-section" data-aos="fade-up">
  <div class="container">
    @if($articles->count() > 0)
      <div class="row g-4">
        @foreach($articles as $article)
          <div class="col-lg-4 col-md-6">
            <article class="article-card">
              <div class="article-image">
                <img src="/{{ $article->image }}" alt="{{ $article->title }}">
                <div class="article-category">
                  {{ $article->category ?? 'Actualités' }}
                </div>
              </div>
              <div class="article-content">
                <div class="article-meta">
                  <span class="article-author">
                    <i class="fas fa-user"></i>
                    {{ $article->author }}
                  </span>
                  <span class="article-date">
                    <i class="fas fa-calendar"></i>
                    {{ $article->published_at->format('d/m/Y') }}
                  </span>
                </div>
                <h3 class="article-title">{{ $article->title }}</h3>
                <p class="article-excerpt">{{ $article->excerpt }}</p>
                <a href="{{ route('front.article', $article->slug) }}" class="article-link">
                  Lire la suite
                  <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </article>
          </div>
        @endforeach
      </div>
    @else
      <div class="empty-state">
        <div class="empty-icon">
          <i class="fas fa-search"></i>
        </div>
        <h3 class="empty-title">Aucun article trouvé</h3>
        <p class="empty-description">
          Essayez de modifier vos critères de recherche ou consultez tous nos articles.
        </p>
        <a href="{{ route('front.blog') }}" class="clear-filters">
          <i class="fas fa-list"></i>
          Voir tous les articles
        </a>
      </div>
    @endif
    
    <!-- Pagination -->
    @if($articles->hasPages())
      <div class="pagination-container">
        <div class="pagination">
          {{-- Previous Page Link --}}
          @if ($articles->onFirstPage())
            <span class="page-link disabled">
              <i class="fas fa-chevron-left"></i>
            </span>
          @else
            <a href="{{ $articles->previousPageUrl() }}" class="page-link">
              <i class="fas fa-chevron-left"></i>
            </a>
          @endif

          {{-- Pagination Elements --}}
          @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)
            @if ($page == $articles->currentPage())
              <span class="page-link active">{{ $page }}</span>
            @else
              <a href="{{ $url }}" class="page-link">{{ $page }}</a>
            @endif
          @endforeach

          {{-- Next Page Link --}}
          @if ($articles->hasMorePages())
            <a href="{{ $articles->nextPageUrl() }}" class="page-link">
              <i class="fas fa-chevron-right"></i>
            </a>
          @else
            <span class="page-link disabled">
              <i class="fas fa-chevron-right"></i>
            </span>
          @endif
        </div>
      </div>
    @endif
  </div>
</section>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Auto-submit form when filters change
    const filterSelects = document.querySelectorAll('.filter-select');
    filterSelects.forEach(select => {
      select.addEventListener('change', function() {
        document.getElementById('blogFilters').submit();
      });
    });
    
    // Remove filter tags
    const filterTags = document.querySelectorAll('.filter-tag');
    filterTags.forEach(tag => {
      const closeIcon = tag.querySelector('.fas.fa-times');
      if (closeIcon) {
        closeIcon.addEventListener('click', function() {
          const filterType = tag.textContent.split(':')[0].toLowerCase();
          const filterValue = tag.textContent.split(':')[1].trim().replace(/"/g, '');
          
          // Remove the specific filter from URL
          const url = new URL(window.location);
          if (filterType === 'recherche') {
            url.searchParams.delete('search');
          } else if (filterType === 'catégorie') {
            url.searchParams.delete('category');
          } else if (filterType === 'auteur') {
            url.searchParams.delete('author');
          } else if (filterType === 'date') {
            url.searchParams.delete('date');
          }
          
          window.location.href = url.toString();
        });
      }
    });
    
    // Search with Enter key
    const searchInput = document.querySelector('.search-input');
    searchInput.addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        document.getElementById('blogFilters').submit();
      }
    });
  });
</script>
@endpush 