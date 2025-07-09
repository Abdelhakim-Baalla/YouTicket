<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Agent extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'utilisateur_id',
        'specialite',
        'niveau_experience',
        'disponible',
        'charge_travail',
    ];

    // Définition de la relation avec le modèle Utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    // Définition de la relation entre le modèle Agent avec le modèle Competence
    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'agent_competence')->withPivot('niveau');
    }

    // Définition de la relation entre le modèle Agent avec le modèle Ticket
    public function ticketsAssignes()
    {
        return $this->hasMany(Ticket::class, 'assigne_a_id');
    }

    // Définition de la relation entre le modèle Agent avec le modèle Equipe
    public function equipes()
    {
        return $this->belongsToMany(Equipe::class, 'agent_equipe');
    }

    // Définition de la relation entre le modèle Agent avec le modèle BaseConnaissance
    public function baseConnaissances()
    {
        return $this->hasMany(BaseConnaissance::class, 'agent_id');
    }
}
