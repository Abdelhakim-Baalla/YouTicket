<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'numero',
        'titre',
        'description',
        'demandeur_id',
        'assigne_a_id',
        'etat_id',
        'priorite_id',
        'type_ticket_id',
        'projet_id',
        'sla_id',
        'frequence_id',
        'date_echeance',
        'date_premiere_reponse',
        'date_resolution',
        'temps_passe_minutes',
        'cout_estime',
        'solution',
        'champs_personnalises',
    ];

    public function demandeur()
    {
        return $this->belongsTo(Utilisateur::class, 'demandeur_id');
    }

    public function assigneA()
    {
        return $this->belongsTo(Utilisateur::class, 'assigne_a_id');
    }

    public function etat()
    {
        return $this->belongsTo(Etat::class);
    }

    public function priorite()
    {
        return $this->belongsTo(Priorite::class);
    }

    public function typeTicket()
    {
        return $this->belongsTo(TypeTicket::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function sla()
    {
        return $this->belongsTo(Sla::class);
    }

    public function frequence()
    {
        return $this->belongsTo(Frequence::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function proprietaires()
    {
        return $this->hasMany(Proprietaire::class);
    }

    public function pieceJointes()
    {
        return $this->hasMany(PieceJointe::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'ticket_tag');
    }
}
