<?php

namespace App\Repositories;

use App\Models\Sla;
use App\Repositories\Interfaces\SlaRepositoryInterface;

class SlaRepository implements SlaRepositoryInterface
{
    public function tous()
    {
        return Sla::all();
    }
    
    public function trouver($id)
    {
        return Sla::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Sla::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $sla = $this->trouver($id);

        if ($sla) 
        {
            return $sla->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $sla = $this->trouver($id);

        if ($sla) 
        {
            return $sla->delete();
        }
        return false;
    }
    
}