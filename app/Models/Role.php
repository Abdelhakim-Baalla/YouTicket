<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Role extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'description',
    ];

    // Définition de la relation entre le modèle Role et Permission
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
