<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\Interfaces\UtilisateurRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $adminRepository;
    protected $utilisateurRepository;

    public function __construct(AdminRepositoryInterface $adminRepository, UtilisateurRepositoryInterface $utilisateurRepository)
    {
       $this->adminRepository = $adminRepository; 
       $this->utilisateurRepository = $utilisateurRepository;
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
}
