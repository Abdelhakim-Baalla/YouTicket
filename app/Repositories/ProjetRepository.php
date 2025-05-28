<?php

namespace App\Repositories;

use App\Models\Projet;
use App\Repositories\Interfaces\ProjetRepositoryInterface;

class ProjetRepository implements ProjetRepositoryInterface
{
    public function tous()
    {
        return Projet::all();
    }
    
    public function trouver($id)
    {
        return Projet::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Projet::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $projet = $this->trouver($id);;

        if ($projet) 
        {
            return $projet->update($donnees); 
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $projet = $this->trouver($id);

        if($projet)
        {
            return $projet->delete();
        }
        return false;
    }
    
}