<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categoryIds = Category::pluck('id');
        $videoIds = Video::pluck('id');

        $categoryVideos = $categoryIds->flatMap(
            fn(int $id) => $this->categoryVideos($id, $this->randomVideoIds($videoIds))
        );


        DB::table('category_video')->insert($categoryVideos->all());
    }

    private function categoryVideos(int $category_id, Collection $videoIds): Collection
    {

        return $videoIds->map(fn(int $id) => [
            'category_id' => $category_id,
            'video_id' => $id
        ]);
    }

    private function randomVideoIds(Collection $ids): Collection
    {
        return $ids->random(mt_rand(1, count($ids)));
    }
}
