@extends('layouts.front')

@section('title', 'Témoignages clients')
@section('meta_description', 'Découvrez les témoignages de nos clients satisfaits, garages Mercedes-Benz qui nous font confiance pour le stockage de leurs pneus.')

@push('styles')
<style>
  .testimonials-page .section-title h2 {
    color: #181818;
    font-weight: 700;
    letter-spacing: 1px;
    border-left: 6px solid #ff9100;
    padding-left: 12px;
    margin-bottom: 18px;
    display: inline-block;
  }
  .testimonials-page .testimonial-card {
    border: 1px solid #eee;
    box-shadow: 0 2px 8px #18181811;
    border-radius: 18px;
    background: #fff;
    transition: box-shadow 0.2s, transform 0.2s;
    padding: 2rem 1.5rem;
    text-align: center;
    height: 100%;
    position: relative;
  }
  .testimonials-page .testimonial-card:hover {
    box-shadow: 0 6px 24px #ff910033;
    transform: translateY(-4px) scale(1.03);
  }
  .testimonials-page .testimonial-card::before {
    content: '"';
    font-size: 4rem;
    color: #ff9100;
    position: absolute;
    top: -10px;
    left: 20px;
    font-family: serif;
  }
  .testimonials-page .testimonial-card img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 1rem;
    border: 3px solid #ff9100;
  }
  .testimonials-page .testimonial-card .testimonial-text {
    color: #555;
    font-style: italic;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
  }
  .testimonials-page .testimonial-card h5 {
    color: #181818;
    font-weight: 700;
    margin-bottom: 0.25rem;
  }
  .testimonials-page .testimonial-card .company {
    color: #ff9100;
    font-weight: 600;
    font-size: 0.9rem;
  }
  .testimonials-page .rating {
    margin-top: 1rem;
  }
  .testimonials-page .rating i {
    color: #ff9100;
    font-size: 1.2rem;
  }
</style>
@endpush

@section('content')
<section class="testimonials-page section py-5">
  <div class="container">
    <div class="section-title text-center mb-5" data-aos="fade-up">
      <h2>Témoignages clients</h2>
      <p>Ce que disent nos clients satisfaits de nos services de stockage de pneus.</p>
    </div>
    <div class="row g-4 justify-content-center">
      @foreach($testimonials as $testimonial)
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card">
            <img src="/{{ $testimonial->photo }}" alt="{{ $testimonial->client_name }}">
            <div class="testimonial-text">
              {{ $testimonial->testimonial }}
            </div>
            <h5>{{ $testimonial->client_name }}</h5>
            @if($testimonial->company)
              <div class="company">{{ $testimonial->company }}</div>
            @endif
            <div class="rating">
              @for($i = 1; $i <= 5; $i++)
                <i class="fas fa-star{{ $i <= $testimonial->rating ? '' : '-o' }}"></i>
              @endfor
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection 