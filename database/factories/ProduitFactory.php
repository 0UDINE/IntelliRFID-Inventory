<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    protected $model = Produit::class;

    public function definition()
    {
        // Define realistic product categories
        $categories = [
            'Electronics', 'Fashion', 'Home Appliances', 'Sports', 'Beauty & Health', 
            'Books', 'Automotive', 'Toys & Games', 'Groceries', 'Furniture'
        ];

        // Define realistic product brands
        $brands = [
            'Samsung', 'Nike', 'Apple', 'Adidas', 'Sony', 
            'LG', 'Panasonic', 'Puma', 'Dell', 'HP'
        ];

        return [
            'nom' => $this->faker->words(2, true),  // Generate a product name with two words
            'categorie' => $categories[array_rand($categories)],  // Pick a random category
            'marque' => $brands[array_rand($brands)],  // Pick a random brand
            'quantite_stock' => $this->faker->numberBetween(10, 500),
            'seuil_alerte' => $this->faker->numberBetween(5, 50),
            'prix' => $this->faker->randomFloat(2, 0.99, 1000),  // Price with decimals
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}


