<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('regle_escalades', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->foreignId('priorite_id')->constrained('priorites');
            $table->integer('delai_heures'); // Délai avant escalade
            $table->foreignId('utilisateur_escalade_id')->constrained('utilisateurs');
            $table->boolean('actif')->default(true);
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('regle_escalades');
    }
};