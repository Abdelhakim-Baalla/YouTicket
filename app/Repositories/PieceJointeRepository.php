<?php

namespace App\Repositories;

use App\Models\PieceJointe;
use App\Repositories\Interfaces\PieceJointeRepositoryInterface;

class PieceJointeRepository implements PieceJointeRepositoryInterface
{
    public function tous()
    {
        return PieceJointe::all();
    }
    
    public function trouver($id)
    {
        return PieceJointe::find($id);

    }
    
    public function creer(array $donnees)
    {
        return PieceJointe::create($donnees);

    }
    
    public function mettreAJour($id, array $donnees)
    {
        $pieceJointe = $this->trouver($id);

        if($pieceJointe)
        {
            return $pieceJointe->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $pieceJointe = $this->trouver($id);

        if($pieceJointe)
        {
            return $pieceJointe->delete();
        }
        return false;
    }
    
}