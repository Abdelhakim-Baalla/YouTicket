<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('base_connaissances', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('contenu');
            $table->string('mots_cles')->nullable();
            $table->foreignId('auteur_id')->constrained('utilisateurs');
            $table->foreignId('categorie_kb_id')->nullable()->constrained('categories_kb');
            $table->boolean('publie')->default(false);
            $table->integer('vues')->default(0);
            $table->decimal('note_moyenne', 3, 2)->nullable();
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('base_connaissances');
    }
};