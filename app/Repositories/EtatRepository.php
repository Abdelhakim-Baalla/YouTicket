<?php

namespace App\Repositories;

use App\Models\Etat;
use App\Repositories\Interfaces\EtatRepositoryInterface;

class EtatRepository implements EtatRepositoryInterface
{
    public function tous()
    {
        return Etat::all();
    }
    
    public function trouver($id)
    {
        return Etat::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Etat::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $etat = $this->trouver($id);

        if($etat)
        {
            return $etat->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $etat = $this->trouver($id);

        if($etat)
        {
            return $etat->delete();
        }
        return false;
    }
    
}