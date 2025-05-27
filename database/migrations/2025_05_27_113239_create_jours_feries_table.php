<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jours_feries', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->date('date');
            $table->boolean('recurrent')->default(false); // Si c'est un jour férié annuel
            $table->engine = 'InnoDB';
            $table->timestamps();
            
            $table->unique(['date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('jours_feries');
    }
};