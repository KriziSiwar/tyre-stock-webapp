<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        $testimonials = [
            [
                'client_name' => 'Marc Dubois',
                'company' => 'Garage Mercedes-Benz Genève',
                'testimonial' => 'IT-Koncept SA a révolutionné notre gestion de pneus. Le système de traçabilité QR nous permet de suivre chaque pneu en temps réel. Un service exceptionnel !',
                'rating' => 5,
                'photo' => 'frontend/assets/img/person/person-m-2.webp',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'client_name' => 'Sophie Martin',
                'company' => 'Concessionnaire MB Lausanne',
                'testimonial' => 'Depuis que nous travaillons avec IT-Koncept, notre logistique de pneus est optimale. L\'équipe est professionnelle et réactive. Je recommande vivement !',
                'rating' => 5,
                'photo' => 'frontend/assets/img/person/person-f-5.webp',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'client_name' => 'Pierre Moreau',
                'company' => 'Centre Service MB Zurich',
                'testimonial' => 'La sécurité et la traçabilité offertes par IT-Koncept sont exceptionnelles. Nos clients apprécient la transparence et nous avons gagné en efficacité.',
                'rating' => 5,
                'photo' => 'frontend/assets/img/person/person-m-5.webp',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
