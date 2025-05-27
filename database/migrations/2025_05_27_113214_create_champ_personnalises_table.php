<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('champ_personnalises', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('libelle');
            $table->enum('type', ['text', 'textarea', 'select', 'checkbox', 'date', 'number']);
            $table->json('options')->nullable(); // Pour les champs select
            $table->boolean('obligatoire')->default(false);
            $table->integer('ordre')->default(0);
            $table->foreignId('type_ticket_id')->nullable()->constrained('type_tickets');
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('champ_personnalises');
    }
};