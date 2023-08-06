<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
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
            "title_fa" => "تست با اولویت 10",
            "digest_fa" => "این یک تست است",
            "description_fa" => "این یک تست است",
            "tags_fa" => "صنعت_بازی",
            "priority" => 10,
            "default_lang" => "en",
            'pic' => 'Ft5UvAe0a5HTBLnWQFWO7we2rCqzCFkfusG5XaJu.jpg'
        ]);

        Product::create([
            "title_en" => Str::random(30),
            "digest_en" => Str::random(100),
            "description_en" => Str::random(1000),
            "tags_en" => "Industry_Education",
            "title_fa" => "تست با اولویت 12",
            "digest_fa" => "این یک تست است",
            "description_fa" => "این یک تست است",
            "tags_fa" => "صنعت_آموزش",
            "priority" => 12,
            "default_lang" => "en",
            'pic' => 'Ft5UvAe0a5HTBLnWQFWO7we2rCqzCFkfusG5XaJu.jpg'
        ]);

        Product::create([
            "title_en" => Str::random(30),
            "digest_en" => Str::random(100),
            "description_en" => Str::random(1000),
            "tags_en" => "Training_Education_Game",
            "title_fa" => "تست با اولویت 8",
            "digest_fa" => "این یک تست است",
            "description_fa" => "این یک تست است",
            "tags_fa" => "یادگیری_آموزش_بازی",
            "priority" => 8,
            "default_lang" => "en",
            'pic' => 'Ft5UvAe0a5HTBLnWQFWO7we2rCqzCFkfusG5XaJu.jpg'
        ]);

        Product::create([
            "title_en" => Str::random(30),
            "digest_en" => Str::random(100),
            "description_en" => Str::random(1000),
            "tags_en" => "Training_NewTag",
            "title_fa" => "تست با اولویت 3",
            "digest_fa" => "این یک تست است",
            "description_fa" => "این یک تست است",
            "tags_fa" => "یادگیری_تگ جدید",
            "priority" => 3,
            "default_lang" => "en",
            'pic' => 'Ft5UvAe0a5HTBLnWQFWO7we2rCqzCFkfusG5XaJu.jpg'
        ]);

        Product::create([
            "title_en" => Str::random(30),
            "digest_en" => Str::random(100),
            "description_en" => Str::random(1000),
            "tags_en" => "Education_NewTag2",
            "title_fa" => "تست با اولویت 3",
            "digest_fa" => "این یک تست است",
            "description_fa" => "این یک تست است",
            "tags_fa" => "آموزش_تگ جدید 2",
            "priority" => 3,
            "default_lang" => "en",
            'pic' => 'Ft5UvAe0a5HTBLnWQFWO7we2rCqzCFkfusG5XaJu.jpg'
        ]);

        Product::create([
            "title_en" => Str::random(30),
            "digest_en" => Str::random(100),
            "description_en" => Str::random(1000),
            "tags_en" => "NewTag2_NewTag3",
            "title_fa" => "تست با اولویت 4",
            "digest_fa" => "این یک تست است",
            "description_fa" => "این یک تست است",
            "tags_fa" => "تگ جدید 2_تگ جدید 3",
            "priority" => 4,
            "default_lang" => "en",
            'pic' => 'Ft5UvAe0a5HTBLnWQFWO7we2rCqzCFkfusG5XaJu.jpg'
        ]);
    }
}
