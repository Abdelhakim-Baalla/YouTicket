<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\AgentRepositoryInterface;
use App\Repositories\Interfaces\CommentaireRepositoryInterface;
use App\Repositories\Interfaces\EtatRepositoryInterface;
use App\Repositories\Interfaces\FrequenceRepositoryInterface;
use App\Repositories\Interfaces\PieceJointeRepositoryInterface;
use App\Repositories\Interfaces\PrioriteRepositoryInterface;
use App\Repositories\Interfaces\ProjetRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\SlaRepositoryInterface;
use App\Repositories\Interfaces\TicketRepositoryInterface;
use App\Repositories\Interfaces\TypeTicketRepositoryInterface;
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
    protected $projetRepository;
    protected $typeTicketRepository;
    protected $prioriteRepository;
    protected $frequenceRepository;
    protected $etatRepository;
    protected $slaRepository;
    protected $pienceJointeRepository;

    public function __construct(PieceJointeRepositoryInterface $pienceJointeRepository, SlaRepositoryInterface $slaRepository, EtatRepositoryInterface $etatRepository, FrequenceRepositoryInterface $frequenceRepository, PrioriteRepositoryInterface $prioriteRepository, TypeTicketRepositoryInterface $typeTicketRepository, ProjetRepositoryInterface $projetRepository, RoleRepositoryInterface $roleRepository, CommentaireRepositoryInterface $commentaireRepository, AgentRepositoryInterface $agentRepository, UtilisateurRepositoryInterface $utilisateurRepository, TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->utilisateurRepository = $utilisateurRepository;
        $this->agentRepository = $agentRepository;
        $this->commentaireRepository = $commentaireRepository;
        $this->roleRepository = $roleRepository;
        $this->projetRepository = $projetRepository;
        $this->typeTicketRepository = $typeTicketRepository;
        $this->prioriteRepository = $prioriteRepository;
        $this->frequenceRepository = $frequenceRepository;
        $this->etatRepository = $etatRepository;
        $this->slaRepository = $slaRepository;
        $this->pienceJointeRepository = $pienceJointeRepository;
    }

    public function showUtilisateurDashboard()
    {
        $countTicketActif = $this->ticketRepository->tous()->count();
        // dd($countTicketActif);
        return view('dashboard.utilisateur.index');
    }


    public function showUtilisateurTickets()
    {
        // dd(Auth::user()->id);
        $tickets = $this->ticketRepository->trouverParDemandeurId(Auth::user()->id);
        foreach ($tickets as $ticket) {
            $assigne_a_agent = $this->agentRepository->trouver($ticket->assigne_a_id);
            // dd($assigne_a_agent->utilisateur_id);
            if(!$assigne_a_agent)
            {
                continue;
            }
            $utilisateur_a_assigne = $this->utilisateurRepository->trouver($assigne_a_agent->utilisateur_id);
            // dd($utilisateur_a_assigne);
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
        if(!$ticket)
        {
            return redirect()->route('dashboard.utilisateur.tickets')
                ->with('error', 'Ticket non trouver');
        }


        $ticketCreePar = $this->utilisateurRepository->trouver($ticket->demandeur_id);
        $ticketAssigne_A = $this->agentRepository->trouver($ticket->assigne_a_id);
        // dd($ticketAssigne_A);
        if($ticketAssigne_A)
        {
            $ticketAssigne_A = $this->utilisateurRepository->trouver($ticketAssigne_A->utilisateur_id);
        }

        // dd($ticketCreePar->id);
        $roleUserAuth = $this->roleRepository->trouver(Auth::user()->role_id);
        $roleUserAuth = $roleUserAuth->nom;
        // dd($roleUserAuth);
        if ($ticketCreePar->id != Auth::user()->id && $ticketAssigne_A->id != Auth::user()->id && $roleUserAuth != "admin") {
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
        if (!Auth::user()->id) {
            return redirect()->route('login')->with('error', 'Please log in to Comment in a ticket.');
        }

        $data = [
            'ticket_id' => $request->id,
            'utilisateur_id' => Auth::user()->id,
            'contenu' => $request->comment
        ];

        $commentaire = $this->commentaireRepository->creer($data);

        if (!$commentaire) {
            return redirect()->route('dashboard.utilisateur.ticket.show', $request->id)->with('error', 'Probleme dans la creation de commentaire, ressayer autrefois.');
        }

        return redirect()->to(route('dashboard.utilisateur.ticket.show', $request->id) . '#comments-section');
    }

    public function showUtilisateurTicketsCreateModal()
    {
        $projets = $this->projetRepository->tous()->where('statut', '!=', 'annule')->where('statut', '!=', 'termine');
        $typeTickets = $this->typeTicketRepository->tous();
        $priorites = $this->prioriteRepository->tous();
        $frequences = $this->frequenceRepository->tous();
        $etats = $this->etatRepository->tous();
        $experts = $this->agentRepository->tous()->where('disponible', 1);
        $slas = $this->slaRepository->tous();
        // dd($projets);
        return view('dashboard.utilisateur.tickets.create', compact('projets', 'typeTickets', 'priorites', 'frequences', 'etats', 'experts', 'slas'));
    }


    public function utilisateurStoreCreateTickets(Request $request)
    {
        $validated = $request->validate([
            'projet' => 'nullable|integer|exists:projets,id',
            'type' => 'required|integer|exists:type_tickets,id',
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'priorite' => 'required|integer|exists:priorites,id',
            'etat' => 'required|integer|exists:etats,id',
            'frequence' => 'nullable|integer|exists:frequences,id',
            'assigne_a_id' => 'nullable|integer|exists:agents,id',
            'sla' => 'nullable|integer|exists:slas,id',
            'pieces_jointes.*' => 'nullable|file|max:5120', // 5MB max
        ]);

        // Validation manuelle des types MIME
        if ($request->hasFile('pieces_jointes')) {
            $allowedMimeTypes = [
                // Images
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/webp',

                // Documents
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                'text/plain',
                'text/csv',

                // Archives
                'application/zip',
                'application/x-zip-compressed',
                'application/x-rar-compressed',
                'application/octet-stream',

                // Autres
                'application/json',
                'application/xml'
            ];

            foreach ($request->file('pieces_jointes') as $file) {
                if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Type de fichier non autorisé: ' . $file->getClientOriginalName());
                }
            }
        }

        try {
            // $lastTicket = $this->ticketRepository->tous()->count();
            // $ticketNumber = 'TICK-' . now()->format('Y') . '-' . str_pad($lastTicket + 1, 5, '0', STR_PAD_LEFT);
            
            $data = [
                'titre' => $validated['titre'],
                'description' => $validated['description'],
                'demandeur_id' => Auth::id(),
                'assigne_a_id' => $validated['assigne_a_id'],
                'etat_id' => $validated['etat'],
                'priorite_id' => $validated['priorite'],
                'type_ticket_id' => $validated['type'],
                'projet_id' => $validated['projet'],
                'sla_id' => $validated['sla'],
                'frequence_id' => $validated['frequence'],
            ];

            $ticket = $this->ticketRepository->creer($data);
            $ticketNumber = 'TICK-' . now()->format('Y') . '-' . str_pad($ticket->id, 6, '0', STR_PAD_LEFT);
            $data = [
                'numero' => $ticketNumber,
            ];

            $this->ticketRepository->mettreAJour($ticket->id, $data);
            // dd($data);

            if ($ticket && $request->hasFile('pieces_jointes')) {
                foreach ($request->file('pieces_jointes') as $file) {
                    $path = $file->store('pieces_jointes', 'public');

                    $this->pienceJointeRepository->creer([
                        'ticket_id' => $ticket->id,
                        'utilisateur_id' => Auth::id(),
                        'nom_original' => $file->getClientOriginalName(),
                        'chemin' => $path,
                        'type_mime' => $file->getMimeType(),
                        'taille' => $file->getSize(),
                    ]);
                }
            }

            return redirect()->route('dashboard.utilisateur.ticket.show', $ticket->id)
                ->with('success', 'Ticket créé avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }
}
