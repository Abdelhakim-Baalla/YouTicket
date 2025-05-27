<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('templates_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->foreignId('type_ticket_id')->constrained('type_tickets');
            $table->string('titre_template');
            $table->text('description_template');
            $table->json('champs_par_defaut')->nullable();
            $table->foreignId('createur_id')->constrained('utilisateurs');
            $table->boolean('actif')->default(true);
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('templates_tickets');
    }
};