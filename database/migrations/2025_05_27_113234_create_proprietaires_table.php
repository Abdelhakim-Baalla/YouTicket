<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proprietaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade');
            $table->enum('type', ['principal', 'secondaire']);
            $table->engine = 'InnoDB';
            $table->timestamps();
            
            $table->unique(['utilisateur_id', 'ticket_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('proprietaires');
    }
};