<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    public function tous()
    {
        return Tag::all();
    }
    
    public function trouver($id)
    {
        return Tag::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Tag::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $tag = $this->trouver($id);

        if ($tag) 
        {
            return $tag->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $tag = $this->trouver($id);

        if ($tag) 
        {
            return $tag->delete();
        }
        return false;
    }
    
}