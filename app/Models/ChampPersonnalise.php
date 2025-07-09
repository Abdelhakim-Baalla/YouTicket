<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class ChampPersonnalise extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'libelle',
        'type',
        'options',
        'obligatoire',
        'ordre',
        'type_ticket_id',
    ];

    // Définition de la relation entre le modèle ChampPersonnalise et TypeTicket
    public function typeTicket()
    {
        return $this->belongsTo(TypeTicket::class);
    }
}
