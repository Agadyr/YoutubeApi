<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\Playlist;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PlaylistVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Playlist::with('channel.videos')
            ->each(fn(Playlist $playlist) => $playlist->videos()->saveMany($this->randomVideosFrom($playlist->channel))
            );
    }

    private function randomVideosFrom(Channel $channel): Collection
    {
        return $channel->videos->whenEmpty(
            fn() => collect(),
            fn(Collection $videos) => $videos->random(mt_rand(1, $videos->count()))
        );

    }
}
