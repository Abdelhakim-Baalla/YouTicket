<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Messagerie extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'expediteur_id',
        'destinataire_id',
        'objet',
        'message',
        'lu',
        'date_lecture',
    ];

    // Définition de la relation entre le modèle Messagerie et Expediteur
    public function expediteur()
    {
        return $this->belongsTo(Utilisateur::class, 'expediteur_id');
    }

    // Définition de la relation entre le modèle Messagerie et Destinataire
    public function destinataire()
    {
        return $this->belongsTo(Utilisateur::class, 'destinataire_id');
    }
}
