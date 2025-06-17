@extends('layouts.admin')

@section('title', 'Détails de l\'Action - YouTicket')
@section('page-title', 'Détails de l\'Action')

@section('styles')
<style>
    .detail-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 350px;
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
    
    .action-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding: 1.5rem;
        background: rgba(99, 102, 241, 0.1);
        border: 1px solid rgba(99, 102, 241, 0.2);
        border-radius: 12px;
    }
    
    .action-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }
    
    .action-create { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
    .action-update { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
    .action-delete { background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); }
    .action-view { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); }
    
    .action-info {
        flex: 1;
    }
    
    .action-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }
    
    .action-description {
        color: var(--text-secondary);
        font-size: 1rem;
        line-height: 1.5;
    }
    
    .meta-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        background: rgba(15, 15, 35, 0.3);
        border-radius: 8px;
    }
    
    .meta-icon {
        width: 32px;
        height: 32px;
        background: var(--gradient-accent);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.875rem;
    }
    
    .meta-content {
        flex: 1;
    }
    
    .meta-label {
        color: var(--text-muted);
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.25rem;
    }
    
    .meta-value {
        color: var(--text-primary);
        font-weight: 500;
        font-size: 0.875rem;
    }
    
    .changes-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    
    .changes-section {
        background: rgba(15, 15, 35, 0.3);
        border-radius: 12px;
        overflow: hidden;
    }
    
    .changes-header {
        padding: 1rem;
        font-weight: 600;
        color: var(--text-primary);
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .changes-old {
        background: rgba(220, 38, 38, 0.1);
        border: 1px solid rgba(220, 38, 38, 0.2);
    }
    
    .changes-old .changes-header {
        background: rgba(220, 38, 38, 0.2);
        color: #fca5a5;
    }
    
    .changes-new {
        background: rgba(5, 150, 105, 0.1);
        border: 1px solid rgba(5, 150, 105, 0.2);
    }
    
    .changes-new .changes-header {
        background: rgba(5, 150, 105, 0.2);
        color: #86efac;
    }
    
    .changes-content {
        padding: 1rem;
    }
    
    .json-viewer {
        background: rgba(0, 0, 0, 0.3);
        border-radius: 8px;
        padding: 1rem;
        font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
        font-size: 0.875rem;
        line-height: 1.5;
        color: #e2e8f0;
        overflow-x: auto;
        white-space: pre-wrap;
        word-break: break-word;
    }
    
    .json-key {
        color: #60a5fa;
    }
    
    .json-string {
        color: #34d399;
    }
    
    .json-number {
        color: #fbbf24;
    }
    
    .json-boolean {
        color: #f87171;
    }
    
    .json-null {
        color: #9ca3af;
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
    
    .btn-secondary {
        background: rgba(71, 85, 105, 0.8);
        color: var(--text-primary);
        border: 1px solid var(--border);
    }
    
    .btn:hover {
        transform: translateY(-1px);
        box-shadow: var(--shadow);
    }
    
    .user-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: rgba(15, 15, 35, 0.3);
        border-radius: 8px;
    }
    
    .user-avatar-large {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        background: var(--gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        font-weight: 600;
    }
    
    .user-details {
        flex: 1;
    }
    
    .user-name {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
    }
    
    .user-role {
        color: var(--text-muted);
        font-size: 0.875rem;
    }
    
    .timeline-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem;
        border-left: 3px solid var(--primary);
        background: rgba(99, 102, 241, 0.05);
        border-radius: 0 8px 8px 0;
        margin-bottom: 0.5rem;
    }
    
    .timeline-icon {
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
    
    .timeline-content {
        flex: 1;
    }
    
    .timeline-text {
        color: var(--text-primary);
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
    }
    
    .timeline-time {
        color: var(--text-muted);
        font-size: 0.75rem;
    }
    
    .no-changes {
        text-align: center;
        padding: 2rem;
        color: var(--text-muted);
    }
    
    @media (max-width: 1024px) {
        .detail-grid {
            grid-template-columns: 1fr;
        }
        
        .sidebar-content {
            order: -1;
        }
        
        .changes-container {
            grid-template-columns: 1fr;
        }
    }
    
    @media (max-width: 768px) {
        .detail-container {
            margin: 0;
        }
        
        .action-header {
            flex-direction: column;
            text-align: center;
        }
        
        .meta-grid {
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
