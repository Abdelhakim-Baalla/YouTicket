<?php

namespace App\Repositories;

use App\Models\Rapport;
use App\Repositories\Interfaces\RapportRepositoryInterface;

class RapportRepository implements RapportRepositoryInterface
{
    public function tous()
    {
        return Rapport::all();
    }
    
    public function trouver($id)
    {
        return Rapport::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Rapport::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $rapport = $this->trouver($id);

        if ($rapport) 
        {
            return $rapport->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $rapport = $this->trouver($id);

        if ($rapport) 
        {
            return $rapport->delete();
        }
        return false;
    }
    
}