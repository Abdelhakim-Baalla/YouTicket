<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegleEscalade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'priorite_id',
        'delai_heures',
        'utilisateur_escalade_id',
        'actif',
    ];

    public function priorite()
    {
        return $this->belongsTo(Priorite::class);
    }

    public function utilisateurEscalade()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_escalade_id');
    }
}
