<?php

namespace App\Repositories;

use App\Models\Equipe;
use App\Repositories\Interfaces\EquipeRepositoryInterface;

class EquipeRepository implements EquipeRepositoryInterface
{
    public function tous()
    {
        return Equipe::all();
    }
    
    public function trouver($id)
    {
        return Equipe::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Equipe::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $equipe = $this->trouver($id);
        if($equipe)
        {
            return $equipe->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $equipe = $this->trouver($id);
        if($equipe)
        {
            return $equipe->delete();
        }
        return false;
    }
    
}