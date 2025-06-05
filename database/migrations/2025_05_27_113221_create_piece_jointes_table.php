<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('piece_jointes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs');
            $table->string('nom_original');
            $table->string('nom_fichier'); // Nom du fichier sur le serveur
            $table->string('chemin');
            $table->string('type_mime');
            $table->bigInteger('taille'); // Taille en octets
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('piece_jointes');
    }
};