<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Equipe extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'description',
        'active',
        'responsable',
        'email',
        'telephone',
        'specialite',
    ];

    // Définition de la relation entre le modèle Equipe et les Utilisateurs
    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }

    // Définition de la relation entre le modèle Equipe et les Projets
    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'agent_equipe');
    }
}
