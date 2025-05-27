<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieKb extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'parent_id',
        'ordre',
        'active',
    ];

    public function parent()
    {
        return $this->belongsTo(CategorieKb::class, 'parent_id');
    }

    public function enfants()
    {
        return $this->hasMany(CategorieKb::class, 'parent_id');
    }

    public function baseConnaissances()
    {
        return $this->hasMany(BaseConnaissance::class, 'categorie_kb_id');
    }
}
