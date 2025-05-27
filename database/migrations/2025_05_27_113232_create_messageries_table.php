<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('messageries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expediteur_id')->constrained('utilisateurs');
            $table->foreignId('destinataire_id')->constrained('utilisateurs');
            $table->string('objet');
            $table->text('message');
            $table->boolean('lu')->default(false);
            $table->timestamp('date_lecture')->nullable();
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messageries');
    }
};