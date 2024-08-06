<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UE;
use App\Models\Matiere;
use App\Models\Evaluation;
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

        $this->call([
            UserSeeder::class,
            MatiereSeeder::class,
            UESeeder::class,
            EvaluationSeeder::class,
        ]);
    }
}
