<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\AgentRepositoryInterface;
use App\Repositories\Interfaces\CommentaireRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
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
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository, CommentaireRepositoryInterface $commentaireRepository, AgentRepositoryInterface $agentRepository, UtilisateurRepositoryInterface $utilisateurRepository, TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->utilisateurRepository = $utilisateurRepository;
        $this->agentRepository = $agentRepository;
        $this->commentaireRepository = $commentaireRepository;
        $this->roleRepository = $roleRepository;
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
        $ticketAssigne_A = $this->agentRepository->trouver($ticket->assigne_a_id);
        $ticketAssigne_A = $this->utilisateurRepository->trouver($ticketAssigne_A->utilisateur_id);
        // dd($ticketCreePar->id);
        $roleUserAuth = $this->roleRepository->trouver(Auth::user()->role_id);
        $roleUserAuth = $roleUserAuth->nom;
        // dd($roleUserAuth);
        if($ticketCreePar->id != Auth::user()->id && $ticketAssigne_A->id != Auth::user()->id && $roleUserAuth != "admin")
        {
            // dd(Auth::user()->role_id);
            return redirect('/403');
        }
        
        $ticket->cree_par = $ticketCreePar;
        $ticket->assigne_a = $ticketAssigne_A;
        // dd($ticket);



        // commentaires
        $commentaires = $this->commentaireRepository->trouverParTicketId($request->id);
        // dd($commentaires);

        return view('dashboard.utilisateur.tickets.show', compact('ticket', 'commentaires'));
    }

    public function showTicketCommentStore(Request $request)
    {
        // dd($request->comment);
        if(!Auth::user()->id)
        {
            return redirect()->route('login')->with('error', 'Please log in to Comment in a ticket.');
        }

        $data = [
            'ticket_id' => $request->id,
            'utilisateur_id' => Auth::user()->id,
            'contenu' => $request->comment
        ];

        $commentaire = $this->commentaireRepository->creer($data);

        if(!$commentaire)
        {
            return redirect()->route('dashboard.utilisateur.ticket.show', $request->id)->with('error', 'Probleme dans la creation de commentaire, ressayer autrefois.');
        }

       return redirect()->to(route('dashboard.utilisateur.ticket.show', $request->id) . '#comments-section');

    }
}
