<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function showAgentDashboard()
    {
        return view('dashboard.agent.index');
    }
}
