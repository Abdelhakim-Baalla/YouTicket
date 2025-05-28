<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Repositories\Interfaces\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{
    public function tous()
    {
        return Admin::all();
    }

    public function trouver($id)
    {
        return Admin::find($id);
    }

    public function creer(array $donnees)
    {
        return Admin::create($donnees);
    }

    public function mettreAJour($id, array $donnees)
    {
        $admin = $this->trouver($id);
        if ($admin) 
        {
            $admin->update($donnees);
            return $admin;
        }
        return null;
    }

    public function supprimer($id)
    {
        $admin = $this->trouver($id);
        if($admin)
        {
            $admin->delete();
            return true;
        }
    }

}