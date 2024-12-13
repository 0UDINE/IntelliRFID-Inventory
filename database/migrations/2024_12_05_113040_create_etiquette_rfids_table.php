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
        Schema::create('etiquette_rfids', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade'); // Foreign key
            $table->string('code_rfid')->unique();
            $table->dateTime('date_activation');
            $table->boolean('actif');
            $table->dateTime('last_scanned_at')->nullable(); // Last scanned time
            $table->integer('scan_count')->default(0); // Total number of scans
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etiquette_rfids');
    }
};
