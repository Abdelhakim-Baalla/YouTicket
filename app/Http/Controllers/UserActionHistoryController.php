<?php

namespace App\Http\Controllers;

use App\Models\UserActionHistory;
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

        $histories = $query->paginate(25);

        return view('histories.index', compact('histories'));
    }

    public function show(UserActionHistory $history)
    {
        return view('histories.show', compact('history'));
    }
}