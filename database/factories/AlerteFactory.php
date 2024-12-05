<?php

namespace Database\Factories;

use App\Models\Alerte;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlerteFactory extends Factory
{
    protected $model = Alerte::class;

    public function definition()
    {
        return [
            'produit_id' => Produit::factory(),
            'type_alerte' => $this->faker->randomElement(['stock_low', 'out_of_stock']),
            'message' => $this->faker->sentence(),
            'vue' => $this->faker->boolean(),
            'created_at' => now(),
        ];
    }
}

