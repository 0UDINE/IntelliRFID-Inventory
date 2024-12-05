<?php

namespace Database\Factories;

use App\Models\EtiquetteRFID;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtiquetteRFIDFactory extends Factory
{
    protected $model = EtiquetteRFID::class;

    public function definition()
    {
        return [
            'produit_id' => Produit::factory(),
            'code_rfid' => $this->faker->unique()->uuid(),
            'date_activation' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'actif' => $this->faker->boolean(80),
        ];
    }
}

