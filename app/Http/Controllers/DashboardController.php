<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        if(Auth::check()) {
            return view('dashboard.index');
        } else {
            return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
        }
    }
}
