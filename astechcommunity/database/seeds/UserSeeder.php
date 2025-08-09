<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@astechcommunity.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        
        // Create 50 regular users
        for ($i = 1; $i <= 50; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
        }
    }
}
