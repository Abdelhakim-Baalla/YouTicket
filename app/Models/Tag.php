<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Tag extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'couleur',
    ];

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'ticket_tag');
    }
}
