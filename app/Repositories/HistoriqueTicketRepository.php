<?php

namespace App\Repositories;

use App\Models\HistoriqueTicket;
use App\Repositories\Interfaces\HistoriqueTicketRepositoryInterface;

class HistoriqueTicketRepository implements HistoriqueTicketRepositoryInterface
{
    public function tous()
    {
        return HistoriqueTicket::all();
    }
    
    public function trouver($id)
    {
        return HistoriqueTicket::find($id);
    }
    
    public function creer(array $donnees)
    {
        return HistoriqueTicket::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $historiqueTicket = $this->trouver($id);

        if ($historiqueTicket) 
        {
            $historiqueTicket->update($donnees);
            return $historiqueTicket;
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $historiqueTicket = $this->trouver($id);

        if ($historiqueTicket) 
        {
            return $historiqueTicket->delete();
        }
        return false;
    }
    
}