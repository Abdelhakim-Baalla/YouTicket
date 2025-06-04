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

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
