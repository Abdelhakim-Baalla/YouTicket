<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourFerie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'date',
        'recurrent',
    ];
}
