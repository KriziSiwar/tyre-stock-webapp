@extends('layouts.front')

@section('title', 'Contact - IT-Koncept SA')
@section('meta_description', 'Contactez IT-Koncept SA pour vos besoins de stockage de pneus Mercedes-Benz. Équipe experte, réponse rapide, devis personnalisé.')

@push('styles')
<style>
  /* Hero Section */
  .contact-hero {
    background: linear-gradient(135deg, rgba(24, 24, 24, 0.9) 0%, rgba(24, 24, 24, 0.7) 100%), 
                url('/frontend/assets/img/services/services-2.webp');
    background-size: cover;
    background-position: center;
    padding: 8rem 0 4rem;
    color: white;
    text-align: center;
  }
  
  .contact-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  
  .contact-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
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
    height: 100%;
  }
  
  .contact-info {
    margin-bottom: 3rem;
  }
  
  .contact-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: var(--light-bg);
    border-radius: 15px;
    transition: all 0.3s ease;
  }
  
  .contact-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  }
  
  .contact-icon {
    width: 60px;
    height: 60px;
    background: var(--accent-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
  }
  
  .contact-details h4 {
    color: var(--primary-color);
    font-weight: 700;
    margin-bottom: 0.5rem;
  }
  
  .contact-details p {
    color: #666;
    margin-bottom: 0;
  }
  
  .contact-details a {
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 600;
  }
  
  .contact-details a:hover {
    text-decoration: underline;
  }
  
  /* Form Styles */
  .form-group {
    margin-bottom: 1.5rem;
  }
  
  .form-label {
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 0.5rem;
  }
  
  .form-control {
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
  }
  
  .form-control:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 0.2rem rgba(255,145,0,0.25);
  }
  
  .form-control::placeholder {
    color: #999;
  }
  
  .btn-contact {
    background: var(--accent-color);
    color: white;
    padding: 1rem 2rem;
    border-radius: 50px;
    border: 2px solid var(--accent-color);
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .btn-contact:hover {
    background: transparent;
    color: var(--accent-color);
    transform: translateY(-3px);
  }
  
  .btn-contact:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
  }
  
  .spinner-border {
    width: 1.2rem;
    height: 1.2rem;
    border-width: 0.15em;
  }
  
  /* Map Section */
  .map-section {
    padding: 5rem 0;
  }
  
  .map-container {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    height: 400px;
  }
  
  .map-container iframe {
    width: 100%;
    height: 100%;
    border: none;
  }
  
  /* Alert Styles */
  .alert {
    border-radius: 15px;
    border: none;
    padding: 1rem 1.5rem;
    margin-bottom: 2rem;
  }
  
  .alert-success {
    background: rgba(40, 167, 69, 0.1);
    color: #155724;
    border-left: 4px solid #28a745;
  }
  
  .alert-danger {
    background: rgba(220, 53, 69, 0.1);
    color: #721c24;
    border-left: 4px solid #dc3545;
  }
  
  /* Responsive */
  @media (max-width: 768px) {
    .contact-hero h1 {
      font-size: 2rem;
    }
    
    .contact-hero p {
      font-size: 1rem;
    }
    
    .contact-card {
      padding: 2rem;
    }
  }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="contact-hero" data-aos="fade-up">
  <div class="container">
    <h1>Contactez-Nous</h1>
    <p>Notre équipe d'experts est à votre disposition pour répondre à toutes vos questions et vous accompagner dans vos projets.</p>
  </div>
</section>

