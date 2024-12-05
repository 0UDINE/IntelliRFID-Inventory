<?php

namespace Database\Factories;

use App\Models\Rapport;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

class RapportFactory extends Factory
{
    protected $model = Rapport::class;

    public function definition()
    {
        return [
            'utilisateur_id' => Utilisateur::factory(),
            'type_rapport' => $this->faker->randomElement(['inventory', 'alerts']),
            'format' => $this->faker->randomElement(['CSV', 'PDF']),
            'contenu' => $this->faker->paragraph(),
            'created_at' => $this->faker->dateTimeBetween('-1 months', 'now'),
        ];
    }
}

