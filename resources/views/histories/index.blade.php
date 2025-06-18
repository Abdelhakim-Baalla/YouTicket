@extends('layouts.admin')

@section('title', 'Historique des Actions - YouTicket')
@section('page-title', 'Historique des Actions')

@section('styles')
<link rel="stylesheet" href="{{asset('css/historiesIndex.css')}}">
@endsection

@section('content')
<div class="fade-in">
    <!-- Statistiques rapides -->
    <div class="stats-overview">
        <div class="stat-card-mini">
            <div class="text-2xl font-bold text-primary-light">{{ $histories->total() }}</div>
            <div class="text-sm text-muted">Total Actions</div>
        </div>
        <div class="stat-card-mini">
            <div class="text-2xl font-bold text-green-400">{{ $histories->where('created_at', '>=', now()->subDay())->count() }}</div>
            <div class="text-sm text-muted">Dernières 24h</div>
        </div>
        <div class="stat-card-mini">
            <div class="text-2xl font-bold text-orange-400">{{ $users->count() }}</div>
            <div class="text-sm text-muted">Utilisateurs Actifs</div>
        </div>
        <div class="stat-card-mini">
            <div class="text-2xl font-bold text-blue-400">{{ $modelTypes->count() }}</div>
            <div class="text-sm text-muted">Types d'Objets</div>
        </div>
    </div>

    <!-- Filtres rapides -->
    <div class="quick-filters">
        <a href="{{ route('histories.index') }}" class="quick-filter {{ !request()->hasAny(['user_id', 'model_type', 'action', 'date_from']) ? 'active' : '' }}">
            <i class="fas fa-list"></i> Toutes les actions
        </a>
        <a href="{{ route('histories.index', ['action' => 'create']) }}" class="quick-filter {{ request('action') == 'create' ? 'active' : '' }}">
            <i class="fas fa-plus"></i> Créations
        </a>
        <a href="{{ route('histories.index', ['action' => 'update']) }}" class="quick-filter {{ request('action') == 'update' ? 'active' : '' }}">
            <i class="fas fa-edit"></i> Modifications
        </a>
        <a href="{{ route('histories.index', ['action' => 'delete']) }}" class="quick-filter {{ request('action') == 'delete' ? 'active' : '' }}">
            <i class="fas fa-trash"></i> Suppressions
        </a>
        <a href="{{ route('histories.index', ['date_from' => now()->subDay()->format('Y-m-d')]) }}" class="quick-filter">
            <i class="fas fa-clock"></i> Dernières 24h
        </a>
    </div>

    

    <!-- Tableau principal -->
    <div class="table-container">
        <div class="table-header">
            <div class="table-title">
                <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-history text-white"></i>
                </div>
                <span>Historique des Actions ({{ $histories->total() }})</span>
            </div>
            
            <div class="flex gap-2">
                <a href="" class="btn btn-secondary">
                    <i class="fas fa-download"></i>
                    Exporter
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Date & Heure</th>
                        <th>Utilisateur</th>
                        <th>Action</th>
                        <th>Objet</th>
                        <th>Description</th>
                        <th>Détails</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($histories as $history)
                        <tr>
                            <td>
                                <div class="time-info timeline-indicator {{ $history->created_at->diffInHours() < 1 ? 'recent' : '' }}">
                                    <div class="time-date">{{ $history->created_at->format('d/m/Y') }}</div>
                                    <div class="time-date">{{ $history->created_at->format('H:i:s') }}</div>
                                    <div class="time-relative">{{ $history->created_at->diffForHumans() }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        @if(!empty($history->user->photo))
                                            <img src="{{ asset('storage/' . $history->user->photo) }}" 
                                                 alt="{{ $history->user->prenom }} {{ $history->user->nom }}" 
                                                 class="rounded-full w-8 h-8 object-cover">
                                        @else
                                            <i class="fas fa-robot"></i>
                                        @endif
                                    </div>
                                    <div class="user-details">
                                        <div class="user-name">
                                            {{ $history->user ? $history->user->prenom . ' ' . $history->user->nom : 'Système' }}
                                        </div>
                                        <div class="user-role">
                                            {{ $history->user->role->nom ?? 'Automatique' }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="action-badge action-{{ $history->action }}">
                                    @switch($history->action)
                                        @case('create')
                                            <i class="fas fa-plus"></i>
                                            Création
                                            @break
                                        @case('update')
                                            <i class="fas fa-edit"></i>
                                            Modification
                                            @break
                                        @case('delete')
                                            <i class="fas fa-trash"></i>
                                            Suppression
                                            @break
                                        @case('view')
                                            <i class="fas fa-eye"></i>
                                            Consultation
                                            @break
                                        @default
                                            <i class="fas fa-cog"></i>
                                            {{ ucfirst($history->action) }}
                                    @endswitch
                                </span>
                            </td>
                            <td>
                                @if($history->model_type)
                                    <div class="model-badge">
                                        {{ class_basename($history->model_type) }}
                                    </div>
                                    @if($history->model_id)
                                        <div class="text-xs text-text-muted mt-1">ID: {{ $history->model_id }}</div>
                                    @endif
                                @else
                                    <span class="text-text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <div class="description-text">{{ $history->description }}</div>
                                @if($history->ip_address)
                                    <div class="description-details">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $history->ip_address }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('histories.show', $history) }}" 
                                   class="btn btn-sm btn-info" 
                                   title="Voir les détails">
                                    <i class="fas fa-eye"></i>
                                    Détails
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold mb-2">Aucune action trouvée</h3>
                                    <p class="mb-4">Aucun historique ne correspond à vos critères de recherche.</p>
                                    <a href="{{ route('histories.index') }}" class="btn btn-primary">
                                        <i class="fas fa-refresh"></i>
                                        Réinitialiser les filtres
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            <div class="text-sm text-text-muted">
                Affichage de {{ $histories->firstItem() ?? 0 }} à {{ $histories->lastItem() ?? 0 }} 
                sur {{ $histories->total() }} actions
            </div>
            <div>
                {{ $histories->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/historiesIndex.js')}}"></script>
@endsection
