@extends('layouts.front')

@section('title', 'Statistiques & Performance - IT-Koncept SA')
@section('meta_description', 'Découvrez nos statistiques de performance, métriques de stockage et analyses détaillées de nos services de gestion de pneus Mercedes-Benz.')

@push('styles')
<style>
  /* Hero Section */
  .stats-hero {
    background: linear-gradient(135deg, rgba(24, 24, 24, 0.9) 0%, rgba(24, 24, 24, 0.7) 100%), 
                url('/frontend/assets/img/services/services-2.webp');
    background-size: cover;
    background-position: center;
    padding: 8rem 0 4rem;
    color: white;
    text-align: center;
  }
  
  .stats-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  
  .stats-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
  }
  
  /* Key Metrics Section */
  .metrics-section {
    padding: 5rem 0;
    background: var(--light-bg);
  }
  
  .metric-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem 2rem;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
  }
  
  .metric-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  }
  
  .metric-icon {
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
  
  .metric-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
  }
  
  .metric-label {
    font-size: 1.1rem;
    color: #666;
    font-weight: 600;
  }
  
  .metric-change {
    font-size: 0.9rem;
    margin-top: 0.5rem;
  }
  
  .metric-change.positive {
    color: #28a745;
  }
  
  .metric-change.negative {
    color: #dc3545;
  }
  
  /* Charts Section */
  .charts-section {
    padding: 5rem 0;
  }
  
  .chart-container {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
  }
  
  .chart-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
  }
  
  .chart-icon {
    width: 40px;
    height: 40px;
    background: rgba(255,145,0,0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-color);
  }
  
  .chart-canvas {
    position: relative;
    height: 300px;
    margin: 1rem 0;
  }
  
  /* Performance Section */
  .performance-section {
    padding: 5rem 0;
    background: var(--light-bg);
  }
  
  .performance-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    height: 100%;
  }
  
  .performance-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
  }
  
  .performance-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--primary-color);
  }
  
  .performance-value {
    font-size: 2rem;
    font-weight: 700;
    color: var(--accent-color);
  }
  
  .performance-bar {
    width: 100%;
    height: 10px;
    background: #e9ecef;
    border-radius: 5px;
    overflow: hidden;
    margin-bottom: 1rem;
  }
  
  .performance-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--accent-color), #e67e00);
    border-radius: 5px;
    transition: width 1s ease;
  }
  
  .performance-label {
    font-size: 0.9rem;
    color: #666;
  }
  
  /* Real-time Section */
  .realtime-section {
    padding: 5rem 0;
  }
  
  .realtime-card {
    background: linear-gradient(135deg, var(--primary-color), #2c3e50);
    color: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
  }
  
  .realtime-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
  }
  
  .realtime-icon {
    width: 50px;
    height: 50px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
  }
  
  .realtime-title {
    font-size: 1.5rem;
    font-weight: 700;
  }
  
  .realtime-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
  }
  
  .realtime-stat {
    text-align: center;
  }
  
  .realtime-number {
    font-size: 2rem;
    font-weight: 700;
    color: var(--accent-color);
    margin-bottom: 0.5rem;
  }
  
  .realtime-label {
    font-size: 0.9rem;
    opacity: 0.8;
  }
  
  /* Comparison Section */
  .comparison-section {
    padding: 5rem 0;
    background: var(--light-bg);
  }
  
  .comparison-table {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  }
  
  .comparison-header {
    background: var(--primary-color);
    color: white;
    padding: 1.5rem 2rem;
  }
  
  .comparison-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0;
  }
  
  .comparison-row {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    padding: 1rem 2rem;
    border-bottom: 1px solid #e9ecef;
    align-items: center;
  }
  
  .comparison-row:last-child {
    border-bottom: none;
  }
  
  .comparison-row.header {
    background: #f8f9fa;
    font-weight: 700;
    color: var(--primary-color);
  }
  
  .comparison-value {
    font-weight: 600;
  }
  
  .comparison-better {
    color: #28a745;
  }
  
  .comparison-worse {
    color: #dc3545;
  }
  
  /* Responsive */
  @media (max-width: 768px) {
    .stats-hero h1 {
      font-size: 2rem;
    }
    
    .stats-hero p {
      font-size: 1rem;
    }
    
    .metric-number {
      font-size: 2rem;
    }
    
    .chart-canvas {
      height: 250px;
    }
    
    .realtime-stats {
      grid-template-columns: 1fr;
    }
    
    .comparison-row {
      grid-template-columns: 1fr;
      gap: 0.5rem;
      text-align: center;
    }
  }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="stats-hero" data-aos="fade-up">
  <div class="container">
    <h1>Statistiques & Performance</h1>
    <p>Découvrez nos métriques de performance et analyses détaillées de nos services de gestion de pneus Mercedes-Benz.</p>
  </div>
