<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;

class SitemapController extends Controller
{
    public function index()
    {
        $content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        // Pages statiques
        $staticPages = [
            '' => '1.0',
            'services' => '0.9',
            'equipe' => '0.8',
            'temoignages' => '0.8',
            'blog' => '0.9',
            'statistiques' => '0.7',
            'a-propos' => '0.8',
            'contact' => '0.8',
            'faq' => '0.7',
            'mentions-legales' => '0.5'
        ];
        
        foreach ($staticPages as $page => $priority) {
            $content .= $this->addUrl(url($page), $priority, 'weekly');
        }
        
        // Articles de blog
        $articles = Article::where('status', 'published')
            ->where('published_at', '<=', now())
            ->get();
            
        foreach ($articles as $article) {
            $content .= $this->addUrl(
                route('front.article', $article->slug),
                '0.8',
                'monthly',
                $article->updated_at
            );
        }
        
        $content .= '</urlset>';
        
        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
    
    private function addUrl($url, $priority = '0.5', $changefreq = 'weekly', $lastmod = null)
    {
        $lastmod = $lastmod ? $lastmod->toISOString() : now()->toISOString();
        
        return "  <url>\n" .
               "    <loc>{$url}</loc>\n" .
               "    <lastmod>{$lastmod}</lastmod>\n" .
               "    <changefreq>{$changefreq}</changefreq>\n" .
               "    <priority>{$priority}</priority>\n" .
               "  </url>\n";
    }
} 