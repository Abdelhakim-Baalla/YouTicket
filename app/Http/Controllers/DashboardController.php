<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function showDashboard()
    {
        if (Auth::check()) {
            $role = $this->roleRepository->trouver(Auth::user()->role_id);
            if ($role->nom === 'admin') {
                return redirect()->route('dashboard.admin');
            } elseif ($role->nom === 'utilisateur') {
                return redirect()->route('dashboard.utilisateur');
            } elseif ($role->nom === 'agent') {
                return redirect()->route('dashboard.agent');
            }
        } else {
            return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
        }
    }
}
