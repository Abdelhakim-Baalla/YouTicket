<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Projet extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'description',
        'responsable_id',
        'date_debut',
        'date_fin',
        'statut',
    ];

    // Définition de la relation entre le modèle Projet et Utilisateur
    public function responsable()
    {
        return $this->belongsTo(Utilisateur::class, 'responsable_id');
    }
}
