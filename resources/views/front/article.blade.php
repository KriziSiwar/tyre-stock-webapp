@extends('layouts.front')

@section('title', $article->title)
@section('meta_description', $article->excerpt)

@push('styles')
<style>
  .article-page .article-header {
    background: linear-gradient(135deg, #181818 0%, #333 100%);
    color: white;
    padding: 4rem 0;
    margin-bottom: 3rem;
  }
  .article-page .article-header h1 {
    font-weight: 700;
    margin-bottom: 1rem;
  }
  .article-page .article-header .meta {
    color: #ff9100;
    font-size: 0.9rem;
  }
  .article-page .article-content {
    line-height: 1.8;
    color: #333;
  }
  .article-page .article-content h3 {
    color: #181818;
    font-weight: 700;
    margin: 2rem 0 1rem 0;
    border-left: 4px solid #ff9100;
    padding-left: 1rem;
  }
  .article-page .article-content p {
    margin-bottom: 1.5rem;
  }
  .article-page .article-image {
    border-radius: 12px;
    margin: 2rem 0;
    box-shadow: 0 4px 16px #18181822;
  }
  .article-page .sidebar {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 2rem;
    margin-top: 2rem;
  }
  .article-page .sidebar h4 {
    color: #181818;
    font-weight: 700;
    margin-bottom: 1.5rem;
    border-bottom: 2px solid #ff9100;
    padding-bottom: 0.5rem;
  }
  .article-page .recent-article {
    border-bottom: 1px solid #eee;
    padding-bottom: 1rem;
    margin-bottom: 1rem;
  }
  .article-page .recent-article:last-child {
    border-bottom: none;
    padding-bottom: 0;
    margin-bottom: 0;
  }
  .article-page .recent-article h6 {
    color: #181818;
    font-weight: 600;
    margin-bottom: 0.5rem;
  }
  .article-page .recent-article a {
    color: #ff9100;
    text-decoration: none;
    font-size: 0.9rem;
  }
  .article-page .recent-article a:hover {
    text-decoration: underline;
  }
  .article-page .back-link {
    color: #ff9100;
    text-decoration: none;
    font-weight: 600;
    margin-bottom: 2rem;
    display: inline-block;
  }
  .article-page .back-link:hover {
    text-decoration: underline;
  }
</style>
@endpush

@section('content')
<section class="article-page">
  <div class="article-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="meta">
            <span>{{ $article->author }}</span> • 
            <span>{{ $article->published_at->format('d/m/Y') }}</span>
          </div>
          <h1>{{ $article->title }}</h1>
          <p class="lead">{{ $article->excerpt }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <a href="{{ route('front.blog') }}" class="back-link">← Retour au blog</a>
        
        @if($article->image)
          <img src="/{{ $article->image }}" alt="{{ $article->title }}" class="img-fluid article-image">
        @endif
        
        <div class="article-content">
          {!! $article->content !!}
        </div>
      </div>
      
      <div class="col-lg-4">
        <div class="sidebar">
          <h4>Articles récents</h4>
          @foreach($recentArticles as $recentArticle)
            <div class="recent-article">
              <h6>{{ $recentArticle->title }}</h6>
              <div class="meta" style="font-size: 0.8rem; color: #888; margin-bottom: 0.5rem;">
                {{ $recentArticle->published_at->format('d/m/Y') }}
              </div>
              <a href="{{ route('front.article', $recentArticle->slug) }}">
                Lire la suite →
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection 