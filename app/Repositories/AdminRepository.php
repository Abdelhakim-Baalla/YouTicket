<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\Ticket;
use App\Models\Agent;
use App\Models\Etat;
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
           return $admin->update($donnees);
        }
        return null;
    }

    public function supprimer($id)
    {
        $admin = $this->trouver($id);
        if($admin)
        {
            return $admin->delete();
        }
    }

    public function countTickets()
    {
        return Ticket::count();
    }

    public function countAgents()
    {
        return Agent::count();
    }

    public function countTicketsResolu()
    {
        $tickets = Ticket::get();
        $etatResolu = Etat::where('nom', 'Résolu')->first();
        // dd($etatResolu->id);

        foreach ($tickets as $ticket) {
            if ($ticket->etat_id == $etatResolu->id) {
                $ticket->etat_id = 'Résolu';
            }
        }
        
        return Ticket::where('etat_id', 'Résolu')->count();
    }

}