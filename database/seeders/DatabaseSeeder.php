<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

         \App\Models\User::create([
             'name' => 'Socrates Duarte',
             'email' => 'socrates@swge.com.br',
             'email_verified_at' => now(),
             'remember_token' => Str::random(10),
             'password' => bcrypt('password123'),
         ]);

         $this->call(PermissionSeeder::class);
         $this->call(FamilySeeder::class);
         $this->call(PersonSeeder::class);
    }
}
