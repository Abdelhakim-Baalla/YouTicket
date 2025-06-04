<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Repositories\Interfaces\AdminRepositoryInterface;
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

    public function __construct(AdminRepositoryInterface $adminRepository, UtilisateurRepositoryInterface $utilisateurRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->utilisateurRepository = $utilisateurRepository;
        $this->roleRepository = $roleRepository;
    }


    public function showAdminDashboard()
    {
        $countTickets = $this->adminRepository->countTickets();
        $countAgents = $this->adminRepository->countAgents();
        $countTicketsResolu = $this->adminRepository->countTicketsResolu();

        return view('dashboard.admin.index', compact('countTickets', 'countAgents', 'countTicketsResolu'));
    }

    public function showAdminDashboardUtilisateurs()
    {
        $utilisateurs = $this->utilisateurRepository->tous();
        foreach ($utilisateurs as $utilisateur) {
            $role = $this->roleRepository->trouver($utilisateur->role_id);
            $utilisateur->role_id = $role ? $role->nom : 'Aucun rôle attribué';
            // dd($utilisateur->role_id);
        }
        
        return view('dashboard.admin.utilisateurs.index', compact('utilisateurs'));
    }

    public function showAdminDashboardUtilisateursCreateModal()
    {
        return view('dashboard.admin.utilisateurs.create');
    }

    public function showAdminDashboardUtilisateursEditModal()
    {
        return view('dashboard.admin.utilisateurs.edit');
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
}
