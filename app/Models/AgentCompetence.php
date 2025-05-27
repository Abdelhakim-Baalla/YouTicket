<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentCompetence extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'competence_id',
        'niveau',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }
}
