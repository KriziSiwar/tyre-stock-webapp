<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Stockage Sécurisé Premium',
                'description' => 'Stockage de vos pneus Mercedes-Benz dans des locaux surveillés 24h/24 avec système d\'alarme et assurance complète.',
                'image' => 'frontend/assets/img/services/services-1.webp',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Traçabilité QR Avancée',
                'description' => 'Chaque pneu est identifié par un QR code unique permettant un suivi en temps réel et une gestion optimale de votre stock.',
                'image' => 'frontend/assets/img/services/services-2.webp',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Gestion Logistique Optimisée',
                'description' => 'Service complet de gestion logistique avec livraison express, rotation des stocks et conseils personnalisés.',
                'image' => 'frontend/assets/img/services/services-7.webp',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
