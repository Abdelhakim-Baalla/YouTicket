<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Rapport extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'description',
        'type',
        'parametres',
        'createur_id',
        'automatique',
        'frequence_generation',
    ];

    // Définition de la relation entre le modèle Rapport et Utilisateur
    public function createur()
    {
        return $this->belongsTo(Utilisateur::class, 'createur_id');
    }
}
