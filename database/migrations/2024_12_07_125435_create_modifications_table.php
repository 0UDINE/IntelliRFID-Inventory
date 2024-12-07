<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModificationsTable extends Migration
{
    public function up()
    {
        Schema::create('modifications', function (Blueprint $table) {
            $table->id();
            $table->string('action'); // 'added', 'updated', 'deleted'
            $table->unsignedBigInteger('produit_id');
            $table->json('changes')->nullable(); // Données avant/après modification
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('modifications');
    }
}

