<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\Interfaces\EquipeRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\UtilisateurRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{

    protected $adminRepository;
    protected $utilisateurRepository;
    protected $roleRepository;
    protected $equipeRepository;

    public function __construct(EquipeRepositoryInterface $equipeRepository, AdminRepositoryInterface $adminRepository, UtilisateurRepositoryInterface $utilisateurRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->utilisateurRepository = $utilisateurRepository;
        $this->roleRepository = $roleRepository;
        $this->equipeRepository = $equipeRepository;
    }


    public function showAdminDashboard()
    {
        $countTickets = $this->adminRepository->countTickets();
        $countAgents = $this->adminRepository->countAgents();
        $countTicketsResolu = $this->adminRepository->countTicketsResolu();

        return view('dashboard.admin.index', compact('countTickets', 'countAgents', 'countTicketsResolu'));
    }

    public function showAdminDashboardUtilisateurs(Request $request)
    {
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

    public function showAdminDashboardUtilisateursCreateModal()
    {
        return view('dashboard.admin.utilisateurs.create');
    }

    public function showAdminDashboardUtilisateursEditModal(Request $request)
    {
        $utilisateur = $this->utilisateurRepository->trouver($request->id);
        if (!$utilisateur) {
            return redirect()->route('dashboard.admin.utilisateurs')->withErrors(['general' => 'Utilisateur non trouvé.']);
        }
        $role = $this->roleRepository->trouver($utilisateur->role_id);

        if ($role) {
            $utilisateur->role_id = $role->nom;
        } else {
            $utilisateur->role_id = 'Aucun rôle attribué';
        }
        $equipe = $this->equipeRepository->trouver($utilisateur->equipe_id);
        if ($equipe) {
            $utilisateur->equipe_id = $equipe->nom;
        } else {
            $utilisateur->equipe_id = 'Aucune équipe attribuée';
        }

        $equipes = $this->equipeRepository->tous();
        $roles = $this->roleRepository->tous();
        // dd($utilisateur);

        return view('dashboard.admin.utilisateurs.edit', compact('utilisateur', 'equipes', 'roles'));
    }

    public function AdminCreeUtilisateur(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs',
            'telephone' => 'required|string|max:15',
            'poste' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'departement' => 'nullable|string|max:255',
            'role' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'actif' => 'required|integer|in:0,1',
        ], [
            // Messages d'erreur personnalisés
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
        ]);



        // dd($request->role);
        // dd($data);

        try {
            $data['password'] = Hash::make($data['password']);

            $role = $this->roleRepository->trouverAvecNom($request->role);
            $data['role_id'] = $role->id;




            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = $file->store('photos', 'public');
                // dd($path);
                $data['photo'] = $path;
            } else {
                unset($data['photo']); // Ne pas inclure la clé si pas d'upload
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

    public function AdminModifierUtilisateur(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' =>  'required|string|email|max:255',
            'telephone' => 'required|string|max:15',
            'poste' => 'required|string|max:255',
            'departement' => 'nullable|string|max:255',
            'role_id' => 'required|integer|exists:roles,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'actif' => 'required|integer|in:0,1',
            'equipe_id' => 'nullable|integer|exists:equipes,id',
        ], [
            // Messages d'erreur personnalisés
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



        // dd($request->role);
        // dd($data);


        try {

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = $file->store('photos', 'public');
                // dd($path);
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

    public function showAdminDashboardEquipes()
    {
        $equipes = $this->equipeRepository->tous();
        return view('dashboard.admin.equipes.index', compact('equipes'));
    }

    // Afficher une équipe
    public function showEquipe($id)
    {
        $equipe = $this->equipeRepository->trouver($id);
        if (!$equipe) {
            return redirect()->route('error.404')->with('error', "Équipe introuvable");
        }
        return view('dashboard.admin.equipes.show', compact('equipe'));
    }

    // Formulaire de modification d'une équipe
    public function editEquipe($id)
    {
        $equipe = $this->equipeRepository->trouver($id);
        if (!$equipe) {
            return redirect()->route('error.404')->with('error', "Équipe introuvable");
        }
        return view('dashboard.admin.equipes.edit', compact('equipe'));
    }

    // Traitement de la modification
    public function updateEquipe(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'required|boolean',
        ]);
        $equipe = $this->equipeRepository->trouver($id);
        if (!$equipe) {
            return redirect()->route('error.500')->with('error', "Équipe introuvable");
        }
        $this->equipeRepository->mettreAJour($id, [
            'nom' => $request->nom,
            'description' => $request->description,
            'active' => $request->active,
        ]);
        return redirect()->route('dashboard.admin.equipes')->with('success', 'Équipe modifiée avec succès');
    }
}
