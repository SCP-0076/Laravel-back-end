<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
        ]);
    
        DB::table('users')->insert([
            'name' => 'User 2',
            'email' => 'user2@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
