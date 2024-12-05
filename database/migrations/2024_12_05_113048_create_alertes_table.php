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
        Schema::create('alertes', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade'); // Foreign key
            $table->string('type_alerte');
            $table->string('message');
            $table->boolean('vue')->default(false);
            $table->timestamps(); // Includes date_creation
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alertes');
    }
};
