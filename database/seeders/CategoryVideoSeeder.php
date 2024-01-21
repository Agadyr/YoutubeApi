<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CategoryVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id')->all();
        $videos = Video::pluck('id')->all();

        $categoryVideo = [];

        foreach ($categories as $category) {
            $randomVideos = Arr::random($videos, mt_rand(1, count($videos)));

            foreach ($randomVideos as $randomVideo) {
                $categoryVideo[] =
                    [
                        'category_id' => $category,
                        'video_id' => $randomVideo
                    ];
            }
        }

        DB::table('category_video')->insert($categoryVideo);

    }
}
