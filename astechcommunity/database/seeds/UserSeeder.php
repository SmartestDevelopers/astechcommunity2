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
        
        // Create admin user only if it doesn't exist
        User::firstOrCreate(
            ['email' => 'admin@astechcommunity.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        
        // Check current user count (excluding admin)
        $currentUserCount = User::where('email', '!=', 'admin@astechcommunity.com')->count();
        $usersToCreate = max(0, 50 - $currentUserCount);
        
        // Create additional regular users if needed
        for ($i = 1; $i <= $usersToCreate; $i++) {
            $email = $faker->unique()->safeEmail;
            
            // Double-check to avoid duplicates
            while (User::where('email', $email)->exists()) {
                $email = $faker->unique()->safeEmail;
            }
            
            User::create([
                'name' => $faker->name,
                'email' => $email,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
        }
        
        $totalUsers = User::count();
        $this->command->info("Total users in database: {$totalUsers} (including admin)");
    }
}
