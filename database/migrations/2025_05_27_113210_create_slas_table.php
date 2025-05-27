<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('slas', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->integer('temps_reponse_heures'); // Temps de première réponse en heures
            $table->integer('temps_resolution_heures'); // Temps de résolution en heures
            $table->foreignId('priorite_id')->constrained('priorites');
            $table->foreignId('horaire_travail_id')->nullable()->constrained('horaires_travail');
            $table->boolean('actif')->default(true);
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('slas');
    }
};