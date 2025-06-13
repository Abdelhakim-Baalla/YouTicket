<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\AgentRepositoryInterface;
use App\Repositories\Interfaces\TicketRepositoryInterface;
use App\Repositories\Interfaces\UtilisateurRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
    protected $ticketRepository;
    protected $utilisateurRepository;
    protected $agentRepository;

    public function __construct(AgentRepositoryInterface $agentRepository, UtilisateurRepositoryInterface $utilisateurRepository, TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->utilisateurRepository = $utilisateurRepository;
        $this->agentRepository = $agentRepository;
    }

     public function showUtilisateurDashboard()
    {
        $countTicketActif= $this->ticketRepository->tous()->count();
        // dd($countTicketActif);
        return view('dashboard.utilisateur.index');
    }


    public function showUtilisateurTickets()
    {
        // dd(Auth::user()->id);
        $tickets = $this->ticketRepository->trouverParDemandeurId(Auth::user()->id);
        foreach($tickets as $ticket)
        {
            $assigne_a_agent = $this->agentRepository->trouver($ticket->assigne_a_id);
            $utilisateur_a_assigne = $this->utilisateurRepository->trouver($assigne_a_agent->utilisateur_id);
            $ticket->assigne_a = $utilisateur_a_assigne;
        }
        // dd($tickets);
        return view('dashboard.utilisateur.tickets.index', compact('tickets'));
    }
}
