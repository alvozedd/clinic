<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
{
    // Create an admin user
    User::firstOrCreate(
        ['email' => 'admin@example.com'], // Check if this email exists
        [
            'name' => 'Admin User',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]
    );

    // Create a staff user
    User::firstOrCreate(
        ['email' => 'staff@example.com'],
        [
            'name' => 'Staff User',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]
    );

    // Create a nurse user
    



    // Create the doctor (owner)
    User::create([
        'name' => 'Dr. John Doe',
        'email' => 'doctor@clinic.com',
        'password' => Hash::make('password'),
        'role' => 'doctor',
    ]);

    // Create the secretary
    User::create([
        'name' => 'Jane Smith',
        'email' => 'secretary@clinic.com',
        'password' => Hash::make('password'),
        'role' => 'secretary',
    ]);

}
}
