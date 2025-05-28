<?php

namespace App\Repositories;

use App\Models\BaseConnaissance;
use App\Repositories\Interfaces\BaseConnaissanceRepositoryInterface;

class BaseConnaissanceRepository implements BaseConnaissanceRepositoryInterface
{
    public function tous()
    {
        return BaseConnaissance::all();
    }
    
    public function trouver($id)
    {
        return BaseConnaissance::find($id);
    }
    
    public function creer(array $donnees)
    {
        return BaseConnaissance::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $baseConnaissance = $this->trouver($id);
        if($baseConnaissance)
        {
            $baseConnaissance->update($donnees);
            return $baseConnaissance;
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $baseConnaissance = $this->trouver($id);
        if($baseConnaissance)
        {
            $baseConnaissance->delete();
            return true;
        }
        return false;
    }
    
}