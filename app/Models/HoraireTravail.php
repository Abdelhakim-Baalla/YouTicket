<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoraireTravail extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'horaires',
        'fuseau_horaire',
        'par_defaut',
    ];
}
