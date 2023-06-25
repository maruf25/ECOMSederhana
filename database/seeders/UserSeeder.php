<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('admin');
        $user1 = User::create([
            'name' => 'userTest',
            'email' => 'user@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        $user1->assignRole('user');
    }
}
