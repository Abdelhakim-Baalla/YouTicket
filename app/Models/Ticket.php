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

    // Définition de la relation entre le modèle Ticket et Utilisateur (demandeur)
    public function demandeur()
    {
        return $this->belongsTo(Utilisateur::class, 'demandeur_id');
    }

    // Définition de la relation entre le modèle Ticket et Utilisateur (assigne à)
    public function assigneA()
    {
        return $this->belongsTo(Utilisateur::class, 'assigne_a_id');
    }

    // Définition de la relation entre le modèle Ticket et Etat
    public function etat()
    {
        return $this->belongsTo(Etat::class);
    }

    // Définition des relations entre le modèle Ticket et priorite
    public function priorite()
    {
        return $this->belongsTo(Priorite::class);
    }

    // Définition de la relation entre le modèle Ticket et TypeTicket
    public function typeTicket()
    {
        return $this->belongsTo(TypeTicket::class);
    }

    // Définition de la relation entre le modèle Ticket et Projet
    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    // Définition de la relation entre le modèle Ticket et Sla
    public function sla()
    {
        return $this->belongsTo(Sla::class);
    }

    // Définition de la relation entre le modèle Ticket et Frequence
    public function frequence()
    {
        return $this->belongsTo(Frequence::class);
    }

    // Définition de la relation entre le modèle Ticket et Commentaire
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    // Définition de la relation entre le modèle Ticket et Proprietaire
    public function proprietaires()
    {
        return $this->hasMany(Proprietaire::class);
    }

    // Définition de la relation entre le modèle Ticket et PieceJointe
    public function pieceJointes()
    {
        return $this->hasMany(PieceJointe::class);
    }

    // Définition de la relation entre le modèle Ticket et Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'ticket_tag');
    }
}
