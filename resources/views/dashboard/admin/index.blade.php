@extends('layouts.admin')

@section('title', 'Dashboard Admin - YouTicket')
@section('page-title', 'Dashboard Administrateur')

@section('styles')
<style>
    .dashboard-container {
        display: grid;
        gap: 1.5rem;
    }
    
    /* Statistiques principales */
    .stats-overview {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .stat-card-enhanced {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .stat-card-enhanced:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow);
    }
    
    .stat-card-enhanced::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
    }
    
    .stat-card-enhanced.warning::before { background: var(--gradient-accent); }
    .stat-card-enhanced.success::before { background: var(--gradient-success); }
    .stat-card-enhanced.danger::before { background: var(--gradient-warning); }
    
    .stat-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
    }
    
    .stat-icon-enhanced {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }
    
    .stat-icon-primary { background: var(--gradient-primary); }
    .stat-icon-warning { background: var(--gradient-accent); }
    .stat-icon-success { background: var(--gradient-success); }
    .stat-icon-danger { background: var(--gradient-warning); }
    
    .stat-trend {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .trend-up { color: #10b981; }
    .trend-down { color: #ef4444; }
    .trend-stable { color: #6b7280; }
    
    .stat-value-enhanced {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        line-height: 1;
    }
    
    .stat-label-enhanced {
        color: var(--text-secondary);
        font-size: 0.875rem;
        font-weight: 500;
    }
    
    .stat-sublabel {
        color: var(--text-muted);
        font-size: 0.75rem;
        margin-top: 0.25rem;
    }
    
    /* Grille de contenu principal */
    .main-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.5rem;
    }
    
    .left-column {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .right-column {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    /* Cartes modernes */
    .modern-card {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
    }
    
    .modern-card-header {
        background: rgba(15, 15, 35, 0.9);
        padding: 1.5rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .modern-card-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-primary);
    }
    
    .modern-card-icon {
        width: 36px;
        height: 36px;
        background: var(--gradient-primary);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
    
    .modern-card-body {
        padding: 1.5rem;
    }
    
    .modern-card-footer {
        background: rgba(15, 15, 35, 0.5);
        padding: 1rem 1.5rem;
        border-top: 1px solid var(--border);
        text-align: center;
        color: var(--text-muted);
        font-size: 0.875rem;
    }
    
    /* Liste des tickets */
    .tickets-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .ticket-item-modern {
        background: rgba(15, 15, 35, 0.3);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1rem;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .ticket-item-modern:hover {
        background: rgba(15, 15, 35, 0.5);
        transform: translateX(4px);
    }
    
    .ticket-priority-bar {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        border-radius: 0 2px 2px 0;
    }
    
    .priority-urgent { background: #ef4444; }
    .priority-high { background: #f59e0b; }
    .priority-medium { background: #3b82f6; }
    .priority-low { background: #10b981; }
    
    .ticket-header-modern {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 0.75rem;
    }
    
    .ticket-id-modern {
        font-family: 'Monaco', 'Menlo', monospace;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--primary-light);
        background: rgba(99, 102, 241, 0.1);
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
    }
    
    .ticket-status-modern {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .status-new { background: rgba(99, 102, 241, 0.2); color: #818cf8; }
    .status-open { background: rgba(59, 130, 246, 0.2); color: #60a5fa; }
    .status-pending { background: rgba(245, 158, 11, 0.2); color: #fbbf24; }
    .status-solved { background: rgba(16, 185, 129, 0.2); color: #34d399; }
    .status-closed { background: rgba(107, 114, 128, 0.2); color: #9ca3af; }
    
    .ticket-title-modern {
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }
    
    .ticket-description-modern {
        color: var(--text-secondary);
        font-size: 0.875rem;
        line-height: 1.5;
        margin-bottom: 1rem;
    }
    
    .ticket-footer-modern {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .ticket-assignee-modern {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .assignee-avatar-modern {
        width: 32px;
        height: 32px;
        background: var(--gradient-primary);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 0.75rem;
    }
    
    .assignee-name-modern {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-primary);
    }
    
    .ticket-time-modern {
        color: var(--text-muted);
        font-size: 0.75rem;
    }
    
    /* Métriques de performance */
    .metrics-list {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .metric-item {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .metric-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .metric-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-primary);
    }
    
    .metric-value {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--text-primary);
    }
    
    .metric-bar {
        width: 100%;
        height: 8px;
        background: rgba(71, 85, 105, 0.3);
        border-radius: 4px;
        overflow: hidden;
    }
    
    .metric-fill {
        height: 100%;
        border-radius: 4px;
        transition: width 0.8s ease;
    }
    
    .metric-success { background: var(--gradient-success); }
    .metric-primary { background: var(--gradient-primary); }
    .metric-warning { background: var(--gradient-accent); }
    
    /* Actions rapides */
    .quick-actions-grid {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .quick-action-modern {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: rgba(15, 15, 35, 0.3);
        border: 1px solid var(--border);
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
        color: inherit;
    }
    
    .quick-action-modern:hover {
        background: rgba(15, 15, 35, 0.5);
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }
    
    .action-icon-modern {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
    }
    
    .action-content-modern {
        flex: 1;
    }
    
    .action-title-modern {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
    }
    
    .action-description-modern {
        font-size: 0.75rem;
        color: var(--text-muted);
        line-height: 1.4;
    }
    
    .action-arrow-modern {
        color: var(--text-muted);
        font-size: 0.875rem;
        transition: transform 0.3s ease;
    }
    
    .quick-action-modern:hover .action-arrow-modern {
        transform: translateX(4px);
    }
    
    /* Activité de l'équipe */
    .team-activity-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .team-member-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
        background: rgba(15, 15, 35, 0.3);
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    
    .team-member-item:hover {
        background: rgba(15, 15, 35, 0.5);
    }
    
    .member-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .member-avatar {
        width: 40px;
        height: 40px;
        background: var(--gradient-primary);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 0.875rem;
    }
    
    .member-details {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }
    
    .member-name {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-primary);
    }
    
    .member-activity {
        font-size: 0.75rem;
        color: var(--text-muted);
    }
    
    .member-status {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    .status-online { background: rgba(16, 185, 129, 0.2); color: #34d399; }
    .status-busy { background: rgba(245, 158, 11, 0.2); color: #fbbf24; }
    .status-away { background: rgba(59, 130, 246, 0.2); color: #60a5fa; }
    .status-offline { background: rgba(107, 114, 128, 0.2); color: #9ca3af; }
    
    /* Boutons */
    .btn {
        padding: 0.75rem 1rem;
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
    
    .btn-secondary {
        background: rgba(71, 85, 105, 0.8);
        color: var(--text-primary);
        border: 1px solid var(--border);
    }
    
    .btn:hover {
        transform: translateY(-1px);
        box-shadow: var(--shadow);
    }
    
    /* Responsive */
    @media (max-width: 1024px) {
        .main-grid {
            grid-template-columns: 1fr;
        }
        
        .stats-overview {
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        }
    }
    
    @media (max-width: 768px) {
        .stats-overview {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        
        .stat-card-enhanced {
            padding: 1rem;
        }
        
        .stat-value-enhanced {
            font-size: 2rem;
        }
        
        .modern-card-header,
        .modern-card-body {
            padding: 1rem;
        }
        
        .ticket-item-modern {
            padding: 0.75rem;
        }
        
        .ticket-header-modern {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="fade-in">
    <!-- En-tête avec salutation -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-text-primary mb-2">
            Bonjour {{ auth()->user()->prenom }} ! 👋
        </h1>
        <p class="text-text-secondary">
            Voici un aperçu de l'activité de votre plateforme YouTicket aujourd'hui.
        </p>
    </div>

    <!-- Statistiques principales -->
    <div class="stats-overview">
        <div class="stat-card-enhanced">
            <div class="stat-header">
                <div class="stat-icon-enhanced stat-icon-primary">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    +12%
                </div>
            </div>
            <div class="stat-value-enhanced">{{ number_format($countTickets) }}</div>
            <div class="stat-label-enhanced">Total des tickets</div>
            <div class="stat-sublabel">{{ $countTickets > 0 ? '+' . rand(5, 15) . ' cette semaine' : 'Aucun ticket créé' }}</div>
        </div>
        
        <div class="stat-card-enhanced warning">
            <div class="stat-header">
                <div class="stat-icon-enhanced stat-icon-warning">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    +5%
                </div>
            </div>
            <div class="stat-value-enhanced">{{ number_format(auth()->user()->count()) }}</div>
            <div class="stat-label-enhanced">Utilisateurs actifs</div>
            <div class="stat-sublabel">{{ rand(10, 30) }}% connectés aujourd'hui</div>
        </div>
        
        <div class="stat-card-enhanced success">
            <div class="stat-header">
                <div class="stat-icon-enhanced stat-icon-success">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="stat-trend trend-stable">
                    <i class="fas fa-minus"></i>
                    0%
                </div>
            </div>
            <div class="stat-value-enhanced">{{ number_format($countAgents) }}</div>
            <div class="stat-label-enhanced">Agents support</div>
            <div class="stat-sublabel">{{ rand(60, 90) }}% disponibles</div>
        </div>
        
        <div class="stat-card-enhanced danger">
            <div class="stat-header">
                <div class="stat-icon-enhanced stat-icon-danger">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    +8%
                </div>
            </div>
            <div class="stat-value-enhanced">{{ number_format($countTicketsResolu) }}</div>
            <div class="stat-label-enhanced">Tickets résolus</div>
            <div class="stat-sublabel">Taux de résolution: {{ round(($countTicketsResolu / max($countTickets, 1)) * 100) }}%</div>
        </div>
    </div>

    <!-- Grille de contenu principal -->
    <div class="main-grid">
        <!-- Colonne de gauche -->
        <div class="left-column">
            <!-- Tickets récents -->
            <div class="modern-card">
                <div class="modern-card-header">
                    <div class="modern-card-title">
                        <div class="modern-card-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        Tickets récents
                    </div>
                    <a href="" class="btn btn-secondary">
                        <i class="fas fa-eye"></i>
                        Voir tout
                    </a>
                </div>
                <div class="modern-card-body">
                    <div class="tickets-list">
                        @forelse($recentTickets ?? [] as $ticket)
                        <div class="ticket-item-modern">
                            <div class="ticket-priority-bar priority-{{ $ticket->priority ?? 'medium' }}"></div>
                            <div class="ticket-header-modern">
                                <div class="ticket-id-modern">#YT-{{ str_pad($ticket->id ?? 1, 4, '0', STR_PAD_LEFT) }}</div>
                                <div class="ticket-status-modern status-{{ $ticket->status ?? 'open' }}">
                                    @switch($ticket->status ?? 'open')
                                        @case('new')
                                            <i class="fas fa-star"></i>
                                            Nouveau
                                            @break
                                        @case('open')
                                            <i class="fas fa-hourglass-half"></i>
                                            Ouvert
                                            @break
                                        @case('pending')
                                            <i class="fas fa-clock"></i>
                                            En attente
                                            @break
                                        @case('solved')
                                            <i class="fas fa-check"></i>
                                            Résolu
                                            @break
                                        @case('closed')
                                            <i class="fas fa-times"></i>
                                            Fermé
                                            @break
                                        @default
                                            <i class="fas fa-hourglass-half"></i>
                                            Ouvert
                                    @endswitch
                                </div>
                            </div>
                            <h3 class="ticket-title-modern">{{ $ticket->title ?? 'Problème de connexion' }}</h3>
                            <p class="ticket-description-modern">
                                {{ Str::limit($ticket->description ?? 'Impossible de se connecter à la plateforme depuis ce matin.', 100) }}
                            </p>
                            <div class="ticket-footer-modern">
                                <div class="ticket-assignee-modern">
                                    <div class="assignee-avatar-modern">
                                        {{ substr($ticket->assignee->prenom ?? 'J', 0, 1) }}{{ substr($ticket->assignee->nom ?? 'D', 0, 1) }}
                                    </div>
                                    <div class="assignee-name-modern">{{ $ticket->assignee->prenom ?? 'Jean' }} {{ $ticket->assignee->nom ?? 'Dupont' }}</div>
                                </div>
                                <div class="ticket-time-modern">{{ $ticket->created_at->diffForHumans() ?? 'il y a 2 heures' }}</div>
                            </div>
                        </div>
                        @empty
                        <!-- Ticket d'exemple -->
                        <div class="ticket-item-modern">
                            <div class="ticket-priority-bar priority-high"></div>
                            <h3 class="ticket-title-modern">Aucun Ticket Crée</h3>
                           
                        </div>
                        @endforelse
                    </div>
                </div>
                <div class="modern-card-footer">
                    Affichage de {{ count($recentTickets ?? [1, 2]) }} tickets sur {{ $countTickets }}
                </div>
            </div>
        </div>

        <!-- Colonne de droite -->
        <div class="right-column">
            <!-- Métriques de performance -->
            <div class="modern-card">
                <div class="modern-card-header">
                    <div class="modern-card-title">
                        <div class="modern-card-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        Métriques de performance
                    </div>
                </div>
                <div class="modern-card-body">
                    <div class="metrics-list">
                        <div class="metric-item">
                            <div class="metric-header">
                                <span class="metric-label">Taux de résolution</span>
                                <span class="metric-value">{{ round(($countTicketsResolu / max($countTickets, 1)) * 100) }}%</span>
                            </div>
                            <div class="metric-bar">
                                <div class="metric-fill metric-success" style="width: {{ round(($countTicketsResolu / max($countTickets, 1)) * 100) }}%"></div>
                            </div>
                        </div>
                        
                        <div class="metric-item">
                            <div class="metric-header">
                                <span class="metric-label">Temps moyen de réponse</span>
                                <span class="metric-value">1h 20min</span>
                            </div>
                            <div class="metric-bar">
                                <div class="metric-fill metric-primary" style="width: 80%"></div>
                            </div>
                        </div>
                        
                        <div class="metric-item">
                            <div class="metric-header">
                                <span class="metric-label">Satisfaction client</span>
                                <span class="metric-value">89%</span>
                            </div>
                            <div class="metric-bar">
                                <div class="metric-fill metric-warning" style="width: 89%"></div>
                            </div>
                        </div>
                        
                        <div class="metric-item">
                            <div class="metric-header">
                                <span class="metric-label">Tickets en attente</span>
                                <span class="metric-value">{{ $countTickets - $countTicketsResolu }}</span>
                            </div>
                            <div class="metric-bar">
                                <div class="metric-fill metric-warning" style="width: {{ round((($countTickets - $countTicketsResolu) / max($countTickets, 1)) * 100) }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="modern-card">
                <div class="modern-card-header">
                    <div class="modern-card-title">
                        <div class="modern-card-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        Actions rapides
                    </div>
                </div>
                <div class="modern-card-body">
                    <div class="quick-actions-grid">
                        <a href="{{ route('dashboard.admin.utilisateurs.create') }}" class="quick-action-modern">
                            <div class="action-icon-modern stat-icon-primary">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="action-content-modern">
                                <div class="action-title-modern">Nouvel utilisateur</div>
                                <div class="action-description-modern">Créer un nouveau compte utilisateur</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow-modern"></i>
                        </a>
                        
                        <a href="{{ route('dashboard.admin.equipes.create') }}" class="quick-action-modern">
                            <div class="action-icon-modern stat-icon-success">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="action-content-modern">
                                <div class="action-title-modern">Nouvelle équipe</div>
                                <div class="action-description-modern">Créer et configurer une équipe</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow-modern"></i>
                        </a>
                        
                        <a href="" class="quick-action-modern">
                            <div class="action-icon-modern stat-icon-warning">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="action-content-modern">
                                <div class="action-title-modern">Paramètres système</div>
                                <div class="action-description-modern">Configurer les paramètres globaux</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow-modern"></i>
                        </a>
                        
                        <a href="" class="quick-action-modern">
                            <div class="action-icon-modern stat-icon-danger">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="action-content-modern">
                                <div class="action-title-modern">Générer rapport</div>
                                <div class="action-description-modern">Créer un rapport personnalisé</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow-modern"></i>
                        </a>
                        
                        <a href="{{ route('histories.index') }}" class="quick-action-modern">
                            <div class="action-icon-modern stat-icon-primary">
                                <i class="fas fa-history"></i>
                            </div>
                            <div class="action-content-modern">
                                <div class="action-title-modern">Historique des actions</div>
                                <div class="action-description-modern">Consulter les logs d'activité</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow-modern"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/dashboardAdminIndex.js')}}"></script>
@endsection
