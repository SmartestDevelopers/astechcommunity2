<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        DB::table('users')->insert([
            'name' => 'AS-Tech Admin',
            'email' => 'admin@astech.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        echo "Admin user created successfully!\n";
        echo "Email: admin@astech.com\n";
        echo "Password: admin123\n";
        echo "Please change the password after first login.\n";
    }
}
