<?php

namespace Database\Factories;
use App\Models\Matiere;
use App\Models\UE;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matiere>
 */
class MatiereFactory extends Factory
{
    protected $model = Matiere::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->word,
            'date_debut' => $this->faker->date,
            'date_fin' => $this->faker->date,
            'u_e_id' => UE::factory(),
        ];
    }
}
