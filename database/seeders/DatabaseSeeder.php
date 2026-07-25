<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat akun admin default untuk login
        User::firstOrCreate(
            ['email' => 'admin@cafe.com'],
            [
                'name'              => 'Admin',
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
            ]
        );

        $this->call([
            CategorySeeder::class,
            MenuSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