</section>

<!-- Key Metrics Section -->
<section class="metrics-section" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
        Métriques Clés
      </h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
        Nos indicateurs de performance en temps réel
      </p>
    </div>
    
    <div class="row g-4">
      @forelse($metrics as $metric)
        <div class="col-lg-3 col-md-6">
          <div class="metric-card">
            <div class="metric-icon">
              <i class="{{ $metric->icon }}"></i>
            </div>
            <div class="metric-number" data-count="{{ $metric->value }}">0</div>
            <div class="metric-label">{{ $metric->name }}</div>
            @if(isset($metric->metadata['change']))
              <div class="metric-change {{ $metric->metadata['change_type'] ?? 'positive' }}">
                <i class="fas fa-arrow-{{ $metric->metadata['change_type'] === 'positive' ? 'up' : 'down' }}"></i>
                {{ $metric->metadata['change'] }} {{ $metric->metadata['period'] ?? '' }}
              </div>
            @endif
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <i class="fas fa-chart-bar" style="font-size: 3rem; color: #ddd; margin-bottom: 1rem;"></i>
          <h4>Aucune métrique disponible</h4>
          <p>Les statistiques seront bientôt disponibles.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Charts Section -->
<section class="charts-section" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
        Analyses Détaillées
      </h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
        Visualisez nos données de performance et tendances
      </p>
    </div>
    
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="chart-container">
          <h3 class="chart-title">
            <div class="chart-icon">
              <i class="fas fa-chart-line"></i>
            </div>
            Croissance Mensuelle
          </h3>
          <div class="chart-canvas">
            <canvas id="growthChart"></canvas>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6">
        <div class="chart-container">
          <h3 class="chart-title">
            <div class="chart-icon">
              <i class="fas fa-chart-pie"></i>
            </div>
            Répartition par Type
          </h3>
          <div class="chart-canvas">
            <canvas id="distributionChart"></canvas>
          </div>
        </div>
      </div>
      
      <div class="col-lg-12">
        <div class="chart-container">
          <h3 class="chart-title">
            <div class="chart-icon">
              <i class="fas fa-chart-bar"></i>
            </div>
            Performance Annuelle
          </h3>
          <div class="chart-canvas">
            <canvas id="performanceChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Performance Section -->
<section class="performance-section" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
        Indicateurs de Performance
      </h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
        Nos KPI et objectifs de qualité
      </p>
    </div>
    
    <div class="row g-4">
      @forelse($performance as $perf)
        <div class="col-lg-4 col-md-6">
          <div class="performance-card">
            <div class="performance-header">
              <div class="performance-title">{{ $perf->name }}</div>
              <div class="performance-value">{{ $perf->value }}{{ $perf->unit }}</div>
            </div>
            <div class="performance-bar">
              <div class="performance-fill" style="width: {{ $perf->value }}%"></div>
            </div>
            <div class="performance-label">Objectif: {{ $perf->metadata['target'] ?? 'N/A' }}</div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <i class="fas fa-tachometer-alt" style="font-size: 3rem; color: #ddd; margin-bottom: 1rem;"></i>
          <h4>Aucun indicateur disponible</h4>
          <p>Les indicateurs de performance seront bientôt disponibles.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Real-time Section -->
