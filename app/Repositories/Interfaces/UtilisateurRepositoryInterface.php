<?php

namespace App\Repositories\Interfaces;

interface UtilisateurRepositoryInterface
{
    public function tous();
    public function trouver($id);
    public function creer(array $donnees);
    public function mettreAJour($id, array $donnees);
    public function supprimer($id);
    public function rechercher(string $recherche);
    public function rechercherParStatus(string $status);
}
