@extends('layouts.dashboard')

@section('title', 'Dashboard - YouTicket')

@section('page-title', 'Dashboard')

@section('content')
<div class="fade-in">
    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon stat-primary">
                <i class="fas fa-ticket-alt"></i>
            </div>
            <div class="stat-value">156</div>
            <div class="stat-label">
                Total des tickets
                <div class="stat-trend positive">
                    <i class="fas fa-arrow-up"></i> 12%
                </div>
            </div>
        </div>
        
        <div class="stat-card warning">
            <div class="stat-icon stat-warning">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="stat-value">23</div>
            <div class="stat-label">
                Tickets urgents
                <div class="stat-trend negative">
                    <i class="fas fa-arrow-up"></i> 8%
                </div>
            </div>
        </div>
        
        <div class="stat-card accent">
            <div class="stat-icon stat-accent">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-value">45</div>
            <div class="stat-label">
                En cours
                <div class="stat-trend positive">
                    <i class="fas fa-arrow-down"></i> 5%
                </div>
            </div>
        </div>
        
        <div class="stat-card success">
            <div class="stat-icon stat-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value">88</div>
            <div class="stat-label">
                Résolus
                <div class="stat-trend positive">
                    <i class="fas fa-arrow-up"></i> 24%
                </div>
            </div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="content-grid">
        <!-- Tickets List -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <div class="card-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    Tickets récents
                </h2>
                <a href="{{ route('tickets.index') }}" class="btn btn-secondary">
                    <i class="fas fa-eye"></i>
                    Voir tout
                </a>
            </div>
            <div class="card-body">
                <div class="ticket-list">
                    <div class="ticket-item">
                        <div class="ticket-priority priority-urgent"></div>
                        <div class="ticket-content">
                            <div class="ticket-header">
                                <div class="ticket-id">#YT-001</div>
                                <div class="ticket-status status-urgent">
                                    <i class="fas fa-exclamation-circle"></i>
                                    Urgent
                                </div>
                            </div>
                            <h3 class="ticket-title">Problème de connexion au serveur</h3>
                            <p class="ticket-description">
                                Le serveur principal ne répond plus depuis ce matin. Plusieurs utilisateurs sont impactés.
                            </p>
                            <div class="ticket-footer">
                                <div class="ticket-assignee">
                                    <div class="assignee-avatar">JD</div>
                                    <div class="assignee-name">Jean Dupont</div>
                                </div>
                                <div class="ticket-time">Il y a 2 heures</div>
                            </div>
                        </div>
                    </div>

                    <div class="ticket-item">
                        <div class="ticket-priority priority-high"></div>
                        <div class="ticket-content">
                            <div class="ticket-header">
                                <div class="ticket-id">#YT-002</div>
                                <div class="ticket-status status-progress">
                                    <i class="fas fa-spinner"></i>
                                    En cours
                                </div>
                            </div>
                            <h3 class="ticket-title">Demande d'accès utilisateur</h3>
                            <p class="ticket-description">
                                Un nouvel employé a besoin d'accès aux systèmes internes. Merci de configurer son compte.
                            </p>
                            <div class="ticket-footer">
                                <div class="ticket-assignee">
                                    <div class="assignee-avatar">MM</div>
                                    <div class="assignee-name">Marie Martin</div>
                                </div>
                                <div class="ticket-time">Il y a 5 heures</div>
                            </div>
                        </div>
                    </div>

                    <div class="ticket-item">
                        <div class="ticket-priority priority-normal"></div>
                        <div class="ticket-content">
                            <div class="ticket-header">
                                <div class="ticket-id">#YT-003</div>
                                <div class="ticket-status status-resolved">
                                    <i class="fas fa-check-circle"></i>
                                    Résolu
                                </div>
                            </div>
                            <h3 class="ticket-title">Mise à jour de la documentation</h3>
                            <p class="ticket-description">
                                La documentation utilisateur doit être mise à jour avec les nouvelles fonctionnalités.
                            </p>
                            <div class="ticket-footer">
                                <div class="ticket-assignee">
                                    <div class="assignee-avatar">PD</div>
                                    <div class="assignee-name">Pierre Durand</div>
                                </div>
                                <div class="ticket-time">Hier</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-center text-sm text-gray-400">
                    Affichage de 3 tickets sur 156
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div>
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <div class="card-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        Actions rapides
                    </h2>
                </div>
                <div class="card-body">
                    <div class="quick-actions">
                        <a href="{{ route('tickets.create') }}" class="quick-action">
                            <div class="action-icon stat-primary">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="action-content">
                                <div class="action-title">Nouveau ticket</div>
                                <div class="action-description">Créer un nouveau ticket de support</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow"></i>
                        </a>
                        
                        <a href="{{ route('tickets.index') }}" class="quick-action">
                            <div class="action-icon stat-accent">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="action-content">
                                <div class="action-title">Recherche avancée</div>
                                <div class="action-description">Filtrer et trouver des tickets spécifiques</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow"></i>
                        </a>
                        
                        <a href="{{ route('reports.index') }}" class="quick-action">
                            <div class="action-icon stat-success">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="action-content">
                                <div class="action-title">Voir les rapports</div>
                                <div class="action-description">Analyser les performances et tendances</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Team Status -->
            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="card-title">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        Statut de l'équipe
                    </h2>
                </div>
                <div class="card-body">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="user-avatar">JD</div>
                                <div>
                                    <div class="text-sm font-medium text-white">Jean Dupont</div>
                                    <div class="text-xs text-gray-400">Disponible</div>
                                </div>
                            </div>
                            <span class="px-2 py-1 text-xs font-medium bg-green-900 bg-opacity-30 text-green-400 rounded-full">
                                En ligne
                            </span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="user-avatar">MM</div>
                                <div>
                                    <div class="text-sm font-medium text-white">Marie Martin</div>
                                    <div class="text-xs text-gray-400">Occupée</div>
                                </div>
                            </div>
                            <span class="px-2 py-1 text-xs font-medium bg-yellow-900 bg-opacity-30 text-yellow-400 rounded-full">
                                Occupée
                            </span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="user-avatar">PD</div>
                                <div>
                                    <div class="text-sm font-medium text-white">Pierre Durand</div>
                                    <div class="text-xs text-gray-400">Absent</div>
                                </div>
                            </div>
                            <span class="px-2 py-1 text-xs font-medium bg-gray-900 bg-opacity-30 text-gray-400 rounded-full">
                                Absent
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--gradient-primary);
    }

    .stat-card.warning::before {
        background: var(--gradient-warning);
    }

    .stat-card.accent::before {
        background: var(--gradient-accent);
    }

    .stat-card.success::before {
        background: var(--gradient-success);
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }

    .stat-primary {
        background: var(--gradient-primary);
    }

    .stat-warning {
        background: var(--gradient-warning);
    }

    .stat-accent {
        background: var(--gradient-accent);
    }

    .stat-success {
        background: var(--gradient-success);
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .stat-label {
        color: var(--text-secondary);
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-trend {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .stat-trend.positive {
        color: var(--success);
    }

    .stat-trend.negative {
        color: var(--warning);
    }

    /* Content Grid */
    .content-grid {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 1.5rem;
    }

    @media (max-width: 1024px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Tickets */
    .ticket-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .ticket-item {
        display: flex;
        gap: 1rem;
        padding: 1.25rem;
        background: rgba(30, 41, 59, 0.5);
        border: 1px solid var(--border);
        border-radius: 12px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .ticket-item:hover {
        background: rgba(30, 41, 59, 0.8);
        transform: translateY(-2px);
    }

    .ticket-priority {
        width: 4px;
        height: 100%;
        border-radius: 2px;
        align-self: stretch;
    }

    .priority-urgent {
        background: var(--gradient-warning);
    }

    .priority-high {
        background: var(--gradient-accent);
    }

    .priority-normal {
        background: var(--gradient-primary);
    }

    .priority-low {
        background: var(--gradient-success);
    }

    .ticket-content {
        flex: 1;
        min-width: 0;
    }

    .ticket-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 0.75rem;
    }

    .ticket-id {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.75rem;
        color: var(--primary-light);
        font-weight: 500;
        background: rgba(99, 102, 241, 0.1);
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
    }

    .ticket-status {
        padding: 0.25rem 0.75rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .status-urgent {
        background: rgba(220, 38, 38, 0.1);
        color: #ef4444;
    }

    .status-progress {
        background: rgba(99, 102, 241, 0.1);
        color: #818cf8;
    }

    .status-resolved {
        background: rgba(5, 150, 105, 0.1);
        color: #10b981;
    }

    .ticket-title {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .ticket-description {
        font-size: 0.875rem;
        color: var(--text-secondary);
        margin-bottom: 1rem;
        line-height: 1.5;
    }

    .ticket-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .ticket-assignee {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .assignee-avatar {
        width: 24px;
        height: 24px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.75rem;
        font-weight: 600;
        background: var(--gradient-primary);
    }

    .assignee-name {
        font-size: 0.875rem;
        color: var(--text-secondary);
    }

    .ticket-time {
        font-size: 0.75rem;
        color: var(--text-muted);
        font-family: 'JetBrains Mono', monospace;
    }

    /* Quick Actions */
    .quick-actions {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .quick-action {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: rgba(30, 41, 59, 0.5);
        border: 1px solid var(--border);
        border-radius: 12px;
        text-decoration: none;
        color: var(--text-primary);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .quick-action:hover {
        background: rgba(30, 41, 59, 0.8);
        transform: translateY(-2px);
    }

    .action-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
    }

    .action-content {
        flex: 1;
    }

    .action-title {
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .action-description {
        font-size: 0.75rem;
        color: var(--text-secondary);
    }

    .action-arrow {
        color: var(--text-muted);
        transition: all 0.3s ease;
    }

    .quick-action:hover .action-arrow {
        transform: translateX(4px);
        color: var(--text-primary);
    }

    /* Team Status */
    .user-avatar {
        width: 32px;
        height: 32px;
        background: var(--gradient-primary);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
    }

    /* Utilities */
    .fade-in {
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .mt-4 {
        margin-top: 1rem;
    }

    .space-y-3 > * + * {
        margin-top: 0.75rem;
    }
</style>
@endsection