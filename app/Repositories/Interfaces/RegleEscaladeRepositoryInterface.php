<?php

namespace App\Repositories\Contracts;

interface RegleEscaladeRepositoryInterface
{
    public function tous();
    public function trouver($id);
    public function creer(array $donnees);
    public function mettreAJour($id, array $donnees);
    public function supprimer($id);
}
