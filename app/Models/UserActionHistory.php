<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActionHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'model_type',
        'model_id',
        'old_values',
        'new_values',
        'description',
        'ip_address',
        'user_agent'
    ];

    // Définition des casts pour les attributs JSON
    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
    ];

    // Définition de la relation entre le modèle UserActionHistory et Utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id');
    }

    // Définition de la relation entre le modèle UserActionHistory et le modèle polymorphe
    public function model()
    {
        return $this->morphTo();
    }

    // Définition de la relation entre le modèle UserActionHistory et Utilisateur
    public function user()
    {
        return $this->belongsTo(Utilisateur::class, 'user_id');
    }
}
