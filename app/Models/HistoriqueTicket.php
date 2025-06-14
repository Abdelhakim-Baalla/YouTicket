<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class HistoriqueTicket extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'ticket_id',
        'utilisateur_id',
        'action',
        'anciennes_valeurs',
        'nouvelles_valeurs',
        'commentaire',
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
