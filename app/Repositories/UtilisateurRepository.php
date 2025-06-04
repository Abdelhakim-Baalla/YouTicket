<?php

namespace App\Repositories;

use App\Models\Utilisateur;
use App\Repositories\Interfaces\UtilisateurRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UtilisateurRepository implements UtilisateurRepositoryInterface
{
    public function tous()
    {
        return Utilisateur::orderBy('id', 'desc')->paginate(7);
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
        
        if ($utilisateur) 
        {
            return $utilisateur->update($donnees);
        }
        return null;
    }
    
    public function supprimer($id)
    {
        $utilisateur = $this->trouver($id);
        
        if ($utilisateur) 
        {
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
        
        if (!$utilisateur || !Hash::check($password, $utilisateur->password) ){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'errorLogin' => ['L\'émail ou le mot de passe sont incorrect.'],
            ]);
        }
        
        
        return $utilisateur;
    }

    public function rechercher(string $recherche)
    {
        return Utilisateur::where('nom', 'like', '%' . $recherche . '%')
            ->orWhere('prenom', 'like', '%' . $recherche . '%')
            ->orWhere('email', 'like', '%' . $recherche . '%')
            ->orderBy('id', 'desc')
            ->paginate(7);
    }
    
}