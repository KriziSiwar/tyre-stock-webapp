<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Statistic;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statistics = [
            [
                'name' => 'Pneus Stockés',
                'value' => '5247',
                'unit' => 'pneus',
                'icon' => 'fas fa-tire',
                'category' => 'metric',
                'order' => 1,
                'metadata' => [
                    'change' => '+12%',
                    'change_type' => 'positive',
                    'period' => 'ce mois'
                ]
            ],
            [
                'name' => 'Clients Actifs',
                'value' => '53',
                'unit' => 'clients',
                'icon' => 'fas fa-users',
                'category' => 'metric',
                'order' => 2,
                'metadata' => [
                    'change' => '+3',
                    'change_type' => 'positive',
                    'period' => 'ce mois'
                ]
            ],
            [
                'name' => 'Disponibilité',
                'value' => '99',
                'unit' => '%',
                'icon' => 'fas fa-clock',
                'category' => 'metric',
                'order' => 3,
                'metadata' => [
                    'change' => '+1%',
                    'change_type' => 'positive',
                    'period' => 'ce mois'
                ]
            ],
            [
                'name' => 'Note Moyenne',
                'value' => '4.8',
                'unit' => '/5',
                'icon' => 'fas fa-star',
                'category' => 'metric',
                'order' => 4,
                'metadata' => [
                    'change' => '+0.2',
                    'change_type' => 'positive',
                    'period' => 'ce mois'
                ]
            ],
            [
                'name' => 'Taux de Satisfaction',
                'value' => '98',
                'unit' => '%',
                'icon' => 'fas fa-heart',
                'category' => 'performance',
                'order' => 1,
                'metadata' => [
                    'target' => '95%',
                    'status' => 'excellent'
                ]
            ],
            [
                'name' => 'Temps de Réponse',
                'value' => '2.3',
                'unit' => 'h',
                'icon' => 'fas fa-stopwatch',
                'category' => 'performance',
                'order' => 2,
                'metadata' => [
                    'target' => '< 4h',
                    'status' => 'excellent'
                ]
            ],
            [
                'name' => 'Précision Traçabilité',
                'value' => '99.9',
                'unit' => '%',
                'icon' => 'fas fa-qrcode',
                'category' => 'performance',
                'order' => 3,
                'metadata' => [
                    'target' => '99.5%',
                    'status' => 'excellent'
                ]
            ],
            [
                'name' => 'Disponibilité Système',
                'value' => '99.8',
                'unit' => '%',
                'icon' => 'fas fa-server',
                'category' => 'performance',
                'order' => 4,
                'metadata' => [
                    'target' => '99.5%',
                    'status' => 'excellent'
                ]
            ],
            [
                'name' => 'Efficacité Logistique',
                'value' => '96',
                'unit' => '%',
                'icon' => 'fas fa-truck',
                'category' => 'performance',
                'order' => 5,
                'metadata' => [
                    'target' => '90%',
                    'status' => 'excellent'
                ]
            ],
            [
                'name' => 'Sécurité',
                'value' => '100',
                'unit' => '%',
                'icon' => 'fas fa-shield-alt',
                'category' => 'performance',
                'order' => 6,
                'metadata' => [
                    'target' => '100%',
                    'status' => 'perfect'
                ]
            ]
        ];

        foreach ($statistics as $statistic) {
            Statistic::create($statistic);
        }
    }
}
