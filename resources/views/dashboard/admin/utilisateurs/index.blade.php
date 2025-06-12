@extends('layouts.admin')

@section('title', 'Gestion des Utilisateurs - YouTicket')
@section('page-title', 'Gestion des Utilisateurs')

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
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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
    
    .btn-warning {
        background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
        color: white;
    }
    
    .btn-danger {
        background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
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
    }
    
    .modern-table tbody tr {
        transition: all 0.2s ease;
    }
    
    .modern-table tbody tr:hover {
        background: rgba(99, 102, 241, 0.05);
    }
    
    .user-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.875rem;
        overflow: hidden;
    }
    
    .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
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
        text-transform: capitalize;
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
    
    .department-badge {
        background: rgba(99, 102, 241, 0.2);
        color: var(--primary-light);
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: uppercase;
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
    
    .modal {
        position: fixed;
        inset: 0;
        z-index: 1000;
        display: none;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(4px);
    }
    
    .modal.show {
        display: flex;
    }
    
    .modal-content {
        background: rgba(30, 41, 59, 0.95);
        border: 1px solid var(--border);
        border-radius: 16px;
        max-width: 500px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
    }
    
    .modal-header {
        background: var(--gradient-warning);
        padding: 1.5rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .modal-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: white;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .modal-body {
        padding: 1.5rem;
    }
    
    .modal-footer {
        padding: 1.5rem;
        border-top: 1px solid var(--border);
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
    }
    
    .user-preview {
        background: rgba(15, 15, 35, 0.5);
        border-radius: 8px;
        padding: 1rem;
        margin: 1rem 0;
    }
    
    .pagination-wrapper {
        background: rgba(15, 15, 35, 0.9);
        padding: 1rem 1.5rem;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
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
        
        .action-buttons {
            flex-direction: column;
            gap: 0.25rem;
        }
        
        .user-info {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
    }
</style>
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
<script>
    // Gestion du modal de suppression
    function openDeleteModal(userId, userName, userEmail) {
        document.getElementById('deleteUserName').textContent = userName;
        document.getElementById('deleteUserEmail').textContent = userEmail;
        // document.getElementById('deleteForm').action = `/admin/utilisateurs/${userId}`;
        document.getElementById('deleteModal').classList.add('show');
    }
    
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('show');
    }
    
    // Fermer le modal en cliquant à l'extérieur
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });
    
    // Animation d'entrée pour les lignes du tableau
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.modern-table tbody tr');
        rows.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateY(10px)';
            setTimeout(() => {
                row.style.transition = 'all 0.3s ease';
                row.style.opacity = '1';
                row.style.transform = 'translateY(0)';
            }, index * 50);
        });
    });
</script>
@endsection
