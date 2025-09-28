<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        Article::create([
            'title' => 'Les avantages du stockage sécurisé de pneus Mercedes-Benz',
            'slug' => 'avantages-stockage-securise-pneus-mercedes-benz',
            'excerpt' => 'Découvrez pourquoi le stockage professionnel de vos pneus Mercedes-Benz est essentiel pour préserver leur qualité et optimiser votre gestion logistique.',
            'content' => '<p>Le stockage de pneus Mercedes-Benz nécessite une attention particulière pour maintenir leurs performances optimales. Chez IT-Koncept SA, nous avons développé des solutions de stockage sécurisé qui respectent les standards de qualité les plus élevés.</p>
            
            <h3>Conditions de stockage optimales</h3>
            <p>Nos entrepôts sont équipés de systèmes de contrôle de température et d\'humidité pour garantir des conditions de stockage optimales. La température est maintenue entre 15°C et 25°C, et l\'humidité relative ne dépasse jamais 60%.</p>
            
            <h3>Traçabilité complète</h3>
            <p>Chaque pneu est identifié par un QR code unique qui permet un suivi en temps réel de sa localisation, son état et son historique. Cette traçabilité garantit une gestion efficace et transparente de votre stock.</p>
            
            <h3>Assurance et sécurité</h3>
            <p>Vos pneus sont protégés par une assurance complète et stockés dans des locaux surveillés 24h/24. Notre système de sécurité inclut des caméras de surveillance, des accès contrôlés et des alarmes anti-intrusion.</p>',
            'image' => 'frontend/assets/img/services/services-1.webp',
            'author' => 'Marc Weber',
            'status' => 'published',
            'published_at' => Carbon::now()->subDays(5)
        ]);

        Article::create([
            'title' => 'Innovation : QR Code et gestion digitale des stocks',
            'slug' => 'innovation-qr-code-gestion-digitale-stocks',
            'excerpt' => 'Découvrez notre système révolutionnaire de gestion digitale des stocks de pneus grâce aux QR codes et à l\'intelligence artificielle.',
            'content' => '<p>La digitalisation de la gestion des stocks de pneus représente une révolution dans notre secteur. IT-Koncept SA a développé un système innovant basé sur les QR codes et l\'intelligence artificielle.</p>
            
            <h3>QR Codes intelligents</h3>
            <p>Chaque pneu est équipé d\'un QR code unique qui contient toutes les informations essentielles : dimensions, date de fabrication, type de gomme, et historique d\'utilisation. Un simple scan permet d\'accéder instantanément à toutes ces données.</p>
            
            <h3>Application mobile dédiée</h3>
            <p>Notre application mobile permet aux garages de scanner les QR codes, consulter leur stock en temps réel, et planifier les rotations de pneus. L\'interface intuitive facilite la gestion quotidienne.</p>
            
            <h3>Analytics et prévisions</h3>
            <p>L\'intelligence artificielle analyse les données de consommation pour anticiper les besoins en stock et optimiser les commandes. Cette approche proactive réduit les coûts et améliore l\'efficacité.</p>',
            'image' => 'frontend/assets/img/services/services-2.webp',
            'author' => 'Sophie Müller',
            'status' => 'published',
            'published_at' => Carbon::now()->subDays(10)
        ]);

        Article::create([
            'title' => 'Logistique Mercedes-Benz : Les standards de qualité',
            'slug' => 'logistique-mercedes-benz-standards-qualite',
            'excerpt' => 'IT-Koncept SA respecte les standards de qualité les plus élevés pour la logistique et le stockage de pneus Mercedes-Benz.',
            'content' => '<p>En tant que partenaire certifié Mercedes-Benz, IT-Koncept SA s\'engage à respecter les standards de qualité les plus élevés dans tous nos processus logistiques.</p>
            
            <h3>Certification Mercedes-Benz</h3>
            <p>Notre certification Mercedes-Benz garantit que nos processus respectent les exigences strictes du constructeur allemand. Cette certification est renouvelée chaque année après des audits approfondis.</p>
            
            <h3>Processus qualité</h3>
            <p>Chaque étape de notre processus logistique est documentée et contrôlée. De la réception des pneus à leur livraison, nous appliquons des procédures rigoureuses pour garantir la qualité.</p>
            
            <h3>Formation continue</h3>
            <p>Notre équipe bénéficie de formations continues sur les dernières innovations Mercedes-Benz et les nouvelles normes de qualité. Cette expertise nous permet d\'offrir un service premium à nos clients.</p>',
            'image' => 'frontend/assets/img/services/services-8.webp',
            'author' => 'Thomas Schmidt',
            'status' => 'published',
            'published_at' => Carbon::now()->subDays(15)
        ]);
    }
}
