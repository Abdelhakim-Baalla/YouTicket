<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class TemplateTicket extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'description',
        'type_ticket_id',
        'titre_template',
        'description_template',
        'champs_par_defaut',
        'createur_id',
        'actif',
    ];

    // Définition des relations entre le modèle TemplateTicket et TypeTicket
    public function typeTicket()
    {
        return $this->belongsTo(TypeTicket::class);
    }

    // Définition des relations entre le modèle TemplateTicket et Utilisateur
    public function createur()
    {
        return $this->belongsTo(Utilisateur::class, 'createur_id');
    }
}
