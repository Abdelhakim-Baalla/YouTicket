<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'utilisateur_id',
        'specialite',
        'niveau_experience',
        'disponible',
        'charge_travail',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'agent_competence')
            ->withPivot('niveau');
    }

    public function ticketsAssignes()
    {
        return $this->hasMany(Ticket::class, 'assigne_a_id');
    }

    public function equipes()
    {
        return $this->belongsToMany(Equipe::class, 'agent_equipe');
    }

    public function baseConnaissances()
    {
        return $this->hasMany(BaseConnaissance::class, 'agent_id');
    }
}
