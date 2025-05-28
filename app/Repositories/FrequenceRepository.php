<?php

namespace App\Repositories;

use App\Models\Frequence;
use App\Repositories\Interfaces\FrequenceRepositoryInterface;

class FrequenceRepository implements FrequenceRepositoryInterface
{
    public function tous()
    {
        return Frequence::all();
    }
    
    public function trouver($id)
    {
        return Frequence::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Frequence::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $frequence = $this->trouver($id);

        if($frequence)
        {
            return $frequence->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $frequence = $this->trouver($id);

        if($frequence)
        {
            return $frequence->delete();
        }
        return false;
    }
    
}