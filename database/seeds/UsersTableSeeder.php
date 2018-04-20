<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "4",
        ]);
        DB::table('users')->insert([
            'name' => "BDE",
            'email' => "bde".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "3",
        ]);
        DB::table('users')->insert([
            'name' => "cesi",
            'email' => "cesi".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "2",
        ]);
        DB::table('users')->insert([
            'name' => "etudiant",
            'email' => "etudiant".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "1",
        ]);
        DB::table('users')->insert([
            'name' => "Jean-Charles",
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "1",
        ]);
        DB::table('users')->insert([
            'name' => "François",
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "1",
        ]);
        DB::table('users')->insert([
            'name' => "Pierre-Jean-Michelle",
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "1",
        ]);
        DB::table('users')->insert([
            'name' => "Michellines",
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "1",
        ]);
        DB::table('users')->insert([
            'name' => "Robert",
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "1",
        ]);

    }
}