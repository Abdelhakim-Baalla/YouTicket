@extends('layouts.admin')

@section('title', 'Gestion des Utilisateurs - YouTicket')
@section('page-title', 'Gestion des Utilisateurs')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboardAdminUtilisateursIndex.css')}}">
@endsection

@section('content')
<div class="fade-in">
    <!-- Statistiques rapides -->
    <div class="stats-overview">
        <div class="stat-card-mini">
            <div class="text-2xl font-bold text-primary-light">{{ $utilisateurs->total() }}</div>
            <div class="text-sm text-muted">Total Utilisateurs</div>
        </div>
        <div class="stat-card-mini">
            <div class="text-2xl font-bold text-green-400">{{ $utilisateurs->where('actif', 1)->count() }}</div>
            <div class="text-sm text-muted">Utilisateurs Actifs</div>
        </div>
        <div class="stat-card-mini">
            <div class="text-2xl font-bold text-orange-400">{{ $roles->count() }}</div>
            <div class="text-sm text-muted">Rôles Disponibles</div>
        </div>
        <div class="stat-card-mini">
            <div class="text-2xl font-bold text-blue-400">{{ $utilisateurs->where('actif', 0)->count() }}</div>
            <div class="text-sm text-muted">Comptes Inactifs</div>
        </div>
    </div>

    <!-- Section des filtres -->
    <div class="filters-section">
        <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
            <i class="fas fa-filter"></i>
            Filtres et Recherche
        </h3>
        
        <form method="GET" action="{{ route('dashboard.admin.utilisateurs') }}" class="filters-grid">
            <div class="filter-group">
                <label class="filter-label">Recherche générale</label>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Nom, email, téléphone..." 
                       class="filter-input">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Statut</label>
                <select name="status" class="filter-select">
                    <option value="">Tous les statuts</option>
                    <option value="actif" {{ request('status') == 'actif' ? 'selected' : '' }}>Actifs</option>
                    <option value="inactif" {{ request('status') == 'inactif' ? 'selected' : '' }}>Inactifs</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Rôle</label>
                <select name="role" class="filter-select">
                    <option value="">Tous les rôles</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->nom }}" {{ request('role') == $role->nom ? 'selected' : '' }}>
                            {{ ucfirst($role->nom) }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="filter-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                    Rechercher
                </button>
            </div>
        </form>
    </div>

    <!-- Tableau principal -->
    <div class="table-container">
        <div class="table-header">
            <div class="table-title">
                <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-white"></i>
                </div>
                <span>Liste des Utilisateurs ({{ $utilisateurs->total() }})</span>
            </div>
            
            <a href="{{ route('dashboard.admin.utilisateurs.create') }}" class="btn btn-primary">
                <i class="fas fa-user-plus"></i>
                Nouvel Utilisateur
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Utilisateur</th>
                        <th>Contact</th>
                        <th>Poste & Département</th>
                        <th>Équipe</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($utilisateurs as $utilisateur)
                        <tr>
                            <td>
                                <span class="font-mono text-sm">#{{ str_pad($utilisateur->id, 3, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar" style="background: var(--gradient-primary);">
                                        @if($utilisateur->photo)
                                            <img src="{{ asset('storage/' . $utilisateur->photo) }}" alt="Photo">
                                        @else
                                            <span class="text-white">{{ substr($utilisateur->prenom ?? 'U', 0, 1) }}{{ substr($utilisateur->nom ?? 'U', 0, 1) }}</span>
                                        @endif
                                    </div>
                                    <div class="user-details">
                                        <div class="user-name">{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</div>
                                        <div class="user-role">{{ $utilisateur->role_id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-sm">
                                    <div class="text-text-primary">{{ $utilisateur->email }}</div>
                                    <div class="text-text-muted">{{ $utilisateur->telephone ?: 'Non renseigné' }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="text-sm">
                                    <div class="text-text-primary">{{ $utilisateur->poste ?: 'Non défini' }}</div>
                                    @if($utilisateur->departement)
                                        <div class="department-badge mt-1">{{ strtoupper($utilisateur->departement) }}</div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if($utilisateur->equipe_id)
                                    <span class="text-sm text-text-primary">Équipe #{{ $utilisateur->equipe_id }}</span>
                                @else
                                    <span class="text-sm text-text-muted">Aucune équipe</span>
                                @endif
                            </td>
                            <td>
                                <span class="status-badge {{ $utilisateur->actif ? 'status-active' : 'status-inactive' }}">
                                    {{ $utilisateur->actif ? 'Actif' : 'Inactif' }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <form action="{{ route('dashboard.admin.utilisateurs.edit') }}" method="GET" style="display: inline;">
                                        <input type="hidden" name="id" value="{{ $utilisateur->id }}">
                                        <button type="submit" class="btn btn-sm btn-warning" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </form>
                                    <button type="button" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="openDeleteModal({{ $utilisateur->id }}, '{{ $utilisateur->prenom }} {{ $utilisateur->nom }}', '{{ $utilisateur->email }}')"
                                            title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold mb-2">Aucun utilisateur trouvé</h3>
                                    <p class="mb-4">Commencez par créer votre premier utilisateur.</p>
                                    <a href="{{ route('dashboard.admin.utilisateurs.create') }}" class="btn btn-primary">
                                        <i class="fas fa-user-plus"></i>
                                        Créer un utilisateur
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
                Affichage de {{ $utilisateurs->firstItem() ?? 0 }} à {{ $utilisateurs->lastItem() ?? 0 }} 
                sur {{ $utilisateurs->total() }} résultats
            </div>
            <div>
                {{ $utilisateurs->appends([
                    'search' => request('search'),
                    'status' => request('status'),
                    'role' => request('role')
                ])->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal de suppression -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title">
                <i class="fas fa-exclamation-triangle"></i>
                Supprimer l'utilisateur
            </div>
            <button type="button" onclick="closeDeleteModal()" class="text-white hover:text-gray-300">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form id="deleteForm" method="POST" action="{{ route('dashboard.admin.utilisateurs.delete', $utilisateur->id) }}">
            @csrf
            @method('DELETE')
            
            <div class="modal-body">
                <p class="text-text-secondary mb-4">
                    ⚠️ <strong>Attention !</strong> Cette action est irréversible.
                </p>
                <p class="text-text-secondary mb-4">
                    Êtes-vous sûr de vouloir supprimer cet utilisateur ?
                </p>
                
                <div class="user-preview">
                    <div class="font-semibold text-text-primary">Nom: <span id="deleteUserName"></span></div>
                    <div class="font-semibold text-text-primary mt-2">Email: <span id="deleteUserEmail"></span></div>
                </div>
                
                <p class="text-sm text-text-muted">
                    Cette action supprimera définitivement l'utilisateur et toutes ses données associées.
                </p>
            </div>
            
            <div class="modal-footer">
                <button type="button" onclick="closeDeleteModal()" class="btn btn-secondary">
                    <i class="fas fa-times"></i>
                    Annuler
                </button>
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                    Confirmer la suppression
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/dashboardAdminUtilisateursIndex.js')}}"></script>
@endsection