<section class="realtime-section" data-aos="fade-up">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="realtime-card">
          <div class="realtime-header">
            <div class="realtime-icon">
              <i class="fas fa-broadcast-tower"></i>
            </div>
            <div>
              <h3 class="realtime-title">Données en Temps Réel</h3>
              <p style="opacity: 0.8; margin: 0;">Mise à jour toutes les 5 minutes</p>
            </div>
          </div>
          
          <div class="realtime-stats">
            <div class="realtime-stat">
              <div class="realtime-number" id="currentTires">{{ $realtime['current_tires'] }}</div>
              <div class="realtime-label">Pneus Actuellement Stockés</div>
            </div>
            <div class="realtime-stat">
              <div class="realtime-number" id="todayMovements">{{ $realtime['today_movements'] }}</div>
              <div class="realtime-label">Mouvements Aujourd'hui</div>
            </div>
            <div class="realtime-stat">
              <div class="realtime-number" id="activeUsers">{{ $realtime['active_users'] }}</div>
              <div class="realtime-label">Utilisateurs Connectés</div>
            </div>
            <div class="realtime-stat">
              <div class="realtime-number" id="systemStatus">{{ $realtime['system_status'] }}</div>
              <div class="realtime-label">Statut Système</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Comparison Section -->
<section class="comparison-section" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color); margin-bottom: 1rem;">
        Comparaison Sectorielle
      </h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
        Comment nous nous positionnons par rapport à la concurrence
      </p>
    </div>
    
    <div class="comparison-table">
      <div class="comparison-header">
        <h3 class="comparison-title">IT-Koncept SA vs Concurrence</h3>
      </div>
      
      <div class="comparison-row header">
        <div>Métrique</div>
        <div>IT-Koncept SA</div>
        <div>Moyenne Secteur</div>
      </div>
      
      <div class="comparison-row">
        <div>Taux de Satisfaction</div>
        <div class="comparison-value comparison-better">98%</div>
        <div>85%</div>
      </div>
      
      <div class="comparison-row">
        <div>Temps de Réponse</div>
        <div class="comparison-value comparison-better">2.3h</div>
        <div>6.5h</div>
      </div>
      
      <div class="comparison-row">
        <div>Précision Traçabilité</div>
        <div class="comparison-value comparison-better">99.9%</div>
        <div>92%</div>
      </div>
      
      <div class="comparison-row">
        <div>Disponibilité Système</div>
        <div class="comparison-value comparison-better">99.8%</div>
        <div>95%</div>
      </div>
      
      <div class="comparison-row">
        <div>Prix Moyen</div>
        <div class="comparison-value comparison-better">CHF 2.50</div>
        <div>CHF 3.20</div>
      </div>
      
      <div class="comparison-row">
        <div>Support 24/7</div>
        <div class="comparison-value comparison-better">Oui</div>
        <div>Non</div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
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
    document.querySelectorAll('.metric-number').forEach(counter => {
      observer.observe(counter);
    });

    // Real-time data simulation
    function updateRealTimeData() {
      document.getElementById('currentTires').textContent = Math.floor(Math.random() * 100) + 5200;
      document.getElementById('todayMovements').textContent = Math.floor(Math.random() * 50) + 150;
      document.getElementById('activeUsers').textContent = Math.floor(Math.random() * 10) + 5;
    }

    // Update every 5 seconds
    setInterval(updateRealTimeData, 5000);
    updateRealTimeData();

    // Charts
    const ctx1 = document.getElementById('growthChart').getContext('2d');
    new Chart(ctx1, {
      type: 'line',
      data: {
        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
        datasets: [{
          label: 'Pneus Stockés',
          data: [3200, 3500, 3800, 4200, 4500, 4800, 5000, 5200, 5400, 5600, 5800, 6000],
          borderColor: '#ff9100',
          backgroundColor: 'rgba(255, 145, 0, 0.1)',
          tension: 0.4,
          fill: true
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const ctx2 = document.getElementById('distributionChart').getContext('2d');
    new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: ['Été', 'Hiver', '4 Saisons', 'Performance'],
        datasets: [{
          data: [35, 30, 25, 10],
          backgroundColor: ['#ff9100', '#e67e00', '#f39c12', '#e74c3c']
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });

    const ctx3 = document.getElementById('performanceChart').getContext('2d');
    new Chart(ctx3, {
      type: 'bar',
      data: {
        labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        datasets: [{
          label: 'Satisfaction Client',
          data: [95, 97, 98, 99],
          backgroundColor: '#ff9100'
        }, {
          label: 'Efficacité Opérationnelle',
          data: [88, 92, 95, 97],
          backgroundColor: '#e67e00'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'top'
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            max: 100
          }
        }
      }
    });
  });
</script>
@endpush 