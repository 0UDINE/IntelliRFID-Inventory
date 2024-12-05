<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produit;
use App\Models\EtiquetteRFID;
use App\Models\Alerte;
use App\Models\Utilisateur;
use App\Models\Rapport;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Utilisateur::factory(10)->create();

        // Create products and related entities
        Produit::factory(20)->create()->each(function ($produit) {
            EtiquetteRFID::factory(5)->create(['produit_id' => $produit->id]);
            Alerte::factory(3)->create(['produit_id' => $produit->id]);
        });

        // Create reports
        Rapport::factory(10)->create();
    }
}
