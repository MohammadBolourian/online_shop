<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->insert([
            'id' => 1,
            'link' => 'instagram.com/MamalKALA',
        ]);
        DB::table('links')->insert([
            'id' => 2,
            'link' => 'youtube.com/MamalKALA',
        ]);
        DB::table('links')->insert([
            'id' => 3,
            'link' => 'telegram.com/MamalKALA',
        ]);
        DB::table('links')->insert([
            'id' => 4,
            'link' => 'twitter.com/MamalKALA',
        ]);
        DB::table('links')->insert([
            'id' => 5,
            'link' => 'facebook.com/MamalKALA',
        ]);
        DB::table('links')->insert([
            'id' => 6,
            'link' => 'google.com/MamalKALA',
        ]);
        DB::table('links')->insert([
            'id' => 7,
            'link' => 'bazar.com/MamalKALA',
        ]);
        DB::table('links')->insert([
            'id' => 8,
            'link' => 'app.com/MamalKALA',
        ]);
    }
}
