<?php

namespace App\Repositories;

use App\Models\Utilisateur;
use App\Repositories\Interfaces\UtilisateurRepositoryInterface;

class UtilisateurRepository implements UtilisateurRepositoryInterface
{
    public function tous()
    {
        return Utilisateur::all();
    }
    
    public function trouver($id)
    {
        return Utilisateur::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Utilisateur::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $utilisateur = $this->trouver($id);
        
        if ($utilisateur) 
        {
            return $utilisateur->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $utilisateur = $this->trouver($id);
        
        if ($utilisateur) 
        {
            return $utilisateur->delete();
        }
        return false;
    }
    
}