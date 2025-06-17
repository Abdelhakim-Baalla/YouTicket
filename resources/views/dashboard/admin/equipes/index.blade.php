@extends('layouts.admin')

@section('title', 'Gestion des Équipes - YouTicket')
@section('page-title', 'Gestion des Équipes')

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
    
    .table-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .search-box {
        position: relative;
        min-width: 250px;
    }
    
    .search-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 2.5rem;
        background: rgba(30, 41, 59, 0.5);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--text-primary);
        font-size: 0.875rem;
    }
    
    .search-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .search-icon {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
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
    
    .btn-warning {
        background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
        color: white;
    }
    
    .btn-danger {
        background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
        color: white;
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
    }
    
    .modern-table tbody tr {
        transition: all 0.2s ease;
    }
    
    .modern-table tbody tr:hover {
        background: rgba(99, 102, 241, 0.05);
    }
    
    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    .status-active {
        background: rgba(5, 150, 105, 0.2);
        color: #10b981;
        border: 1px solid rgba(5, 150, 105, 0.3);
    }
    
    .status-inactive {
        background: rgba(220, 38, 38, 0.2);
        color: #ef4444;
        border: 1px solid rgba(220, 38, 38, 0.3);
    }
    
    .team-members {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .members-count {
        background: rgba(99, 102, 241, 0.2);
        color: var(--primary-light);
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        align-items: center;
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
    
    @media (max-width: 768px) {
        .table-header {
            flex-direction: column;
            align-items: stretch;
        }
        
        .table-actions {
            flex-direction: column;
        }
        
        .search-box {
            min-width: auto;
        }
        
        .modern-table {
            font-size: 0.8rem;
        }
        
        .modern-table th,
        .modern-table td {
            padding: 0.75rem 0.5rem;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 0.25rem;
        }
    }
</style>
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
