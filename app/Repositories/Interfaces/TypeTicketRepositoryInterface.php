<?php

namespace App\Repositories\Interfaces;

interface TypeTicketRepositoryInterface
{
    public function tous();
    public function trouver($id);
    public function creer(array $donnees);
    public function mettreAJour($id, array $donnees);
    public function supprimer($id);
}
