<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'uname' => 'Admin',
            'email' => 'test@example.com',
            'password' => 'password123',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'country' => 'Hungary',
            'phone_number' => '212-456-7890',
            'admin' => true
        ]);

        User::factory(20)->create();
    }
}
