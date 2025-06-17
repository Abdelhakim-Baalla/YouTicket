@extends('layouts.admin')

@section('title', 'Dashboard Admin - YouTicket')
@section('page-title', 'Dashboard Administrateur')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboardAdminIndex.css')}}">
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
