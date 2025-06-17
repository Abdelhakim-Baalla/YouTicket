@extends('layouts.admin')

@section('title', 'Historique des Actions - YouTicket')
@section('page-title', 'Historique des Actions')

@section('styles')
<style>
    .stats-overview {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }
    
    .stat-card-mini {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1rem;
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .stat-card-mini:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }
    
    .filters-section {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .filters-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        align-items: end;
    }
    
    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .filter-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-primary);
    }
    
    .filter-input, .filter-select {
        padding: 0.75rem 1rem;
        background: rgba(15, 15, 35, 0.5);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--text-primary);
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }
    
    .filter-input:focus, .filter-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .filter-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        appearance: none;
    }
    
    .table-container {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
    }
    
    .table-header {
        background: rgba(15, 15, 35, 0.9);
        padding: 1.5rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .table-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.25rem;
        font-weight: 600;
    }
    
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-size: 0.875rem;
    }
    
    .btn-primary {
        background: var(--gradient-primary);
        color: white;
    }
    
    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: var(--shadow);
    }
    
    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
    }
    
    .btn-info {
        background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
        color: white;
    }
    
    .btn-secondary {
        background: rgba(71, 85, 105, 0.8);
        color: var(--text-primary);
        border: 1px solid var(--border);
    }
    
    .modern-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .modern-table th {
        background: rgba(15, 15, 35, 0.5);
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: var(--text-primary);
        border-bottom: 1px solid var(--border);
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    .modern-table td {
        padding: 1rem;
        border-bottom: 1px solid rgba(51, 65, 85, 0.3);
        color: var(--text-secondary);
        vertical-align: top;
    }
    
    .modern-table tbody tr {
        transition: all 0.2s ease;
    }
    
    .modern-table tbody tr:hover {
        background: rgba(99, 102, 241, 0.05);
    }
    
    .action-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .action-create {
        background: rgba(5, 150, 105, 0.2);
        color: #10b981;
        border: 1px solid rgba(5, 150, 105, 0.3);
    }
    
    .action-update {
        background: rgba(245, 158, 11, 0.2);
        color: #f59e0b;
        border: 1px solid rgba(245, 158, 11, 0.3);
    }
    
    .action-delete {
        background: rgba(220, 38, 38, 0.2);
        color: #ef4444;
        border: 1px solid rgba(220, 38, 38, 0.3);
    }
    
    .action-view {
        background: rgba(59, 130, 246, 0.2);
        color: #3b82f6;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }
    
    .user-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .user-avatar {
        width: 32px;
        height: 32px;
        border-radius: 6px;
        background: var(--gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 0.75rem;
    }
    
    .user-details {
        flex: 1;
    }
    
    .user-name {
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.875rem;
    }
    
    .user-role {
        color: var(--text-muted);
        font-size: 0.75rem;
    }
    
    .model-badge {
        background: rgba(99, 102, 241, 0.2);
        color: var(--primary-light);
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .time-info {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }
    
    .time-date {
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.875rem;
    }
    
    .time-relative {
        color: var(--text-muted);
        font-size: 0.75rem;
    }
    
    .description-text {
        color: var(--text-primary);
        font-size: 0.875rem;
        line-height: 1.4;
    }
    
    .description-details {
        color: var(--text-muted);
        font-size: 0.75rem;
        margin-top: 0.25rem;
    }
    
    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: var(--text-muted);
    }
    
    .empty-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    .pagination-wrapper {
        background: rgba(15, 15, 35, 0.9);
        padding: 1rem 1.5rem;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .timeline-indicator {
        position: relative;
        padding-left: 1.5rem;
    }
    
    .timeline-indicator::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0.5rem;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--primary);
    }
    
    .timeline-indicator.recent::before {
        background: #10b981;
        box-shadow: 0 0 8px rgba(16, 185, 129, 0.5);
    }
    
    .quick-filters {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        margin-bottom: 1rem;
    }
    
    .quick-filter {
        padding: 0.5rem 1rem;
        background: rgba(71, 85, 105, 0.3);
        border: 1px solid var(--border);
        border-radius: 20px;
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 0.75rem;
        transition: all 0.3s ease;
    }
    
    .quick-filter:hover, .quick-filter.active {
        background: var(--gradient-primary);
        color: white;
        transform: translateY(-1px);
    }
    
    @media (max-width: 768px) {
        .filters-grid {
            grid-template-columns: 1fr;
        }
        
        .table-header {
            flex-direction: column;
            align-items: stretch;
        }
        
        .modern-table {
            font-size: 0.8rem;
        }
        
        .modern-table th,
        .modern-table td {
            padding: 0.75rem 0.5rem;
        }
        
        .user-info {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .quick-filters {
            justify-content: center;
        }
    }
</style>
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
