<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nom');
            $table->string('categorie');
            $table->string('marque');
            $table->integer('quantite_stock');
            $table->integer('seuil_alerte');
            $table->integer('prix');
            $table->timestamps(); // date_creation, date_modification
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
