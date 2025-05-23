<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_interne', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expediteur')->constrained('utilisateurs');
            $table->foreignId('destinataire')->constrained('utilisateurs');
            $table->string('sujet');
            $table->string('contenu');
            $table->boolean('lu')->default(false);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_interne');
    }
};
