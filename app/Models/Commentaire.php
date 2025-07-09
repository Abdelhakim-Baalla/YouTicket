<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Commentaire extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'ticket_id',
        'utilisateur_id',
        'contenu',
        'interne',
    ];

    // Définition des relations entre le modèle Commentaire et Ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    // Définition des relations entre le modèle Commentaire et Utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
