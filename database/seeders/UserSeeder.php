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
            "role" => "Director",
            "password" => Hash::make('password')
        ]);

        User::create([
            "name" => fake()->name(),
            "email" => 'hr@test.com',
            "role" => "HR",
            "password" => Hash::make('password')
        ]);


        User::create([
            "name" => fake()->name(),
            "email" => 'receptionist@test.com',
            "role" => "Receptionist",
            "password" => Hash::make('password')
        ]);




        User::create([
            "name" => fake()->name(),
            "email" => 'admin@test.com',
            "role" => "Admin",
            "password" => Hash::make('password')
        ]);
    }
}
