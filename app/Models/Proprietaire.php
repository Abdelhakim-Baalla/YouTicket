<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id',
        'ticket_id',
        'type',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
