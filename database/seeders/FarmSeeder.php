<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = DB::table('users')->where('email', 'user1@example.com')->first();
    $user2 = DB::table('users')->where('email', 'user2@example.com')->first();

    DB::table('farms')->insert([
        'name' => 'Farm 1 of User 1',
        'email' => 'farm1@example.com',
        'website' => 'http://farm1.example.com',
        'user_id' => $user1->id,
    ]);

    DB::table('farms')->insert([
        'name' => 'Farm 2 of User 1',
        'email' => 'farm2@example.com',
        'website' => 'http://farm2.example.com',
        'user_id' => $user1->id,
    ]);

    DB::table('farms')->insert([
        'name' => 'Farm 1 of User 2',
        'email' => 'farm3@example.com',
        'website' => 'http://farm3.example.com',
        'user_id' => $user2->id,
    ]);

    DB::table('farms')->insert([
        'name' => 'Farm 2 of User 2',
        'email' => 'farm4@example.com',
        'website' => 'http://farm4.example.com',
        'user_id' => $user2->id,
    ]);

    $farm1User1 = DB::table('farms')->where('name', 'Farm 1 of User 1')->first();
    $farm2User1 = DB::table('farms')->where('name', 'Farm 2 of User 1')->first();
    $farm1User2 = DB::table('farms')->where('name', 'Farm 1 of User 2')->first();
    $farm2User2 = DB::table('farms')->where('name', 'Farm 2 of User 2')->first();

    DB::table('animals')->insert([
        'animal_number' => 'A001',
        'type_name' => 'Cow',
        'years' => 5,
        'farm_id' => $farm1User1->id,
    ]);

    DB::table('animals')->insert([
        'animal_number' => 'A002',
        'type_name' => 'Sheep',
        'years' => 2,
        'farm_id' => $farm1User1->id,
    ]);

    DB::table('animals')->insert([
        'animal_number' => 'A003',
        'type_name' => 'Pig',
        'years' => 3,
        'farm_id' => $farm2User1->id,
    ]);

    DB::table('animals')->insert([
        'animal_number' => 'A004',
        'type_name' => 'Chicken',
        'years' => 1,
        'farm_id' => $farm2User1->id,
    ]);

    DB::table('animals')->insert([
        'animal_number' => 'A005',
        'type_name' => 'Horse',
        'years' => 4,
        'farm_id' => $farm1User2->id,
    ]);

    DB::table('animals')->insert([
        'animal_number' => 'A006',
        'type_name' => 'Goat',
        'years' => 2,
        'farm_id' => $farm1User2->id,
    ]);

    DB::table('animals')->insert([
        'animal_number' => 'A007',
        'type_name' => 'Duck',
        'years' => 1,
        'farm_id' => $farm2User2->id,
    ]);

    DB::table('animals')->insert([
        'animal_number' => 'A008',
        'type_name' => 'Turkey',
        'years' => 2,
        'farm_id' => $farm2User2->id,
    ]);
    }
}
