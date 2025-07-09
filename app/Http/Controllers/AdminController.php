<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\Interfaces\AgentRepositoryInterface;
use App\Repositories\Interfaces\EquipeRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\UtilisateurRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    protected $adminRepository;
    protected $utilisateurRepository;
    protected $roleRepository;
    protected $equipeRepository;
    protected $agentRepository;

    public function __construct(AgentRepositoryInterface $agentRepository, EquipeRepositoryInterface $equipeRepository, AdminRepositoryInterface $adminRepository, UtilisateurRepositoryInterface $utilisateurRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->utilisateurRepository = $utilisateurRepository;
        $this->roleRepository = $roleRepository;
        $this->equipeRepository = $equipeRepository;
        $this->agentRepository = $agentRepository;
    }


    // Afficher le tableau de bord de l'administrateur
    public function showAdminDashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        $countTickets = $this->adminRepository->countTickets();
        $countAgents = $this->adminRepository->countAgents();
        $countTicketsResolu = $this->adminRepository->countTicketsResolu();

        return view('dashboard.admin.index', compact('countTickets', 'countAgents', 'countTicketsResolu'));
    }

    // Afficher le tableau de bord des utilisateurs pour l'administrateur
    public function showAdminDashboardUtilisateurs(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        if ($request->has('search') && $request->search != '') {
            $utilisateurs = $this->utilisateurRepository->rechercher($request->search);
        } else if ($request->has('role') && $request->role != '') {
            $utilisateurs = $this->utilisateurRepository->rechercherParRole($request->role);
        } else if ($request->has('status') && $request->status != '') {
            $utilisateurs = $this->utilisateurRepository->rechercherParStatus($request->status);
        } else {
            $utilisateurs = $this->utilisateurRepository->tous();
        }

        foreach ($utilisateurs as $utilisateur) {
            $role = $this->roleRepository->trouver($utilisateur->role_id);
            $utilisateur->role_id = $role ? $role->nom : 'Aucun rôle attribué';
            // dd($utilisateur->role_id);
        }
        $roles = $this->roleRepository->tous();

        return view('dashboard.admin.utilisateurs.index', compact('utilisateurs', 'roles'));
    }

    // Afficher le modal de création d'un utilisateur pour l'administrateur
    public function showAdminDashboardUtilisateursCreateModal()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        $equipes = $this->equipeRepository->tous();
        $roles = $this->roleRepository->tous();
        return view('dashboard.admin.utilisateurs.create', compact('equipes', 'roles'));
    }

    // Afficher le modal de modification d'un utilisateur pour l'administrateur
    public function showAdminDashboardUtilisateursEditModal(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        $utilisateur = $this->utilisateurRepository->trouver($request->id);
        if (!$utilisateur) {
            return redirect()->route('dashboard.admin.utilisateurs')->withErrors(['general' => 'Utilisateur non trouvé.']);
        }

        $role = $this->roleRepository->trouver($utilisateur->role_id);

        if ($role) {
            $utilisateur->role_id = $role->id;
        }

        $equipe = $this->equipeRepository->trouver($utilisateur->equipe_id);
        if ($equipe) {
            $utilisateur->equipe_id = $utilisateur->equipe_id;
        } else {
            $utilisateur->equipe_id = 'Aucune équipe attribuée';
        }

        $equipes = $this->equipeRepository->tous();
        $roles = $this->roleRepository->tous();

        return view('dashboard.admin.utilisateurs.edit', compact('utilisateur', 'equipes', 'roles'));
    }

    // Création d'un nouvel utilisateur pour l'administrateur
    public function AdminCreeUtilisateur(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs',
            'telephone' => 'required|string|max:15',
            'poste' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'departement' => 'nullable|string|max:255',
            'role_id' => 'required|integer|exists:roles,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'actif' => 'required|integer|in:0,1',
            'equipe_id' => 'nullable|integer|exists:equipes,id',
        ], [
            'nom.required' => 'Le nom est requis',
            'prenom.required' => 'Le prénom est requis',
            'email.required' => 'L\'adresse email est requise',
            'email.email' => 'Veuillez entrer une adresse email valide',
            'email.unique' => 'Cette adresse email est déjà utilisée par un autre compte',
            'password.required' => 'Le mot de passe est requis',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'telephone.required' => 'Le numéro de téléphone est requis',
            'role.required' => 'Le role est requis',
            'actif.required' => 'Le statut actif est requis',
            'equipe_id.exists' => 'L\'équipe sélectionnée n\'existe pas',
            'role_id.exists' => 'Le rôle sélectionné n\'existe pas',
        ]);

        try {
            $data['password'] = Hash::make($data['password']);

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = $file->store('photos', 'public');

                $data['photo'] = $path;
            } else {
                unset($data['photo']);
            }

            $user = $this->utilisateurRepository->creer($data);

            if ($user) {

                return redirect()->route('dashboard.admin.utilisateurs')->with('success', 'Compte créé avec succès !');
            }

            return back()->withErrors([
                'general' => 'Une erreur est survenue lors de la création du compte. Veuillez réessayer.',
            ])->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du compte: ' . $e->getMessage());

            return back()->withErrors([
                'general' => 'Une erreur technique est survenue. Veuillez réessayer plus tard.',
            ])->withInput();
        }
    }

    // Modification des informations d'un utilisateur pour l'administrateur
    public function AdminModifierUtilisateur(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' =>  'required|string|email|max:255',
            'telephone' => 'required|string|max:15',
            'poste' => 'nullable|string|max:255',
            'departement' => 'nullable|string|max:255',
            'role_id' => 'required|integer|exists:roles,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'actif' => 'required|integer|in:0,1',
            'equipe_id' => 'nullable|integer|exists:equipes,id',
        ], [
            'nom.required' => 'Le nom est requis',
            'prenom.required' => 'Le prénom est requis',
            'email.required' => 'L\'adresse email est requise',
            'email.email' => 'Veuillez entrer une adresse email valide',
            'password.required' => 'Le mot de passe est requis',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'telephone.required' => 'Le numéro de téléphone est requis',
            'role.required' => 'Le role est requis',
            'actif.required' => 'Le statut actif est requis',
            'equipe_id.exists' => 'L\'équipe sélectionnée n\'existe pas',
            'role_id.exists' => 'Le rôle sélectionné n\'existe pas',
        ]);

        try {

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = $file->store('photos', 'public');

                $data['photo'] = $path;
            } else {
                unset($data['photo']);
            }

            $user = $this->utilisateurRepository->mettreAJour($request->utilisateur_id, $data);

            if ($user) {

                return redirect()->route('dashboard.admin.utilisateurs')->with('success', 'Compte Modifier avec succès !');
            }

            return back()->withErrors([
                'general' => 'Une erreur est survenue lors de la Modifcation du compte. Veuillez réessayer.',
            ])->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur lors de la Modification du compte: ' . $e->getMessage());

            return back()->withErrors([
                'general' => 'Une erreur technique est survenue. Veuillez réessayer plus tard.',
            ])->withInput();
        }
    }

    // Suppression un utilisateur pour un admin
    public function AdminSupprimerUtilisateur(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        $utilisateur = $this->utilisateurRepository->trouver($request->id);
        if (!$utilisateur) {
            return redirect()->route('dashboard.admin.utilisateurs')->withErrors(['general' => 'Utilisateur non trouvé.']);
        }

        try {
            $this->utilisateurRepository->supprimer($request->id);

            return redirect()->route('dashboard.admin.utilisateurs')->with('success', 'Compte supprimé avec succès !');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression du compte: ' . $e->getMessage());
            return redirect()->route('dashboard.admin.utilisateurs')->withErrors(['general' => 'Une erreur technique est survenue. Veuillez réessayer plus tard.']);
        }
    }

    // Afficher le tableau de bord des équipes pour l'administrateur
    public function showAdminDashboardEquipes()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        $equipes = $this->equipeRepository->tous();

        foreach ($equipes as $equipe) {

            $responsableAgent = $this->agentRepository->trouver($equipe->responsable);

            if (!$responsableAgent) {
                continue;
            }


            $responsableUser = $this->utilisateurRepository->trouver($responsableAgent->utilisateur_id);

            if (!$responsableUser) {
                continue;
            }

            $equipe->responsable = $responsableUser;
        }

        return view('dashboard.admin.equipes.index', compact('equipes'));
    }

    // Afficher une équipe
    public function showEquipe($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        $equipe = $this->equipeRepository->trouver($id);
        $responsableAgent = $this->agentRepository->trouver($equipe->responsable);


        if (!$responsableAgent) {
            $equipe->responsable = null;
            return view('dashboard.admin.equipes.show', compact('equipe'));
        }

        $responsableUser = $this->utilisateurRepository->trouver($responsableAgent->utilisateur_id);


        $equipe->responsable = $responsableUser;

        if (!$equipe) {
            return redirect()->route('error.404')->with('error', "Équipe introuvable");
        }
        return view('dashboard.admin.equipes.show', compact('equipe'));
    }

    // Formulaire de modification d'une équipe
    public function editEquipe($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        $equipe = $this->equipeRepository->trouver($id);
        $agents = $this->agentRepository->tous();
        $equipes = $this->equipeRepository->tous();

        foreach ($agents as $agent) {
            $user = $this->utilisateurRepository->trouver($agent->utilisateur_id);
            if ($user) {
                $agent->utilisateur = $user;
            } else {
                $agent->utilisateur = null;
            }
        }

        $responsableAgent = $this->agentRepository->trouver($equipe->responsable);


        if (!$responsableAgent) {
            $equipe->responsable = null;
            return view('dashboard.admin.equipes.edit', compact('equipe', 'agents', 'equipes'));
        }

        $responsableUser = $this->utilisateurRepository->trouver($responsableAgent->utilisateur_id);

        $equipe->responsable = $responsableUser;

        if (!$equipe) {
            return redirect()->route('error.404')->with('error', "Équipe introuvable");
        }
        return view('dashboard.admin.equipes.edit', compact('equipe', 'agents', 'equipes'));
    }

    // Traitement de la modification
    public function updateEquipe(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'required|boolean',
            'responsable' => 'nullable|exists:agents,id',
            'email' => 'nullable|string|email|max:255',
            'telephone' => 'nullable|string',
            'specialite' => 'nullable|string',
        ]);

        $equipe = $this->equipeRepository->trouver($id);
        if (!$equipe) {
            return redirect()->route('error.500')->with('error', "Équipe introuvable");
        }


        $agentsSelectionnes = $request->agents ?? [];

        $usersActuels = $this->utilisateurRepository->tousEnEquipeId($id);
        foreach ($usersActuels as $user) {
            $doitEtreDansEquipe = false;

            foreach ($agentsSelectionnes as $agentId) {
                $agent = $this->agentRepository->trouver($agentId);
                if ($agent && $agent->utilisateur_id == $user->id) {
                    $doitEtreDansEquipe = true;
                    break;
                }
            }

            if (!$doitEtreDansEquipe) {
                $this->utilisateurRepository->mettreAJour($user->id, ['equipe_id' => null]);
            }
        }

        foreach ($agentsSelectionnes as $agentId) {
            $agent = $this->agentRepository->trouver($agentId);
            if (!$agent) {
                continue;
            }

            $user = $this->utilisateurRepository->trouver($agent->utilisateur_id);
            if ($user && $user->equipe_id != $id) {
                $this->utilisateurRepository->mettreAJour($agent->utilisateur_id, ['equipe_id' => $id]);
            }
        }

        $this->equipeRepository->mettreAJour($id, $data);

        return redirect()->route('dashboard.admin.equipes')->with('success', 'Équipe modifiée avec succès');
    }

    // Formulaire d'ajout d'une équipe
    public function createEquipe()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        $agents = $this->agentRepository->tous();
        foreach ($agents as $agent) {
            $user = $this->utilisateurRepository->trouver($agent->utilisateur_id);
            if ($user) {
                $agent->utilisateur = $user;
            } else {
                $agent->utilisateur = null;
            }
        }

        $equipes = $this->equipeRepository->tous();
        if (count($equipes) >= 20) {
            return redirect()->route('dashboard.admin.equipes')->withErrors(['general' => 'Vous avez atteint le nombre maximum d\'équipes autorisées.']);
        }

        foreach ($equipes as $equipe) {
            $responsableAgent = $this->agentRepository->trouver($equipe->responsable);
            if ($responsableAgent) {
                $responsableUser = $this->utilisateurRepository->trouver($responsableAgent->utilisateur_id);
                $equipe->responsable = 1;
            } else {
                $equipe->responsable = 0;
            }
        }



        return view('dashboard.admin.equipes.create', compact('agents', 'equipes'));
    }

    // Enregistrement d'une nouvelle équipe
    public function storeEquipe(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'required|boolean',
            'responsable' => 'nullable|exists:agents,id',
            'email' => 'nullable|string|email|max:255|unique:equipes,email',
            'telephone' => 'nullable|string',
            'specialite' => 'nullable|string',
        ]);


        $equipe = $this->equipeRepository->creer($data);

        $agentsSelectionnes = $request->agents ?? [];

        foreach ($agentsSelectionnes as $agentId) {
            $agent = $this->agentRepository->trouver($agentId);
            if (!$agent) {
                continue;
            }

            $this->utilisateurRepository->mettreAJour($agent->utilisateur_id, ['equipe_id' => $equipe->id]);
        }
        return redirect()->route('dashboard.admin.equipes')->with('success', 'Équipe créée avec succès');
    }

    // Suppression d'une équipe
    public function equipeSupprimer(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'Vous devez être connecté pour accéder au tableau de bord.']);
        }

        $equipe = $this->equipeRepository->trouver($request->id);
        if (!$equipe) {
            return redirect()->route('error.500')->with('error', "Équipe introuvable");
        }

        $usersInEquipe = $this->utilisateurRepository->tousEnEquipeId($request->id);
        foreach ($usersInEquipe as $user) {
            $this->utilisateurRepository->mettreAJour($user->id, ['equipe_id' => null]);
        }

        $this->equipeRepository->supprimer($request->id);
        return redirect()->route('dashboard.admin.equipes')->with('success', 'Équipe supprimée avec succès');
    }
}
