<?php

namespace App\Repositories;

use App\Models\Competence;
use App\Repositories\Interfaces\CompetenceRepositoryInterface;

class CompetenceRepository implements CompetenceRepositoryInterface
{
    public function tous()
    {
        return Competence::all();
    }
    
    public function trouver($id)
    {
        return Competence::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Competence::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $competence = $this->trouver($id);
        if($competence)
        {
           return $competence->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $competence = $this->trouver($id);
        if($competence)
        {
           return $competence->delete();
        }
        return false;
    }
    
}