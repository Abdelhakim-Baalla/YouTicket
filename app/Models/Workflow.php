<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Workflow extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'description',
        'type_ticket_id',
        'actif',
    ];

    // Définition de la relation entre le modèle Workflow et TypeTicket
    public function typeTicket()
    {
        return $this->belongsTo(TypeTicket::class);
    }

    // Définition de la relation entre le modèle Workflow et Transition
    public function transitions()
    {
        return $this->hasMany(Transition::class);
    }
}
