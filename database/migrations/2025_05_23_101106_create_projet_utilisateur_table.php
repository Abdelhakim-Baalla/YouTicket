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
        Schema::create('projet_utilisateur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projet')->constrained('projets')->onDelete('cascade');
            $table->foreignId('utilisateur')->constrained('utilisateurs')->onDelete('cascade');
            $table->string('role')->nullable();
            $table->timestamps();
            $table->unique(['projet_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projet_utilisateur');
    }
};
