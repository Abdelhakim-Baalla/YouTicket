@extends('layouts.admin')

@section('title', 'Détails de l\'Équipe - YouTicket')
@section('page-title', 'Détails de l\'Équipe')

@section('styles')
<style>
    .detail-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 1.5rem;
    }
    
    .main-content {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .sidebar-content {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .detail-card {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
    }
    
    .card-header {
        background: rgba(15, 15, 35, 0.9);
        padding: 1.5rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .card-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.25rem;
        font-weight: 600;
    }
    
    .card-icon {
        width: 40px;
        height: 40px;
        background: var(--gradient-primary);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .team-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .team-avatar {
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
    }
    
    .team-info h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .team-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        display: flex;
        align-items: center;
        gap: 0.5rem;
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
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-muted);
        font-size: 0.875rem;
    }
    
    .description-section {
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
    }
    
    .description-text {
        color: var(--text-secondary);
        line-height: 1.6;
        font-size: 0.95rem;
    }
    
    .members-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .member-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem;
        background: rgba(15, 15, 35, 0.3);
        border-radius: 8px;
        transition: all 0.2s ease;
    }
    
    .member-item:hover {
        background: rgba(15, 15, 35, 0.5);
    }
    
    .member-avatar {
        width: 40px;
        height: 40px;
        background: var(--gradient-accent);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 0.875rem;
    }
    
    .member-info {
        flex: 1;
    }
    
    .member-name {
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.875rem;
    }
    
    .member-email {
        color: var(--text-muted);
        font-size: 0.75rem;
    }
    
    .member-role {
        background: rgba(99, 102, 241, 0.2);
        color: var(--primary-light);
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 0.7rem;
        font-weight: 500;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
    
    .stat-item {
        text-align: center;
        padding: 1rem;
        background: rgba(15, 15, 35, 0.3);
        border-radius: 8px;
    }
    
    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-light);
        margin-bottom: 0.25rem;
    }
    
    .stat-label {
        color: var(--text-muted);
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .btn {
        padding: 0.75rem 1rem;
        border-radius: 8px;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
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
    
    .btn-warning {
        background: var(--gradient-accent);
        color: white;
    }
    
    .btn-secondary {
        background: rgba(71, 85, 105, 0.8);
        color: var(--text-primary);
        border: 1px solid var(--border);
    }
    
    .btn-danger {
        background: var(--gradient-warning);
        color: white;
    }
    
    .btn:hover {
        transform: translateY(-1px);
        box-shadow: var(--shadow);
    }
    
    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
        font-size: 0.875rem;
        color: var(--text-muted);
    }
    
    .breadcrumb a {
        color: var(--primary-light);
        text-decoration: none;
    }
    
    .breadcrumb a:hover {
        text-decoration: underline;
    }
    
    .empty-state {
        text-align: center;
        padding: 2rem;
        color: var(--text-muted);
    }
    
    .empty-icon {
        font-size: 2rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    .activity-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem;
        border-left: 3px solid var(--primary);
        background: rgba(99, 102, 241, 0.05);
        border-radius: 0 8px 8px 0;
        margin-bottom: 0.5rem;
    }
    
    .activity-icon {
        width: 32px;
        height: 32px;
        background: var(--gradient-primary);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.875rem;
    }
    
    .activity-content {
        flex: 1;
    }
    
    .activity-text {
        color: var(--text-primary);
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
    }
    
    .activity-time {
        color: var(--text-muted);
        font-size: 0.75rem;
    }
    
    @media (max-width: 1024px) {
        .detail-grid {
            grid-template-columns: 1fr;
        }
        
        .sidebar-content {
            order: -1;
        }
    }
    
    @media (max-width: 768px) {
        .detail-container {
            margin: 0;
        }
        
        .team-header {
            flex-direction: column;
            text-align: center;
        }
        
        .team-meta {
            justify-content: center;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="fade-in">
    <!-- Breadcrumb -->
    <nav class="breadcrumb">
        <a href="{{ route('dashboard.admin') }}">
            <i class="fas fa-home"></i>
            Dashboard
        </a>
        <i class="fas fa-chevron-right"></i>
        <a href="{{ route('dashboard.admin.equipes') }}">Équipes</a>
        <i class="fas fa-chevron-right"></i>
        <span>{{ $equipe->nom }}</span>
    </nav>

    <div class="detail-container">
        <div class="detail-grid">
            <!-- Contenu principal -->
            <div class="main-content">
                <!-- En-tête de l'équipe -->
                <div class="detail-card">
                    <div class="card-body">
                        <div class="team-header">
                            <div class="team-avatar">
                                <i class="fas fa-people-group"></i>
                            </div>
                            <div class="team-info">
                                <h1>{{ $equipe->nom }}</h1>
                                <div class="team-meta">
                                    <span class="status-badge {{ $equipe->active ? 'status-active' : 'status-inactive' }}">
                                        <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                        {{ $equipe->active ? 'Active' : 'Inactive' }}
                                    </span>
                                    <div class="meta-item">
                                        <i class="fas fa-calendar-plus"></i>
                                        <span>Créée le {{ $equipe->created_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-users"></i>
                                        <span>{{ $equipe->utilisateurs->count() }} membre(s)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($equipe->description)
                        <div class="description-section">
                            <h3 class="text-lg font-semibold mb-3 flex items-center gap-2">
                                <i class="fas fa-align-left"></i>
                                Description
                            </h3>
                            <p class="description-text">{{ $equipe->description }}</p>
                        </div>
                        @endif
                        
                         @if($equipe->email)
                        <div class="description-section">
                            <h3 class="text-lg font-semibold mb-3 flex items-center gap-2">
                                <i class="fas fa-envelope"></i>
                                Email
                            </h3>
                            <p class="description-text">{{ $equipe->email }}</p>
                        </div>
                        @endif

                         @if($equipe->telephone)
                        <div class="description-section">
                            <h3 class="text-lg font-semibold mb-3 flex items-center gap-2">
                                <i class="fas fa-phone"></i>
                                Telephone
                            </h3>
                            <p class="description-text">{{ $equipe->telephone }}</p>
                        </div>
                        @endif

                         @if($equipe->specialite)
                        <div class="description-section">
                            <h3 class="text-lg font-semibold mb-3 flex items-center gap-2">
                                <i class="fas fa-briefcase"></i>
                                Specialite
                            </h3>
                            <p class="description-text">{{ $equipe->specialite }}</p>
                        </div>
                        @endif
                        
                    </div>
                </div>
                <!-- Information sur le responsable-->
                <div class="detail-card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="card-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <span>Responsable de l'équipe</span>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($equipe->responsable)
                        <div class="member-item">
                            <div class="member-avatar">
                                @if($equipe->responsable->photo)
                                    <img src="{{ asset('storage/' . $equipe->responsable->photo) }}" title="{{$equipe->responsable->prenom}} {{$equipe->responsable->nom}}" alt="Photo profile de {{$equipe->responsable->prenom}} {{$equipe->responsable->nom}}" class="w-full h-full rounded object-cover">
                                @else
                                    {{ substr($equipe->responsable->prenom ?? 'U', 0, 1) }}{{ substr($equipe->responsable->nom ?? 'U', 0, 1) }}
                                @endif
                            </div>
                            <div class="member-info">
                                <div class="member-name">{{ $equipe->responsable->prenom }} {{ $equipe->responsable->nom }}</div>
                                <div class="member-email">{{ $equipe->responsable->email }}</div>
                            </div>
                            <div class="member-role">{{ $equipe->responsable->poste ?? 'Aucun poste' }}</div>
                            <div class="member-role">{{ $equipe->responsable->departement ?? 'Aucun departement' }}</div>
                            <div class="member-role">{{ $equipe->responsable->role->nom ?? 'Utilisateur' }}</div>
                        </div>
                        @else
                        <p>Aucun responsable assigné.</p>
                        @endif
                    </div>
                </div>

                <!-- Liste des membres -->
                <div class="detail-card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <span>Membres de l'équipe ({{ $equipe->utilisateurs->count() }})</span>
                        </div>
                    </div>
                    <div class="card-body">
                        @forelse($equipe->utilisateurs as $user)
                        <div class="member-item">
                            <div class="member-avatar">
                                @if($user->photo)
                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo" class="w-full h-full rounded object-cover">
                                @else
                                    {{ substr($user->prenom ?? 'U', 0, 1) }}{{ substr($user->nom ?? 'U', 0, 1) }}
                                @endif
                            </div>
                            <div class="member-info">
                                <div class="member-name">{{ $user->prenom }} {{ $user->nom }}</div>
                                <div class="member-email">{{ $user->email }}</div>
                            </div>
                            <div class="member-role">{{ $user->role->nom ?? 'Utilisateur' }}</div>
                        </div>
                        @empty
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <h3 class="text-lg font-semibold mb-2">Aucun membre</h3>
                            <p>Cette équipe n'a pas encore de membres assignés.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="sidebar-content">
                <!-- Actions rapides -->
                <div class="detail-card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="card-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <span>Actions</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="action-buttons">
                            <a href="{{ route('dashboard.admin.equipes.edit', $equipe->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                                Modifier l'équipe
                            </a>
                            <a href="{{ route('dashboard.admin.equipes') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i>
                                Retour à la liste
                            </a>
                            <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                                <i class="fas fa-trash"></i>
                                Supprimer l'équipe
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Statistiques -->
                <div class="detail-card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="card-icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <span>Statistiques</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-value">{{ $equipe->utilisateurs->count() }}</div>
                                <div class="stat-label">Membres</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $equipe->active ? 'Oui' : 'Non' }}</div>
                                <div class="stat-label">Active</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $equipe->created_at->diffForHumans() }}</div>
                                <div class="stat-label">Créée</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $equipe->updated_at->diffForHumans() }}</div>
                                <div class="stat-label">Modifiée</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activité récente -->
                <div class="detail-card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="card-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <span>Activité récente</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-text">Équipe créée</div>
                                <div class="activity-time">{{ $equipe->created_at->format('d/m/Y à H:i') }}</div>
                            </div>
                        </div>
                        
                        @if($equipe->updated_at != $equipe->created_at)
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-text">Dernière modification</div>
                                <div class="activity-time">{{ $equipe->updated_at->format('d/m/Y à H:i') }}</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulaire de suppression caché -->
    <form id="deleteForm" action="{{ route('dashboard.admin.equipes.delete', $equipe->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection

@section('scripts')
<script>
    // Confirmation de suppression
    function confirmDelete() {
        if (confirm('⚠️ ATTENTION !\n\nÊtes-vous sûr de vouloir supprimer cette équipe ?\n\nCette action est irréversible et supprimera :\n- L\'équipe "{{ $equipe->nom }}"\n- Tous les liens avec les membres\n- L\'historique associé\n\nTapez "SUPPRIMER" pour confirmer :')) {
            const confirmation = prompt('Tapez "SUPPRIMER" pour confirmer la suppression :');
            if (confirmation === 'SUPPRIMER') {
                document.getElementById('deleteForm').submit();
            } else {
                alert('Suppression annulée.');
            }
        }
    }

    // Animation d'entrée
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.detail-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });

        // Animation des membres
        const members = document.querySelectorAll('.member-item');
        members.forEach((member, index) => {
            member.style.opacity = '0';
            member.style.transform = 'translateX(-10px)';
            
            setTimeout(() => {
                member.style.transition = 'all 0.3s ease';
                member.style.opacity = '1';
                member.style.transform = 'translateX(0)';
            }, 500 + (index * 100));
        });
    });
</script>
@endsection
