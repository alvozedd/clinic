<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // First check if admin already exists
        if (User::where('email', 'admin@clinic.com')->exists()) {
            $this->command->info('Admin user already exists!');
            return;
        }

        $admin = User::create([
            'username' => 'admin',
            'email' => 'admin@clinic.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'first_name' => 'Clinic',
            'last_name' => 'Admin',
            'is_active' => true,
        ]);

        $admin->staff()->create([
            'specialization' => 'System Administrator',
            'hire_date' => now(),
        ]);

        $this->command->info('Admin user created successfully!');
    }
}