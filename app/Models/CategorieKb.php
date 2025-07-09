<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class CategorieKb extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'description',
        'parent_id',
        'ordre',
        'active',
    ];

    // Définition de la relation entre le modèle CategorieKb et son parent
    public function parent()
    {
        return $this->belongsTo(CategorieKb::class, 'parent_id');
    }

    // Définition de la relation entre le modèle CategorieKb et ses enfants
    public function enfants()
    {
        return $this->hasMany(CategorieKb::class, 'parent_id');
    }

    // Définition de la relation entre le modèle CategorieKb et les bases de connaissances
    public function baseConnaissances()
    {
        return $this->hasMany(BaseConnaissance::class, 'categorie_kb_id');
    }
}
