<?php

namespace App\Http\Controllers;

use App\Models\UserActionHistory;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UserActionHistoryController extends Controller
{
    // Affiche la liste des actions des utilisateurs avec des filtres
    public function index(Request $request)
    {
        $query = UserActionHistory::with('user')->orderBy('created_at', 'desc');

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('model_type')) {
            $query->where('model_type', $request->model_type);
        }

        if ($request->has('action')) {
            $query->where('action', $request->action);
        }

        $users = Utilisateur::orderBy('prenom')->get();
        $modelTypes = UserActionHistory::select('model_type')->distinct()->pluck('model_type');
        $histories = $query->paginate(25);

        return view('histories.index', compact('histories', 'users', 'modelTypes'));
    }

    // Affiche les détails d'une action spécifique
    public function show(UserActionHistory $history)
    {
        return view('histories.show', compact('history'));
    }
}
