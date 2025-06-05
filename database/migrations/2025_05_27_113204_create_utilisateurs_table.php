<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telephone')->nullable();
            $table->string('poste')->nullable();
            $table->string('departement')->nullable();
            $table->foreignId('role_id')->constrained('roles');
            $table->foreignId('equipe_id')->nullable()->constrained('equipes');
            $table->boolean('actif')->default(false);
            $table->timestamp('derniere_connexion')->nullable();
            $table->rememberToken();
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
};