<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UE;

class UESeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Crée 10 enregistrements pour la table u_e_s
       UE::factory(10)->create();
    }
}
