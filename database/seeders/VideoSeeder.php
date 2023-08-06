<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 15; $i++) {

            Video::create([
                'title_fa' => 'تایتل ' . ($i + 1),
                'description_fa' => 'توضیح ' . ($i + 1),
                'title_en' => 'augmented Reality (AR) & Virtual Reality (VR) ' . ($i + 1),
                'description_en' => 'Augmented Reality (AR) & Virtual Reality (VR) is en route to becomingugmented Reality (AR) & Virtual Reality (VR) is en route to becoming ' . ($i + 1),
                'title_gr' => 'تایتل آلمانی ' . ($i + 1),
                'description_gr' => 'توضیح آلمانی ' . ($i + 1),
                'title_ar' => 'تایتل عربی ' . ($i + 1),
                'description_ar' => 'توضیح عربی ' . ($i + 1),
                'preview' => '1.jpg',
                'file' => '2.mp4',
                'priority' => ($i + 1)
            ]);

        }
    }
}
