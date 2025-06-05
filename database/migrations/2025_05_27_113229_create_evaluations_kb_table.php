<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('evaluations_kb', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_connaissance_id')->constrained('base_connaissances')->onDelete('cascade');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs');
            $table->integer('note'); // 1-5
            $table->text('commentaire')->nullable();
            $table->engine = 'InnoDB';
            $table->timestamps();
            
            $table->unique(['base_connaissance_id', 'utilisateur_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluations_kb');
    }
};