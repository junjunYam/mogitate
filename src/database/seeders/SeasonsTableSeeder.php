<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Season;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Season::create([
            "id" => 1,
            "name" => '春'
        ]);

        Season::create([
            "id" => 2,
            "name" => '夏'
        ]);

        Season::create([
            "id" => 3,
            "name" => '秋'
        ]);

        Season::create([
            "id" => 4,
            "name" => '冬'
        ]);
    }
}
