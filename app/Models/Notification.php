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

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
