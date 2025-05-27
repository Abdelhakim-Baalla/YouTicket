<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('equipes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description')->nullable();
            $table->boolean('active')->default(true);
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipes');
    }
};