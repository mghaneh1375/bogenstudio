<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seo::create([
            'page' => 'home'
        ]);

        Seo::create([
            'page' => 'solutions'
        ]);
        
        Seo::create([
            'page' => 'newsList'
        ]);
        
        Seo::create([
            'page' => 'products'
        ]);
    }
}
