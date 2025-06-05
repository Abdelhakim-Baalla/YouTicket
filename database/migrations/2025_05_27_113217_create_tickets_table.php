<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique(); // Numéro auto-généré
            $table->string('titre');
            $table->text('description');
            $table->foreignId('demandeur_id')->constrained('utilisateurs');
            $table->foreignId('assigne_a_id')->nullable()->constrained('utilisateurs');
            $table->foreignId('etat_id')->constrained('etats');
            $table->foreignId('priorite_id')->constrained('priorites');
            $table->foreignId('type_ticket_id')->constrained('type_tickets');
            $table->foreignId('projet_id')->nullable()->constrained('projets');
            $table->foreignId('sla_id')->nullable()->constrained('slas');
            $table->foreignId('frequence_id')->nullable()->constrained('frequences');
            $table->timestamp('date_echeance')->nullable();
            $table->timestamp('date_premiere_reponse')->nullable();
            $table->timestamp('date_resolution')->nullable();
            $table->integer('temps_passe_minutes')->default(0);
            $table->decimal('cout_estime', 10, 2)->nullable();
            $table->text('solution')->nullable();
            $table->json('champs_personnalises')->nullable(); // Valeurs des champs personnalisés
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};