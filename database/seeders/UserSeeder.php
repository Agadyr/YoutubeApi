<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [];
        foreach (range(1, 3) as $i) {
            $users[] = [
                'name' => "user $i",
                'email' => "user$i@gmail.com",
                'password' => "password $i",
            ];
        }
        DB::table('users')->insert($users);
    }
}
