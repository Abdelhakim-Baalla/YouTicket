@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Historique des Actions</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('histories.index') }}">
                <div class="row">
                    <div class="col-md-3">
                        <label for="user_id">Utilisateur</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="">Tous les utilisateurs</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->nom }} {{ $user->prenom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="model_type">Modèle</label>
                        <select name="model_type" id="model_type" class="form-control">
                            <option value="">Tous les modèles</option>
                            @foreach($modelTypes as $type)
                                <option value="{{ $type }}" {{ request('model_type') == $type ? 'selected' : '' }}>
                                    {{ class_basename($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="action">Action</label>
                        <select name="action" id="action" class="form-control">
                            <option value="">Toutes les actions</option>
                            <option value="create" {{ request('action') == 'create' ? 'selected' : '' }}>Création</option>
                            <option value="update" {{ request('action') == 'update' ? 'selected' : '' }}>Modification</option>
                            <option value="delete" {{ request('action') == 'delete' ? 'selected' : '' }}>Suppression</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Utilisateur</th>
                        <th>Action</th>
                        <th>Objet</th>
                        <th>Détails</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($histories as $history)
                    <tr>
                        <td>{{ $history->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $history->user->nom ?? 'System' }}</td>
                        <td>{{ ucfirst($history->action) }}</td>
                        <td>{{ $history->description }}</td>
                        <td>
                            <a href="{{ route('histories.show', $history) }}" class="btn btn-sm btn-info">
                                Voir
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $histories->links() }}
        </div>
    </div>
</div>
@endsection