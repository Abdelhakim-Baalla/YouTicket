<?php

namespace App\Repositories;

use App\Models\Agent;
use App\Repositories\Interfaces\AgentRepositoryInterface;

class AgentRepository implements AgentRepositoryInterface
{
    public function tous()
    {
        return Agent::all();
    }
    
    public function trouver($id)
    {
        return Agent::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Agent::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $agent = $this->trouver($id);
        if ($agent) {
            return $agent->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $agent = $this->trouver($id);
        if ($agent) {
            return $agent->delete();
        }
        return false;
    }
    
}