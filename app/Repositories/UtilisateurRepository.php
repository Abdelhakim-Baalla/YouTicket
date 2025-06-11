<?php

namespace App\Repositories;

use App\Models\Utilisateur;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\UtilisateurRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UtilisateurRepository implements UtilisateurRepositoryInterface
{
    protected $roleRepository;
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    public function tous()
    {
        return Utilisateur::orderBy('id', 'desc')->paginate(7);
    }
    public function tousActifs()
    {
        return Utilisateur::where('actif', 1)->get();
    }

    public function tousEnEquipeId($equipeId)
    {
        return Utilisateur::where('equipe_id', $equipeId)->get();
    }

    public function trouver($id)
    {
        return Utilisateur::find($id);
    }

    public function creer(array $donnees)
    {
        return Utilisateur::create($donnees);
    }

    public function mettreAJour($id, array $donnees)
    {
        $utilisateur = $this->trouver($id);

        if ($utilisateur) {
            return $utilisateur->update($donnees);
        }
        return null;
    }

    public function supprimer($id)
    {
        $utilisateur = $this->trouver($id);

        if ($utilisateur) {
            return $utilisateur->delete();
        }
        return false;
    }

    public function findByEmail(string $email)
    {
        return Utilisateur::where('email', $email)->first();
    }

    public function connexion(string $email, string $password)
    {
        $utilisateur = $this->findByEmail($email);

        if (!$utilisateur || !Hash::check($password, $utilisateur->password)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'errorLogin' => ['L\'émail ou le mot de passe sont incorrect.'],
            ]);
        }


        return $utilisateur;
    }

    public function rechercher(string $recherche)
    {
        $termes = preg_split('/\s+/', trim($recherche));
        return Utilisateur::where(function ($query) use ($termes) {
            foreach ($termes as $terme) {
                $query->where(function ($q) use ($terme) {
                    $q->where('nom', 'like', '%' . $terme . '%')
                        ->orWhere('prenom', 'like', '%' . $terme . '%')
                        ->orWhere('email', 'like', '%' . $terme . '%');
                });
            }
        })
            ->orderBy('id', 'desc')
            ->paginate(7);
    }

    public function rechercherParStatus(string $status)
    {
        // dd($status);
        if ($status == 'actif') {
            $status = 1;
        } else if ($status == 'inactif') {
            $status = 0;
        } else {
            return Utilisateur::orderBy('id', 'desc')->paginate(7);
        }

        return Utilisateur::where('actif', $status)
            ->orderBy('id', 'desc')
            ->paginate(7);
    }

    public function rechercherParRole(string $role)
    {
        // dd($role);
        $role = $this->roleRepository->trouverAvecNom($role);
        $role = $role ? $role->id : null;
        // dd($role->id);
        if (!$role) {
            return Utilisateur::orderBy('id', 'desc')->paginate(7);
        }

        return Utilisateur::where('role_id', $role)
            ->orderBy('id', 'desc')
            ->paginate(7);
    }
}
