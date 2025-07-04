<?php

namespace App\Repositories;

use App\Models\Commentaire;
use App\Repositories\Interfaces\CommentaireRepositoryInterface;

class CommentaireRepository implements CommentaireRepositoryInterface
{
    public function tous()
    {
        return Commentaire::all();
    }
    
    public function trouver($id)
    {
        return Commentaire::find($id);
    }

    public function trouverParTicketId($id)
    {
        return Commentaire::where('ticket_id', $id)->get();
    } 
    
    public function creer(array $donnees)
    {
        return Commentaire::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $commentaire = $this->trouver($id);
        if ($commentaire) {
            return $commentaire->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $commentaire = $this->trouver($id);
        if ($commentaire) {
            return $commentaire->delete();
        }
        return false;
    }
    
}