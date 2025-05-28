<?php

namespace App\Repositories;

use App\Models\RegleEscalade;
use App\Repositories\Interfaces\RegleEscaladeRepositoryInterface;

class RegleEscaladeRepository implements RegleEscaladeRepositoryInterface
{
    public function tous()
    {
        return RegleEscalade::all();
    }
    
    public function trouver($id)
    {
        return RegleEscalade::find($id);
    }
    
    public function creer(array $donnees)
    {
        return RegleEscalade::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $regleEscalade = $this->trouver($id);

        if ($regleEscalade) 
        {
            return $regleEscalade->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $regleEscalade = $this->trouver($id);

        if ($regleEscalade) 
        {
            return $regleEscalade->delete();
        }
        return false;
    }
    
}