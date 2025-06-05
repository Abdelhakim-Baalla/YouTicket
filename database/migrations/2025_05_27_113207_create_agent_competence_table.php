<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('agent_competence', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents')->onDelete('cascade');
            $table->foreignId('competence_id')->constrained('competences')->onDelete('cascade');
            $table->integer('niveau')->default(1); // 1-5
            $table->engine = 'InnoDB';
            $table->timestamps();
            
            $table->unique(['agent_id', 'competence_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('agent_competence');
    }
};