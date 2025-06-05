<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class PersonalAccessToken extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        // à adapter selon la structure de la table
    ];
}
