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
//    public function run(): void
//    {
//
//
//        $categoryVideo = [];
//
//        foreach ($categories as $category) {
//            $randomVideos = Arr::random($videos, mt_rand(1, count($videos)));
//
//            foreach ($randomVideos as $randomVideo) {
//                $categoryVideo[] =
//                    [
//                        'category_id' => $category,
//                        'video_id' => $randomVideo,
//                    ];
//            }
//        }
//
//
//    }
    public function run(){
        $categories = Category::pluck('id');
        $videos = Video::pluck('id');

        $categoryVideos = $categories->map(function (int $id) use($videos){
            return [
                'category_id'=>$id,
                'video_id'=>$videos->random(),
            ];
        });


        DB::table('category_video')->insert($categoryVideos->all());
    }
}
