<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Utilisateur extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

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
        'derniere_connexion',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    public function ticketsDemandes()
    {
        return $this->hasMany(Ticket::class, 'demandeur_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'assigne_a_id');
    }

    public function ticketsAssignes()
    {
        return $this->hasMany(Ticket::class, 'assigne_a_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function proprietaires()
    {
        return $this->hasMany(Proprietaire::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Permet à Laravel Notification Channels d'envoyer un SMS via Twilio
     */
    public function routeNotificationForTwilio()
    {
        return $this->telephone;
    }
}
