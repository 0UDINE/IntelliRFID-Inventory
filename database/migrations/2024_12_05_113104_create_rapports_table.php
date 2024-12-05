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
        Schema::create('rapports', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade'); // Foreign key
            $table->string('type_rapport');
            $table->enum('format', ['CSV', 'PDF']);
            $table->text('contenu');
            $table->timestamps(); // Includes date_generation
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
