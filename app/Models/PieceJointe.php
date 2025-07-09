<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieceJointe extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'ticket_id',
        'utilisateur_id',
        'nom_original',
        'nom_fichier',
        'chemin',
        'type_mime',
        'taille',
    ];

    // Définition de la relation entre le modèle PieceJointe et Ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    // Définition de la relation entre le modèle PieceJointe et Utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
