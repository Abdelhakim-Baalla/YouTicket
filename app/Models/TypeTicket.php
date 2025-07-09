<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class TypeTicket extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'description',
        'icone',
        'actif',
    ];

    // Définition de la relation entre le modèle TypeTicket et workflows
    public function workflows()
    {
        return $this->hasMany(Workflow::class);
    }

    // Définition de la relation entre le modèle TypeTicket et ChampPersonnalise
    public function champPersonnalises()
    {
        return $this->hasMany(ChampPersonnalise::class);
    }
}
