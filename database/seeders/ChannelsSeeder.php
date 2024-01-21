<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $channels = [];

        foreach (range(1,3) as $i) {
            $channels[] = [
                'name' => "channel $i",
                'user_id' => $i
            ];
        }
        DB::table('channels')->insert($channels);
    }
}
