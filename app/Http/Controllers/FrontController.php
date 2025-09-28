<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\FAQ;
use App\Services\StatisticsService;
use Illuminate\Support\Facades\Cache;

class FrontController extends Controller
{
    protected $statisticsService;

    public function __construct(StatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    public function index()
    {
        $data = Cache::remember('home.data', 1800, function () {
            return [
                'services' => Service::where('is_active', true)
                    ->orderBy('order')
                    ->limit(3)
                    ->get(),
                'testimonials' => Testimonial::where('is_active', true)
                    ->orderBy('order')
                    ->limit(3)
                    ->get()
            ];
        });
        
        return view('front.index', $data);
    }

    public function services()
    {
        $services = Cache::remember('services.all', 3600, function () {
            return Service::all();
        });
        return view('front.service-details', compact('services'));
    }

    public function team()
    {
        $teamMembers = Cache::remember('team_members.active', 3600, function () {
            return TeamMember::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
        return view('front.team', compact('teamMembers'));
    }

    public function testimonials()
    {
        $testimonials = Cache::remember('testimonials.active', 3600, function () {
            return Testimonial::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
        return view('front.testimonials', compact('testimonials'));
    }

    public function blog(Request $request)
    {
        $query = Article::where('status', 'published')
            ->where('published_at', '<=', now());

        // Recherche par titre ou contenu
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Filtre par catégorie
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        // Filtre par auteur
        if ($request->has('author') && $request->author) {
            $query->where('author', $request->author);
        }

        // Filtre par date
        if ($request->has('date') && $request->date) {
            $date = $request->date;
            if ($date === 'week') {
                $query->where('published_at', '>=', now()->subWeek());
            } elseif ($date === 'month') {
                $query->where('published_at', '>=', now()->subMonth());
            } elseif ($date === 'quarter') {
                $query->where('published_at', '>=', now()->subQuarter());
            } elseif ($date === 'year') {
                $query->where('published_at', '>=', now()->subYear());
            }
        }

        $articles = $query->orderBy('published_at', 'desc')->paginate(6);
        
        // Cache séparé pour les auteurs (ne change pas souvent)
        $authors = Cache::remember('blog.authors', 3600, function () {
            return Article::where('status', 'published')
                ->where('published_at', '<=', now())
                ->distinct()
                ->pluck('author');
        });

        return view('front.blog', compact('articles', 'authors'));
    }

    public function article($slug)
    {
        $cacheKey = 'article.' . $slug;
        
        $data = Cache::remember($cacheKey, 3600, function () use ($slug) {
            $article = Article::where('slug', $slug)
                ->where('status', 'published')
                ->where('published_at', '<=', now())
                ->firstOrFail();
            
            $recentArticles = Article::where('status', 'published')
                ->where('published_at', '<=', now())
                ->where('id', '!=', $article->id)
                ->orderBy('published_at', 'desc')
                ->limit(3)
                ->get();
                
            return compact('article', 'recentArticles');
        });
        
        return view('front.article', $data);
    }

    public function faq()
    {
        $faqs = Cache::remember('faqs.active', 3600, function () {
            return FAQ::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
        
        return view('front.faq', compact('faqs'));
    }

    public function statistics()
    {
        $data = [
            'metrics' => $this->statisticsService->getMetrics(),
            'performance' => $this->statisticsService->getPerformance(),
            'realtime' => $this->statisticsService->getRealtimeStats()
        ];
        
        return view('front.statistics', $data);
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function about()
    {
        return view('front.about');
    }

    public function legal()
    {
        return view('front.legal');
    }
}
