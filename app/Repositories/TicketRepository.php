<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Repositories\Interfaces\TicketRepositoryInterface;

class TicketRepository implements TicketRepositoryInterface
{
    public function tous()
    {
        return Ticket::all();
    }
    
    public function trouver($id)
    {
        return Ticket::find($id);
    }
    
    public function creer(array $donnees)
    {
        return Ticket::create($donnees);
    }
    
    public function mettreAJour($id, array $donnees)
    {
        $ticket = $this->trouver($id);

        if ($ticket) 
        {
            return $ticket->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $ticket = $this->trouver($id);

        if ($ticket) 
        {
            return $ticket->delete();
        }
        return false;
    }
    
}