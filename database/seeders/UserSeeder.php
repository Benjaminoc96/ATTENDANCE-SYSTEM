<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // CREATING OF DATA
        User::create([
            "name" => fake()->name(),
            "email" => 'director@test.com',
            "role" => "director",
            "password" => Hash::make('password')
        ]);

        User::create([
            "name" => fake()->name(),
            "email" => 'hr@test.com',
            "role" => "hr",
            "password" => Hash::make('password')
        ]);


        User::create([
            "name" => fake()->name(),
            "email" => 'receptionist@test.com',
            "role" => "receptionist",
            "password" => Hash::make('password')
        ]);




        User::create([
            "name" => fake()->name(),
            "email" => 'admin@test.com',
            "role" => "admin",
            "password" => Hash::make('password')
        ]);
    }
}
