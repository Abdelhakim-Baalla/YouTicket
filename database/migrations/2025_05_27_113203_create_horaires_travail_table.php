<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('horaires_travail', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->json('horaires'); // Structure JSON pour les horaires par jour
            $table->string('fuseau_horaire')->default('Europe/Paris');
            $table->boolean('par_defaut')->default(false);
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('horaires_travail');
    }
};