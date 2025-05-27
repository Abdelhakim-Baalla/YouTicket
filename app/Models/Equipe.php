<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'active',
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
