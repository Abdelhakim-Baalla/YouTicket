<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Notification extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'utilisateur_id',
        'ticket_id',
        'type',
        'titre',
        'message',
        'lu',
        'date_envoi',
    ];

    // Définition de la relation entre le modèle Notification et Utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    // Définition de la relation entre le modèle Notification et Ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
