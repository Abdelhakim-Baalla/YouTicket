<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use App\Traits\Loggable;

class Utilisateur extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, Loggable;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'telephone',
        'poste',
        'departement',
        'role_id',
        'equipe_id',
        'actif',
        'photo',
        'derniere_connexion',
        'remember_token',
    ];

    // Définition de la relation entre le modèle Utilisateur et Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Définition de la relation entre le modèle Utilisateur et Equipe
    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    // Définition de la relation entre le modèle Utilisateur et Ticket
    public function ticketsDemandes()
    {
        return $this->hasMany(Ticket::class, 'demandeur_id');
    }

    // Définition de la relation entre le modèle Utilisateur et Ticket (assigné à)
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'assigne_a_id');
    }

    // Définition de la relation entre le modèle Utilisateur et Ticket (assigné par)
    public function ticketsAssignes()
    {
        return $this->hasMany(Ticket::class, 'assigne_a_id');
    }

    // Définition de la relation entre le modèle Utilisateur et Commentaire
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    // Définition de la relation entre le modèle Utilisateur et propriétaires
    public function proprietaires()
    {
        return $this->hasMany(Proprietaire::class);
    }

    // Définition de la relation entre le modèle Utilisateur et Notification
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'utilisateur_id');
    }

    //  Définition JwtIdentifier et JWTCustomClaims pour l'authentification JWT
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    // Permet à Laravel Notification Channels d'envoyer un SMS via Twilio
    public function routeNotificationForTwilio()
    {
        return $this->telephone;
    }
}
