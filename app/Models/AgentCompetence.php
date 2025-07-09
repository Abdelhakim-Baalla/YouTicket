<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Loggable;

class AgentCompetence extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'agent_id',
        'competence_id',
        'niveau',
    ];

    // Définition relation entre model AgentCompetence et Agent
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    // Définition relation entre model AgentCompetence et Competence
    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }
}
