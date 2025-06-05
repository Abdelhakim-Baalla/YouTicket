<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historique_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs');
            $table->string('action'); // creation, modification, assignation, etc.
            $table->json('anciennes_valeurs')->nullable();
            $table->json('nouvelles_valeurs')->nullable();
            $table->text('commentaire')->nullable();
            $table->engine = 'InnoDB';
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('historique_tickets');
    }
};