<!-- Contact Section -->
<section class="contact-section" data-aos="fade-up">
  <div class="container">
    <div class="row g-4">
      <!-- Contact Info -->
      <div class="col-lg-5">
        <div class="contact-card">
          <h2 style="font-size: 2rem; font-weight: 700; color: var(--primary-color); margin-bottom: 2rem;">
            Informations de Contact
          </h2>
          
          <div class="contact-info">
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div class="contact-details">
                <h4>Adresse</h4>
                <p>IT-Koncept SA<br>68, route du Stand<br>1260 Nyon, Suisse</p>
              </div>
            </div>
            
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fas fa-phone"></i>
              </div>
              <div class="contact-details">
                <h4>Téléphone</h4>
                <p><a href="tel:+41221234567">+41 22 123 45 67</a></p>
              </div>
            </div>
            
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="contact-details">
                <h4>Email</h4>
                <p><a href="mailto:info@it-koncept.ch">info@it-koncept.ch</a></p>
              </div>
            </div>
            
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fas fa-clock"></i>
              </div>
              <div class="contact-details">
                <h4>Horaires</h4>
                <p>Lun-Ven: 8h-18h<br>Sam: 9h-12h<br>Dim: Fermé</p>
              </div>
            </div>
          </div>
          
          <div class="text-center">
            <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Suivez-nous</h4>
            <div class="d-flex justify-content-center gap-3">
              <a href="#" class="contact-icon" style="text-decoration: none;">
                <i class="fab fa-linkedin-in"></i>
              </a>
              <a href="#" class="contact-icon" style="text-decoration: none;">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="contact-icon" style="text-decoration: none;">
                <i class="fab fa-twitter"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Contact Form -->
      <div class="col-lg-7">
        <div class="contact-card">
          <h2 style="font-size: 2rem; font-weight: 700; color: var(--primary-color); margin-bottom: 2rem;">
            Envoyez-nous un Message
          </h2>
          
          @if(session('success'))
            <div class="alert alert-success">
              <i class="fas fa-check-circle me-2"></i>
              {{ session('success') }}
            </div>
          @endif
          
          @if($errors->any())
            <div class="alert alert-danger">
              <i class="fas fa-exclamation-triangle me-2"></i>
              <ul class="mb-0">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          
          <form action="{{ route('contact.send') }}" method="post" id="contactForm">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name" class="form-label">Nom complet *</label>
                  <input type="text" name="name" id="name" class="form-control" 
                         placeholder="Votre nom complet" required 
                         value="{{ old('name') }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email" class="form-label">Email *</label>
                  <input type="email" name="email" id="email" class="form-control" 
                         placeholder="votre@email.com" required 
                         value="{{ old('email') }}">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone" class="form-label">Téléphone</label>
                  <input type="tel" name="phone" id="phone" class="form-control" 
                         placeholder="+41 XX XXX XX XX" 
                         value="{{ old('phone') }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="company" class="form-label">Entreprise</label>
                  <input type="text" name="company" id="company" class="form-control" 
                         placeholder="Nom de votre entreprise" 
                         value="{{ old('company') }}">
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <label for="subject" class="form-label">Sujet *</label>
              <select name="subject" id="subject" class="form-control" required>
                <option value="">Choisissez un sujet</option>
                <option value="Devis stockage pneus" {{ old('subject') == 'Devis stockage pneus' ? 'selected' : '' }}>
                  Devis stockage pneus
                </option>
                <option value="Information services" {{ old('subject') == 'Information services' ? 'selected' : '' }}>
                  Information services
                </option>
                <option value="Support technique" {{ old('subject') == 'Support technique' ? 'selected' : '' }}>
                  Support technique
                </option>
                <option value="Autre" {{ old('subject') == 'Autre' ? 'selected' : '' }}>
                  Autre
                </option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="message" class="form-label">Message *</label>
              <textarea name="message" id="message" rows="5" class="form-control" 
                        placeholder="Décrivez votre projet ou votre demande..." required>{{ old('message') }}</textarea>
            </div>
            
            <div class="form-group">
              <label for="captcha" class="form-label">Sécurité : Combien font 2 + 3 ? *</label>
              <input type="text" name="captcha" id="captcha" class="form-control" 
                     placeholder="Votre réponse" required>
            </div>
            
            <div class="text-center">
              <button type="submit" class="btn-contact" id="contactSubmitBtn">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <i class="fas fa-paper-plane"></i>
                <span>Envoyer le Message</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Map Section -->
<section class="map-section" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
        Notre Localisation
      </h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
        Situés à Nyon, nous desservons toute la Suisse romande et les régions frontalières.
      </p>
    </div>
    
    <div class="map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2757.8!2d6.2414!3d46.3833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDbCsDIzJzAwLjAiTiA2wrAxNCc0OS4wIkU!5e0!3m2!1sfr!2sch!4v1234567890" 
              allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const btn = document.getElementById('contactSubmitBtn');
    
    if(form && btn) {
      form.addEventListener('submit', function() {
        btn.disabled = true;
        btn.querySelector('.spinner-border').style.display = 'inline-block';
        btn.querySelector('span:last-child').textContent = 'Envoi en cours...';
      });
    }
    
    // Auto-resize textarea
    const textarea = document.getElementById('message');
    if(textarea) {
      textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
      });
    }
  });
</script>
@endpush 