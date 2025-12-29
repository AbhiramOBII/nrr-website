<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if super admin already exists
        $existingAdmin = User::where('email', 'admin@nrramesh.com')->first();
        
        if (!$existingAdmin) {
            User::create([
                'name' => 'Super Administrator',
                'email' => 'admin@nrramesh.com',
                'password' => Hash::make('Admin@123'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);
            
            $this->command->info('Super Administrator created successfully!');
            $this->command->info('Email: admin@nrramesh.com');
            $this->command->info('Password: Admin@123');
        } else {
            // Update existing user to be admin if not already
            if (!$existingAdmin->is_admin) {
                $existingAdmin->update(['is_admin' => true]);
                $this->command->info('Existing user updated to Super Administrator!');
            } else {
                $this->command->info('Super Administrator already exists!');
            }
        }
    }
}
