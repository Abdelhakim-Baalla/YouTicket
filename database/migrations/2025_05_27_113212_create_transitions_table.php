<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workflow_id')->constrained('workflows')->onDelete('cascade');
            $table->foreignId('etat_source_id')->constrained('etats');
            $table->foreignId('etat_destination_id')->constrained('etats');
            $table->string('nom');
            $table->text('condition')->nullable(); // Conditions pour la transition
            $table->text('action')->nullable(); // Actions à exécuter
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transitions');
    }
};