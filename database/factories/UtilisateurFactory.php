<?php

namespace Database\Factories;

use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

class UtilisateurFactory extends Factory
{
    protected $model = Utilisateur::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'role' => $this->faker->randomElement(['admin', 'manager', 'viewer']),
            'created_at' => now(),
        ];
    }
}
