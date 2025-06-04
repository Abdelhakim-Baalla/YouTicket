<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class BaseConnaissance extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'titre',
        'contenu',
        'mots_cles',
        'auteur_id',
        'categorie_kb_id',
        'publie',
        'vues',
        'note_moyenne',
    ];

    public function auteur()
    {
        return $this->belongsTo(Utilisateur::class, 'auteur_id');
    }

    public function categorie()
    {
        return $this->belongsTo(CategorieKb::class, 'categorie_kb_id');
    }

    public function evaluations()
    {
        return $this->hasMany(EvaluationKb::class);
    }
}
