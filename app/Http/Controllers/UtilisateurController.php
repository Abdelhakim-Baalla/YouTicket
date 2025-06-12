<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TicketRepositoryInterface;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    protected $ticketRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

     public function showUtilisateurDashboard()
    {
        $countTicketActif= $this->ticketRepository->tous()->count();
        // dd($countTicketActif);
        return view('dashboard.utilisateur.index');
    }
}
