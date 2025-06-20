@extends('layouts.admin')

@section('title', 'Détails de l\'Action - YouTicket')
@section('page-title', 'Détails de l\'Action')

@section('styles')
<link rel="stylesheet" href="{{asset('css/historiesShow.css')}}">
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
        <a href="{{ route('histories.index') }}">Historique</a>
        <i class="fas fa-chevron-right"></i>
        <span>Action #{{ $history->id }}</span>
    </nav>

    <div class="detail-container">
        <div class="detail-grid">
            <!-- Contenu principal -->
            <div class="main-content">
                <!-- En-tête de l'action -->
                <div class="detail-card">
                    <div class="card-body">
                        <div class="action-header">
                            <div class="action-icon action-{{ $history->action }}">
                                @switch($history->action)
                                    @case('create')
                                        <i class="fas fa-plus"></i>
                                        @break
                                    @case('update')
                                        <i class="fas fa-edit"></i>
                                        @break
                                    @case('delete')
                                        <i class="fas fa-trash"></i>
                                        @break
                                    @case('view')
                                        <i class="fas fa-eye"></i>
                                        @break
                                    @default
                                        <i class="fas fa-cog"></i>
                                @endswitch
                            </div>
                            <div class="action-info">
                                <div class="action-title">
                                    @switch($history->action)
                                        @case('create')
                                            Création d'un élément
                                            @break
                                        @case('update')
                                            Modification d'un élément
                                            @break
                                        @case('delete')
                                            Suppression d'un élément
                                            @break
                                        @case('view')
                                            Consultation d'un élément
                                            @break
                                        @default
                                            {{ ucfirst($history->action) }}
                                    @endswitch
                                </div>
                                <div class="action-description">{{ $history->description }}</div>
                            </div>
                        </div>

                        <!-- Métadonnées -->
                        <div class="meta-grid">
                            <div class="meta-item">
                                <div class="meta-icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <div class="meta-content">
                                    <div class="meta-label">Date & Heure</div>
                                    <div class="meta-value">{{ $history->created_at->format('d/m/Y à H:i:s') }}</div>
                                </div>
                            </div>
                            
                            <div class="meta-item">
                                <div class="meta-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="meta-content">
                                    <div class="meta-label">Il y a</div>
                                    <div class="meta-value">{{ $history->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                            
                            @if($history->model_type)
                            <div class="meta-item">
                                <div class="meta-icon">
                                    <i class="fas fa-cube"></i>
                                </div>
                                <div class="meta-content">
                                    <div class="meta-label">Type d'objet</div>
                                    <div class="meta-value">{{ class_basename($history->model_type) }}</div>
                                </div>
                            </div>
                            @endif
                            
                            @if($history->model_id)
                            <div class="meta-item">
                                <div class="meta-icon">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                                <div class="meta-content">
                                    <div class="meta-label">ID de l'objet</div>
                                    <div class="meta-value">#{{ $history->model_id }}</div>
                                </div>
                            </div>
                            @endif
                            
                            @if($history->ip_address)
                            <div class="meta-item">
                                <div class="meta-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="meta-content">
                                    <div class="meta-label">Adresse IP</div>
                                    <div class="meta-value">{{ $history->ip_address }}</div>
                                </div>
                            </div>
                            @endif
                            
                            @if($history->user_agent)
                            <div class="meta-item">
                                <div class="meta-icon">
                                    <i class="fas fa-desktop"></i>
                                </div>
                                <div class="meta-content">
                                    <div class="meta-label">Navigateur</div>
                                    <div class="meta-value">{{ Str::limit($history->user_agent, 50) }}</div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Changements -->
                @if($history->old_values || $history->new_values)
                <div class="detail-card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="card-icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <span>Détails des changements</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="changes-container">
                            @if($history->old_values)
                            <div class="changes-section changes-old">
                                <div class="changes-header">
                                    <i class="fas fa-minus-circle"></i>
                                    Anciennes valeurs
                                </div>
                                <div class="changes-content">
                                    <div class="json-viewer" id="oldValues">
                                        {{ json_encode($history->old_values, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            @if($history->new_values)
                            <div class="changes-section changes-new">
                                <div class="changes-header">
                                    <i class="fas fa-plus-circle"></i>
                                    Nouvelles valeurs
                                </div>
                                <div class="changes-content">
                                    <div class="json-viewer" id="newValues">
                                        {{ json_encode($history->new_values, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @else
                <div class="detail-card">
                    <div class="card-body">
                        <div class="no-changes">
                            <i class="fas fa-info-circle text-4xl mb-4 opacity-50"></i>
                            <h3 class="text-lg font-semibold mb-2">Aucun changement détaillé</h3>
                            <p>Cette action ne contient pas de données de changement spécifiques.</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="sidebar-content">
                <!-- Utilisateur -->
                <div class="detail-card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="card-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <span>Utilisateur</span>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($history->user)
                        <div class="user-card">
                            <div class="user-avatar-large">
                                @if($history->user->photo)
                                            <img src="{{ asset('storage/' . $history->user->photo) }}" 
                                                 alt="{{ $history->user->prenom }} {{ $history->user->nom }}" 
                                                 class="rounded-full w-8 h-8 object-cover">
                                        @else
                                            <i class="fas fa-robot"></i>
                                        @endif
                            </div>
                            <div class="user-details">
                                <div class="user-name">{{ $history->user->prenom }} {{ $history->user->nom }}</div>
                                <div class="user-role">{{ $history->user->role->nom ?? 'Utilisateur' }}</div>
                                <div class="user-role">{{ $history->user->email }}</div>
                            </div>
                        </div>
                        @else
                        <div class="user-card">
                            <div class="user-avatar-large">
                                <i class="fas fa-robot"></i>
                            </div>
                            <div class="user-details">
                                <div class="user-name">Système</div>
                                <div class="user-role">Action automatique</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

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
                        <div class="flex flex-col gap-2">
                            <a href="{{ route('histories.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i>
                                Retour à l'historique
                            </a>
                            
                            @if($history->user)
                            <a href="{{ route('histories.index', ['user_id' => $history->user->id]) }}" class="btn btn-secondary">
                                <i class="fas fa-user-clock"></i>
                                Actions de cet utilisateur
                            </a>
                            @endif
                            
                            @if($history->model_type)
                            <a href="{{ route('histories.index', ['model_type' => $history->model_type]) }}" class="btn btn-secondary">
                                <i class="fas fa-filter"></i>
                                Actions sur {{ class_basename($history->model_type) }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Timeline récente -->
                <div class="detail-card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="card-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <span>Actions récentes</span>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($recentHistories ?? false)
                            @foreach($recentHistories as $recent)
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    @switch($recent->action)
                                        @case('create')
                                            <i class="fas fa-plus"></i>
                                            @break
                                        @case('update')
                                            <i class="fas fa-edit"></i>
                                            @break
                                        @case('delete')
                                            <i class="fas fa-trash"></i>
                                            @break
                                        @default
                                            <i class="fas fa-cog"></i>
                                    @endswitch
                                </div>
                                <div class="timeline-content">
                                    <div class="timeline-text">{{ Str::limit($recent->description, 40) }}</div>
                                    <div class="timeline-time">{{ $recent->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="text-center text-text-muted py-4">
                                <i class="fas fa-clock text-2xl mb-2 opacity-50"></i>
                                <p>Aucune action récente</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/historiesShow.js')}}"></script>
@endsection
