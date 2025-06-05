<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class Competence extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'nom',
        'description',
        'niveau',
    ];

    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'agent_competence')
            ->withPivot('niveau');
    }
}
