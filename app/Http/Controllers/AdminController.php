<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
       $this->adminRepository = $adminRepository; 
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
        $totalUsers = 0;
        $userTrend  = 0;
        $totalAgents = 0;
        $agentTrend = 0;
        return view('dashboard.admin.utilisateurs', compact('totalUsers', 'userTrend', 'totalAgents', 'agentTrend'));
    }
}
