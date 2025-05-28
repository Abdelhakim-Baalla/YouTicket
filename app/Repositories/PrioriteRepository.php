<?php

namespace App\Repositories;

use App\Models\Priorite;
use App\Repositories\Interfaces\PrioriteRepositoryInterface;

class PrioriteRepository implements PrioriteRepositoryInterface
{
    public function tous()
    {
        return Priorite::all();
    }
    
    public function trouver($id)
    {
        return Priorite::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Priorite::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $priorite = $this->trouver($id);

        if ($priorite) {
            return $priorite->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $priorite = $this->trouver($id);

        if ($priorite) {
            return $priorite->delete();
        }
        return false;
    }
    
}