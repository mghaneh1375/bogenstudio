<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            "title_en" => "augmented Reality (AR) & Virtual Reality (VR)",
            "digest_en" => "augmented Reality (AR) & Virtual Reality (VR) is en route to becomingugmented Reality (AR) & Virtual Reality (VR) is en route to becoming",
            "description_en" => "augmented Reality (AR) & Virtual Reality (VR) is en route to becomingugmented Reality (AR) & Virtual Reality (VR) is en route to becoming",
            "tags_en" => "Industry_Game",
            "priority" => 10,
            "default_lang" => "en",
            'pic' => 'Ft5UvAe0a5HTBLnWQFWO7we2rCqzCFkfusG5XaJu.jpg'
        ]);

        Product::create([
            "title_en" => Str::random(30),
            "digest_en" => Str::random(100),
            "description_en" => Str::random(1000),
            "tags_en" => "Industry_Education",
            "priority" => 12,
            "default_lang" => "en",
            'pic' => 'Ft5UvAe0a5HTBLnWQFWO7we2rCqzCFkfusG5XaJu.jpg'
        ]);

        Product::create([
            "title_en" => Str::random(30),
            "digest_en" => Str::random(100),
            "description_en" => Str::random(1000),
            "tags_en" => "Training_Education_Game",
            "priority" => 8,
            "default_lang" => "en",
            'pic' => 'Ft5UvAe0a5HTBLnWQFWO7we2rCqzCFkfusG5XaJu.jpg'
        ]);

        Product::create([
            "title_en" => Str::random(30),
            "digest_en" => Str::random(100),
            "description_en" => Str::random(1000),
            "tags_en" => "NewTag",
            "priority" => 3,
            "default_lang" => "en",
            'pic' => 'Ft5UvAe0a5HTBLnWQFWO7we2rCqzCFkfusG5XaJu.jpg'
        ]);
    }
}
