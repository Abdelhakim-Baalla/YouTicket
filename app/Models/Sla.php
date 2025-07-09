<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Sla extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'description',
        'temps_reponse_heures',
        'temps_resolution_heures',
        'priorite_id',
        'horaire_travail_id',
        'actif',
    ];

    // Définition de la relation entre le modèle Sla et Priorite
    public function priorite()
    {
        return $this->belongsTo(Priorite::class);
    }

    // Définition de la relation entre le modèle Sla et HoraireTravail
    public function horaireTravail()
    {
        return $this->belongsTo(HoraireTravail::class);
    }
}
