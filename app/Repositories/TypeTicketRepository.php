<?php

namespace App\Repositories;

use App\Models\TypeTicket;
use App\Repositories\Interfaces\TypeTicketRepositoryInterface;

class TicketRepository implements TypeTicketRepositoryInterface
{
    public function tous()
    {
        return TypeTicket::all();
    }
    
    public function trouver($id)
    {
        return TypeTicket::find($id);
    }
    
    public function creer(array $donnees)
    {
        return TypeTicket::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $typeTicket = $this->trouver($id);

        if ($typeTicket) 
        {
            return $typeTicket->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $typeTicket = $this->trouver($id);

        if ($typeTicket) 
        {
            return $typeTicket->delete();
        }
        return false;
    }
    
}