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
        Schema::table('equipes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('responsable')->after('id')->nullable();
            $table->string('email')->after('responsable')->nullable();
            $table->string('telephone')->after('email')->nullable();
            $table->string('specialite')->after('telephone')->nullable();
        });

        Schema::table('equipes', function (Blueprint $table) {
            $table->foreign('responsable')->references('id')->on('agents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipes', function (Blueprint $table) {
            $table->dropForeign(['responsable']);
            $table->dropColumn(['responsable', 'email', 'telephone', 'specialite']);
        });
    }
};
