<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function tous()
    {
        return Role::all();
    }
    
    public function trouver($id)
    {
        return Role::find($id);
    }

    public function trouverParNom($nom)
    {
        return Role::where('nom', $nom)->first();
    }

    public function trouverAvecNom($nom)
    {
        return Role::where('nom', $nom)->get()->first();
    }
    
    public function creer(array $donnees)
    {
        return Role::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $role = $this->trouver($id);

        if ($role) 
        {
            return $role->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $role = $this->trouver($id);

        if ($role) 
        {
            return $role->delete();
        }
        return false;
    }
    
}