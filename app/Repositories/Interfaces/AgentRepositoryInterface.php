<?php

namespace App\Repositories\Interfaces;

interface AgentRepositoryInterface
{
    public function tous();
    public function trouver($id);
    public function creer(array $donnees);
    public function mettreAJour($id, array $donnees);
    public function supprimer($id);
}
