<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\AgentRepositoryInterface;
use App\Repositories\Interfaces\CommentaireRepositoryInterface;
use App\Repositories\Interfaces\TicketRepositoryInterface;
use App\Repositories\Interfaces\UtilisateurRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
    protected $ticketRepository;
    protected $utilisateurRepository;
    protected $agentRepository;
    protected $commentaireRepository;

    public function __construct(CommentaireRepositoryInterface $commentaireRepository, AgentRepositoryInterface $agentRepository, UtilisateurRepositoryInterface $utilisateurRepository, TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->utilisateurRepository = $utilisateurRepository;
        $this->agentRepository = $agentRepository;
        $this->commentaireRepository = $commentaireRepository;
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

    public function showTicket(Request $request)
    {
        // dd($request->id);
        // tickets
        $ticket = $this->ticketRepository->trouver($request->id);
        $ticketCreePar = $this->utilisateurRepository->trouver($ticket->demandeur_id);
        $ticketAssigne_A = $this->utilisateurRepository->trouver($ticket->assigne_a_id);
        $ticket->cree_par = $ticketCreePar;
        $ticket->assigne_a = $ticketAssigne_A;
        // dd($ticket);



        // commentaires
        $commentaires = $this->commentaireRepository->trouverParTicketId($request->id);
        // dd($commentaires);

        return view('dashboard.utilisateur.tickets.show', compact('ticket', 'commentaires'));
    }
}
