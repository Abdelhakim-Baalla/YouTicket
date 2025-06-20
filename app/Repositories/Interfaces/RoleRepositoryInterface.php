<?php

namespace App\Repositories\Interfaces;

interface RoleRepositoryInterface
{
    public function tous();
    public function trouver($id);
    public function trouverAvecNom($nom);
    public function creer(array $donnees);
    public function mettreAJour($id, array $donnees);
    public function supprimer($id);
    public function trouverParNom($nom);
}
