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

        $videos = Video::get();

        Category::get()->flatMap(
            fn(Category $category) => $category->videos()->saveMany($this->randomVideos($videos))
        );


    }

    private function randomVideos(Collection $videos): Collection
    {
        return $videos->random(mt_rand(1, $videos->count()));
    }
}
