<?php

namespace App\Repositories\Interfaces;

interface AdminRepositoryInterface
{
    public function tous();
    public function trouver($id);
    public function creer(array $donnees);
    public function mettreAJour($id, array $donnees);
    public function supprimer($id);
    public function countTickets();
    public function countAgents();
    public function countTicketsResolu();
}
