<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Messagerie extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'expediteur_id',
        'destinataire_id',
        'objet',
        'message',
        'lu',
        'date_lecture',
    ];

    public function expediteur()
    {
        return $this->belongsTo(Utilisateur::class, 'expediteur_id');
    }

    public function destinataire()
    {
        return $this->belongsTo(Utilisateur::class, 'destinataire_id');
    }
}
