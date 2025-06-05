@extends('layouts.admin')

@section('title', 'Gestion des Equipes - YouTicket')

@section('page-title', 'Gestion des Equipes')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <i class="fas fa-people-group"></i> Liste des équipes
        </div>
        <a href="#" class="btn btn-primary">+ Nouvelle équipe</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table min-w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Statut</th>
                        <th>Membres</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($equipes as $equipe)
                        <tr>
                            <td>{{ $equipe->id }}</td>
                            <td>{{ $equipe->nom }}</td>
                            <td>{{ $equipe->description }}</td>
                            <td>
                                @if($equipe->active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $equipe->utilisateurs->count() }}</td>
                            <td>
                                <a href="{{ route('dashboard.admin.equipes.show', $equipe->id) }}" class="btn btn-sm btn-info">Voir</a>
                                <a href="{{ route('dashboard.admin.equipes.edit', $equipe->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                <form action="#" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette équipe ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Aucune équipe trouvée.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection