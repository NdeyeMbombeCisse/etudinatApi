<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UE;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UE>
 */
class UEFactory extends Factory

{
    protected $model = UE::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->word,  // Génère un mot aléatoire
            'date_debut' => $this->faker->date, // Génère une date aléatoire
            'date_fin' => $this->faker->date,   // Génère une date aléatoire
            'coef' => $this->faker->numberBetween(1, 10), // Génère un coefficient aléatoire entre 1 et 10
        ];
    }
}
