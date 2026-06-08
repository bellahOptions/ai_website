<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admins = [
            [
                'email'    => 'admin@aidigitalagency.com',
                'name'     => 'Admin',
                'password' => 'Admin@2026!',
            ],
            [
                'email'    => 'ahmed@printbuka.com.ng',
                'name'     => 'Ahmed',
                'password' => '#Panaman247..',
            ],
        ];

        foreach ($admins as $admin) {
            User::updateOrCreate(
                ['email' => $admin['email']],
                [
                    'name'               => $admin['name'],
                    'password'           => Hash::make($admin['password']),
                    'is_admin'           => true,
                    'email_verified_at'  => now(),
                ]
            );
            $this->command->info("Admin ready: {$admin['email']}");
        }
    }
}
