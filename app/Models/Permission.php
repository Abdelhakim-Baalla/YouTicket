<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Permission extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'description',
        'module',
    ];
}
