<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
     public function showUtilisateurDashboard()
    {
        return view('dashboard.utilisateur.index');
    }
}
