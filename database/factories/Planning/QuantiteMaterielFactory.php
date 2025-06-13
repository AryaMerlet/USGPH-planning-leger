<?php

namespace Database\Factories\Planning;

use App\Models\Planning\Tache;
use App\Models\Planning\Materiel;
use App\Models\Planning\QuantiteMateriel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Planning\Tache>
 */
class TacheFactory extends Factory
{

    $materiel = Materiel::First();
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantite' => 2,
            'tache_id' => Tache::factory(),
            'materiel_id' => $materiel->id,
        ];
    }
}