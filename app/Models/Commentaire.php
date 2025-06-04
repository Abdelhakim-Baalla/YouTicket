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

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
