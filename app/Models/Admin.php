<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Admin extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'utilisateur_id',
        'permissions_speciales',
    ];

    // Définition de la relation avec le modèle Utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
