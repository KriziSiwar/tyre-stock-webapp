<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            ServiceSeeder::class,
            TeamMemberSeeder::class,
            TestimonialSeeder::class,
            ArticleSeeder::class,
            StatisticSeeder::class,
            FAQSeeder::class,
        ]);
    }
}
