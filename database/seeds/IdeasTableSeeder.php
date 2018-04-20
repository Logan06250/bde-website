<?php

use Illuminate\Database\Seeder;

class IdeasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ideas')->insert([
            'title' => "Machine à café",
            'description' => "Instaler une machine à café appartenant au BDE.",
            'creator' => "Jean",
            'user_id' => "1",
            'visibility' => "1",
        ]);
        DB::table('ideas')->insert([
            'title' => "Soirée à Nice",
            'description' => "Je connais le patron des coulisses on pourrait y faire une soirée !",
            'creator' => "Michelle",
            'user_id' => "2",
            'visibility' => "1",
        ]);
        DB::table('ideas')->insert([
            'title' => "Un paintball",
            'description' => "Faire un paintball Magnole",
            'creator' => "Francis",
            'user_id' => "3",
            'visibility' => "1",
        ]);
        DB::table('ideas')->insert([
            'title' => "Gouter au Cesi",
            'description' => "ON pourrait faire un gouter le matin au cesi pour feter la nouvelle année !",
            'creator' => "Pierre",
            'user_id' => "4",
            'visibility' => "1",
        ]);
    }
}

