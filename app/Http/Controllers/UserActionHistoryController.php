<?php

namespace App\Http\Controllers;

use App\Models\UserActionHistory;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UserActionHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = UserActionHistory::with('user')
            ->orderBy('created_at', 'desc');

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('model_type')) {
            $query->where('model_type', $request->model_type);
        }

        if ($request->has('action')) {
            $query->where('action', $request->action);
        }

        // Récupérer tous les utilisateurs pour le filtre
        $users = Utilisateur::orderBy('prenom')->get();
        // Récupérer tous les types de modèles distincts
        $modelTypes = UserActionHistory::select('model_type')->distinct()->pluck('model_type');

        $histories = $query->paginate(25);

        return view('histories.index', compact('histories', 'users', 'modelTypes'));
    }

    public function show(UserActionHistory $history)
    {
        return view('histories.show', compact('history'));
    }
}
