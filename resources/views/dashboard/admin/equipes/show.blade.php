@extends('layouts.admin')

@section('title', 'Détails de l\'Équipe - YouTicket')
@section('page-title', 'Détails de l\'Équipe')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboardAdminEquipesShow.css')}}">
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
<script src="{{asset('js/dashboardAdminEquipesShow.js')}}"></script>
@endsection
