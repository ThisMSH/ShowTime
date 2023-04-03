<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // $this->call([
        //     CategorySeeder::class,
        // ]);

        User::factory(3)->sequence(
            [
                'email' => 'regular@example.com',
                'user_type' => 0
            ],
            [
                'email' => 'admin@example.com',
                'user_type' => 1
            ],
            [
                'email' => 'premium@example.com',
                'user_type' => 2
            ]
        )->create();
    }
}
