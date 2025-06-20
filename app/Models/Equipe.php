<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Equipe extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'description',
        'active',
        'responsable',
        'email',
        'telephone',
        'specialite',
    ];

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }

    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'agent_equipe');
    }
}
