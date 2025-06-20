@extends('layouts.admin')

@section('title', 'Gestion des Équipes - YouTicket')
@section('page-title', 'Gestion des Équipes')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboardAdminEquipesIndex.css')}}">
@endsection

@section('content')
<div class="fade-in">
    <!-- Statistiques rapides -->
    <div class="stats-overview">
        <div class="stat-card-mini">
            <div class="text-2xl font-bold text-primary-light">{{ $equipes->count() }}</div>
            <div class="text-sm text-muted">Total Équipes</div>
        </div>
        <div class="stat-card-mini">
            <div class="text-2xl font-bold text-green-400">{{ $equipes->where('active', 1)->count() }}</div>
            <div class="text-sm text-muted">Équipes Actives</div>
        </div>
        <div class="stat-card-mini">
            <div class="text-2xl font-bold text-orange-400">{{ $equipes->sum(function($equipe) { return $equipe->utilisateurs->count(); }) }}</div>
            <div class="text-sm text-muted">Total Membres</div>
        </div>
        <div class="stat-card-mini">
            <div class="text-2xl font-bold text-blue-400">{{ number_format($equipes->avg(function($equipe) { return $equipe->utilisateurs->count(); }), 1) }}</div>
            <div class="text-sm text-muted">Moy. par Équipe</div>
        </div>
    </div>

    <!-- Tableau principal -->
    <div class="table-container">
        <div class="table-header">
            <div class="table-title">
                <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-people-group text-white"></i>
                </div>
                <span>Gestion des Équipes</span>
            </div>
            
            <div class="table-actions">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Rechercher une équipe..." id="searchInput">
                </div>
                
                <a href="{{ route('dashboard.admin.equipes.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Nouvelle Équipe
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="modern-table" id="equipesTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom de l'Équipe</th>
                        <th>Description</th>
                        <th>Responsable</th>
                        <th>Spécialité</th>
                        <th>Statut</th>
                        <th>Membres</th>
                        <th>Créée le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($equipes as $equipe)
                        <tr>
                            <td>
                                <span class="font-mono text-sm">#{{ str_pad($equipe->id, 3, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td>
                                <div class="font-semibold text-text-primary">{{ $equipe->nom }}</div>
                            </td>
                            <td>
                                <div class="max-w-xs truncate" title="{{ $equipe->description }}">
                                    {{ $equipe->description ?: 'Aucune description' }}
                                </div>
                            </td>
                            <td class="flex items-center space-x-2 gap-2">
                                @if($equipe->responsable)
                                <div class="inline-block mr-2">
                                    <img src="{{asset('storage/' . ($equipe->responsable->photo ?? 'default.png'))}}" 
                                         alt="{{ $equipe->responsable->prenom ?? 'Avatar' }}" 
                                         class="w-8 h-8 rounded-full inline-block mr-2">
                                </div>
                                <div class="max-w-xs truncate  " title="{{ $equipe->responsable }}">
                                    {{ $equipe->responsable->prenom ?? ''}}
                                    {{$equipe->responsable->nom  ?? '' }}
                                </div>
                                @else
                                    <span class="text-text-muted">Aucun responsable</span>
                                @endif
                            </td>
                            <td>
                                <div class="max-w-xs truncate" title="{{ $equipe->specialite }}">
                                    {{ Str::limit($equipe->specialite, 15) }}
                                </div>
                            </td>
                            <td>
                                <span class="status-badge {{ $equipe->active ? 'status-active' : 'status-inactive' }}">
                                    {{ $equipe->active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <div class="team-members">
                                    <i class="fas fa-users text-text-muted"></i>
                                    <span class="members-count">{{ $equipe->utilisateurs->count() }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="text-sm">{{ $equipe->created_at->format('d/m/Y') }}</div>
                                <div class="text-xs text-text-muted">{{ $equipe->created_at->format('H:i') }}</div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('dashboard.admin.equipes.show', $equipe->id) }}" 
                                       class="btn btn-sm btn-info" title="Voir les détails">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('dashboard.admin.equipes.edit', $equipe->id) }}" 
                                       class="btn btn-sm btn-warning" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard.admin.equipes.delete', $equipe->id) }}" 
                                          method="POST" style="display: inline-block;" 
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette équipe ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="fas fa-people-group"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold mb-2">Aucune équipe trouvée</h3>
                                    <p class="mb-4">Commencez par créer votre première équipe.</p>
                                    <a href="{{ route('dashboard.admin.equipes.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i>
                                        Créer une équipe
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/dashboardAdminEquipesIndex.js')}}"></script>
@endsection
