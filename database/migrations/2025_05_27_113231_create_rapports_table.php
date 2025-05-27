<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->enum('type', ['tickets', 'performance', 'sla', 'charge_travail']);
            $table->json('parametres'); // Paramètres du rapport
            $table->foreignId('createur_id')->constrained('utilisateurs');
            $table->boolean('automatique')->default(false);
            $table->string('frequence_generation')->nullable(); // daily, weekly, monthly
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rapports');
    }
};