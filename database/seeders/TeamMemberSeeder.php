<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMemberSeeder extends Seeder
{
    public function run()
    {
        TeamMember::create([
            'first_name' => 'Marc',
            'last_name' => 'Weber',
            'position' => 'Directeur Général',
            'description' => 'Expert en logistique avec 15 ans d\'expérience dans le secteur automobile. Spécialiste des solutions de stockage premium.',
            'photo' => 'frontend/assets/img/person/person-m-2.webp',
            'email' => 'marc.weber@it-koncept.ch',
            'phone' => '+41 22 123 45 67',
            'order' => 1,
            'is_active' => true
        ]);

        TeamMember::create([
            'first_name' => 'Sophie',
            'last_name' => 'Müller',
            'position' => 'Responsable Logistique',
            'description' => 'Gestionnaire expérimentée en supply chain et optimisation des flux de stockage. Certifiée Mercedes-Benz.',
            'photo' => 'frontend/assets/img/person/person-f-5.webp',
            'email' => 'sophie.mueller@it-koncept.ch',
            'phone' => '+41 22 123 45 68',
            'order' => 2,
            'is_active' => true
        ]);

        TeamMember::create([
            'first_name' => 'Thomas',
            'last_name' => 'Schmidt',
            'position' => 'Technicien Stockage',
            'description' => 'Spécialiste en maintenance et contrôle qualité des équipements de stockage. Expert en sécurité.',
            'photo' => 'frontend/assets/img/person/person-m-3.webp',
            'email' => 'thomas.schmidt@it-koncept.ch',
            'phone' => '+41 22 123 45 69',
            'order' => 3,
            'is_active' => true
        ]);

        TeamMember::create([
            'first_name' => 'Anna',
            'last_name' => 'Keller',
            'position' => 'Conseillère Clientèle',
            'description' => 'Experte en relation client et solutions personnalisées. Accompagnement premium pour les clients Mercedes-Benz.',
            'photo' => 'frontend/assets/img/person/person-f-6.webp',
            'email' => 'anna.keller@it-koncept.ch',
            'phone' => '+41 22 123 45 70',
            'order' => 4,
            'is_active' => true
        ]);
    }
}
