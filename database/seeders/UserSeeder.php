<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->make([
            'email' => 'teste-user@admim.com.br',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('root');
    }
}
