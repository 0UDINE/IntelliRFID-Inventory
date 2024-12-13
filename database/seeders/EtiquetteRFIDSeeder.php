<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EtiquetteRFID;

class EtiquetteRFIDSeeder extends Seeder
{
    public function run()
    {
        // Add sample RFID tags
        EtiquetteRFID::create([
            'produit_id' => 1, // Replace with an existing product ID
            'code_rfid' => '123ABC',
            'date_activation' => now(),
            'actif' => true,
            'last_scanned_at' => null,
            'scan_count' => 0,
        ]);

        EtiquetteRFID::create([
            'produit_id' => 2, // Replace with another existing product ID
            'code_rfid' => '456DEF',
            'date_activation' => now(),
            'actif' => true,
            'last_scanned_at' => null,
            'scan_count' => 0,
        ]);
    }
}
