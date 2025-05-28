<?php

namespace App\Repositories;

use App\Models\CategorieKb;
use App\Repositories\Interfaces\CategorieKbRepositoryInterface;

class CategorieKbRepository implements CategorieKbRepositoryInterface
{
    public function tous()
    {
        return CategorieKb::all();
    }
    
    public function trouver($id)
    {
        return CategorieKb::find($id);
    }
    
    public function creer(array $donnees)
    {
        return CategorieKb::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $categorie = $this->trouver($id);
        if ($categorie) {
            $categorie->update($donnees);
            return $categorie;
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $categorie = $this->trouver($id);
        if ($categorie) {
            $categorie->delete();
            return true;
        }
        return false;
    }
    
}