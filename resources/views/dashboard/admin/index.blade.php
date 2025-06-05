@extends('layouts.admin')

@section('title', 'Dashboard Admin - YouTicket')

@section('page-title', 'Dashboard Admin')

@section('content')
<div class="fade-in">
    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon stat-primary">
                <i class="fas fa-ticket-alt"></i>
            </div>
            <div class="stat-value">{{ $countTickets }}</div>
            <div class="stat-label">
                Total des tickets
            </div>
        </div>
        
        <div class="stat-card warning">
            <div class="stat-icon stat-warning">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">{{auth()->user()->count()}}</div>
            <div class="stat-label">
                Utilisateurs
            </div>
        </div>
        
        <div class="stat-card accent">
            <div class="stat-icon stat-accent">
                <i class="fas fa-headset"></i>
            </div>
            <div class="stat-value">{{ $countAgents }}</div>
            <div class="stat-label">
                Agents support
            </div>
        </div>
        
        <div class="stat-card success">
            <div class="stat-icon stat-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value">{{ $countTicketsResolu }}</div>
            <div class="stat-label">
                Tickets résolus
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
                <a href="#" class="btn btn-secondary">
                    <i class="fas fa-eye"></i>
                    Voir tout
                </a>
            </div>
            <div class="card-body">
                <div class="ticket-list">
                    <!-- Exemple de ticket -->
                    <div class="ticket-item">
                        <div class="ticket-priority priority-high"></div>
                        <div class="ticket-content">
                            <div class="ticket-header">
                                <div class="ticket-id">#YT-0001</div>
                                <div class="ticket-status status-open">
                                    <i class="fas fa-hourglass-half"></i>
                                    Ouvert
                                </div>
                            </div>
                            <h3 class="ticket-title">Problème de connexion</h3>
                            <p class="ticket-description">
                                Impossible de se connecter à la plateforme depuis ce matin.
                            </p>
                            <div class="ticket-footer">
                                <div class="ticket-assignee">
                                    <div class="assignee-avatar">JD</div>
                                    <div class="assignee-name">Jean Dupont</div>
                                </div>
                                <div class="ticket-time">il y a 2 heures</div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin exemple -->
                </div>
            </div>
            <div class="card-footer">
                <div class="text-center text-sm text-gray-400">
                    Affichage de 1 ticket sur 1234
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div>
            <!-- Performance Metrics -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <div class="card-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        Métriques de performance
                    </h2>
                </div>
                <div class="card-body">
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Taux de résolution</span>
                                <span class="text-sm font-medium">95%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: 95%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Temps moyen de réponse</span>
                                <span class="text-sm font-medium">1h 20min</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-blue-500 h-2.5 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Satisfaction client</span>
                                <span class="text-sm font-medium">89%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-purple-500 h-2.5 rounded-full" style="width: 89%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card mt-4">
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
                        <a href="#" class="quick-action">
                            <div class="action-icon stat-primary">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="action-content">
                                <div class="action-title">Nouvel utilisateur</div>
                                <div class="action-description">Créer un nouveau compte utilisateur</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow"></i>
                        </a>
                        
                        <a href="#" class="quick-action">
                            <div class="action-icon stat-warning">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="action-content">
                                <div class="action-title">Paramètres système</div>
                                <div class="action-description">Configurer les paramètres globaux</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow"></i>
                        </a>
                        
                        <a href="#" class="quick-action">
                            <div class="action-icon stat-success">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="action-content">
                                <div class="action-title">Générer rapport</div>
                                <div class="action-description">Créer un rapport personnalisé</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Team Activity -->
            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="card-title">
                        <div class="card-icon">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        Activité de l'équipe
                    </h2>
                </div>
                <div class="card-body">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="user-avatar">JD</div>
                                <div>
                                    <div class="text-sm font-medium text-white">Jean Dupont</div>
                                    <div class="text-xs text-gray-400">3 tickets actifs</div>
                                </div>
                            </div>
                            <span class="px-2 py-1 text-xs font-medium bg-online rounded-full">
                                En ligne
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="user-avatar">MS</div>
                                <div>
                                    <div class="text-sm font-medium text-white">Marie Simon</div>
                                    <div class="text-xs text-gray-400">1 ticket actif</div>
                                </div>
                            </div>
                            <span class="px-2 py-1 text-xs font-medium bg-busy rounded-full">
                                Occupé
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Priorités des tickets */
    .priority-urgent { background: var(--gradient-warning); }
    .priority-high { background: var(--gradient-accent); }
    .priority-medium { background: var(--gradient-primary); }
    .priority-low { background: var(--gradient-success); }

    /* Statuts des tickets */
    .status-new { background: rgba(99, 102, 241, 0.1); color: #818cf8; }
    .status-open { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
    .status-pending { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }
    .status-solved { background: rgba(5, 150, 105, 0.1); color: #10b981; }
    .status-closed { background: rgba(107, 114, 128, 0.1); color: #6b7280; }

    /* Statut des membres d'équipe */
    .bg-online { background: rgba(5, 150, 105, 0.3); color: #10b981; }
    .bg-busy { background: rgba(245, 158, 11, 0.3); color: #f59e0b; }
    .bg-away { background: rgba(59, 130, 246, 0.3); color: #3b82f6; }
    .bg-offline { background: rgba(107, 114, 128, 0.3); color: #6b7280; }
</style>
@endsection