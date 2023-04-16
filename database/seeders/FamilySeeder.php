<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $family = Family::create([
            'name' => 'Família Delfino Duarte',
            'slug' => 'familia-delfino-duarte',
            'description' => 'Família Delfino Duarte'
        ]);
        $family->users()->attach([1]);

        $family = Family::create([
            'name' => 'Família Fernandes de Paula',
            'slug' => 'familia-fernandes-de-paula',
            'description' => 'Família Fernandes de Paula'
        ]);
        $family->users()->attach([1]);
    }
}
