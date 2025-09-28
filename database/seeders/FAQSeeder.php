<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FAQ;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Comment mes pneus sont-ils sécurisés ?',
                'answer' => 'Vos pneus bénéficient d\'une sécurité maximale : surveillance 24h/24, accès sécurisé par badge et code, assurance complète, respect des normes Mercedes-Benz, et contrôle climatique optimisé.',
                'category' => 'security',
                'icon' => 'fas fa-shield-alt',
                'order' => 1
            ],
            [
                'question' => 'Puis-je suivre mes pneus en temps réel ?',
                'answer' => 'Oui, notre système de traçabilité QR vous offre un suivi complet : QR Code unique pour chaque pneu, historique complet des mouvements, accès en ligne 24h/24, notifications en temps réel, et rapports détaillés.',
                'category' => 'tracking',
                'icon' => 'fas fa-qrcode',
                'order' => 2
            ],
            [
                'question' => 'Quels services logistiques proposez-vous ?',
                'answer' => 'Notre gamme complète de services logistiques inclut : livraison express, gestion des mouvements automatisée, rotation des stocks, inventaire automatisé, et conseil logistique personnalisé.',
                'category' => 'logistics',
                'icon' => 'fas fa-truck',
                'order' => 3
            ],
            [
                'question' => 'Comment sont calculés les tarifs ?',
                'answer' => 'Nos tarifs sont personnalisés selon vos besoins : volume de stockage, durée d\'engagement, services additionnels, fréquence d\'accès. Contactez-nous pour un devis sur-mesure gratuit.',
                'category' => 'pricing',
                'icon' => 'fas fa-calculator',
                'order' => 4
            ],
            [
                'question' => 'Comment contacter votre équipe support ?',
                'answer' => 'Notre équipe support est disponible de plusieurs façons : téléphone +41 22 123 45 67 (Lun-Ven 8h-18h), email support@it-koncept.ch, formulaire contact avec réponse sous 24h, support d\'urgence 24h/24, et rendez-vous sur site.',
                'category' => 'support',
                'icon' => 'fas fa-headset',
                'order' => 5
            ],
            [
                'question' => 'Êtes-vous certifiés Mercedes-Benz ?',
                'answer' => 'Oui, IT-Koncept SA est partenaire officiel certifié Mercedes-Benz : certification officielle, standards de qualité MB, formation continue de l\'équipe, contrôles réguliers, et maintien de la garantie constructeur.',
                'category' => 'security',
                'icon' => 'fas fa-certificate',
                'order' => 6
            ],
            [
                'question' => 'Quelle est la durée de stockage recommandée ?',
                'answer' => 'La durée de stockage recommandée dépend du type de pneu et de l\'usage. Nos experts vous conseillent pour optimiser la rotation et maximiser la durée de vie de vos pneus.',
                'category' => 'logistics',
                'icon' => 'fas fa-clock',
                'order' => 7
            ],
            [
                'question' => 'Proposez-vous un service de montage ?',
                'answer' => 'Oui, nous proposons un service de montage complet en partenariat avec des garages certifiés Mercedes-Benz. Contactez-nous pour organiser le montage de vos pneus stockés.',
                'category' => 'services',
                'icon' => 'fas fa-tools',
                'order' => 8
            ]
        ];

        foreach ($faqs as $faq) {
            FAQ::create($faq);
        }
    }
}
