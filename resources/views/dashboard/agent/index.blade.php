@extends('layouts.agent')

@section('title', 'Tableau de Bord Agent - YouTicket')
@section('page-title', 'Tableau de Bord Agent')
@section('page-subtitle', '')

@section('styles')
<link rel="stylesheet" href="/css/dashboardAgentIndex.css">
@endsection

@section('content')
<div class="fade-in">
    <!-- En-tête avec salutation -->
    <div class="dashboard-header">
        <div class="welcome-message">
            <h1>Bonjour {{auth()->user()->prenom}} !</h1>
            <p>Voici votre tableau de bord pour gérer les tickets qui vous sont assignés.</p>
        </div>
        <div class="quick-actions-header">
            <a href="#" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nouveau Ticket
            </a>
            <a href="#" class="btn btn-secondary">
                <i class="fas fa-book"></i> Base de connaissances
            </a>
        </div>
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
                    +10%
                </div>
            </div>
            <div class="stat-value-enhanced">12</div>
            <div class="stat-label-enhanced">Tickets assignés</div>
            <div class="stat-sublabel">5 en cours de traitement</div>
        </div>
        
        <div class="stat-card-enhanced success">
            <div class="stat-header">
                <div class="stat-icon-enhanced stat-icon-success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    +7%
                </div>
            </div>
            <div class="stat-value-enhanced">8</div>
            <div class="stat-label-enhanced">Tickets résolus</div>
            <div class="stat-sublabel">Cette semaine: +4</div>
        </div>
        
        <div class="stat-card-enhanced warning">
            <div class="stat-header">
                <div class="stat-icon-enhanced stat-icon-warning">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-trend trend-down">
                    <i class="fas fa-arrow-down"></i>
                    -12%
                </div>
            </div>
            <div class="stat-value-enhanced">2h</div>
            <div class="stat-label-enhanced">Temps moyen</div>
            <div class="stat-sublabel">Réponse initiale</div>
        </div>
        
        <div class="stat-card-enhanced info">
            <div class="stat-header">
                <div class="stat-icon-enhanced stat-icon-info">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    +3%
                </div>
            </div>
            <div class="stat-value-enhanced">4.5/5</div>
            <div class="stat-label-enhanced">Satisfaction</div>
            <div class="stat-sublabel">Moyenne des évaluations</div>
        </div>
    </div>

    <!-- Grille de contenu principal -->
    <div class="main-grid">
        <!-- Colonne de gauche -->
        <div class="left-column">
            <!-- Tickets assignés -->
            <div class="modern-card">
                <div class="modern-card-header">
                    <div class="modern-card-title">
                        <div class="modern-card-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        Mes tickets récents
                    </div>
                    <a href="#" class="btn btn-secondary">
                        <i class="fas fa-eye"></i> Voir tout
                    </a>
                </div>
                <div class="modern-card-body">
                    <div class="tickets-list">
                        <a href="#" class="ticket-item-modern">
                            <div class="ticket-priority-bar priority-high"></div>
                            <div class="ticket-header-modern">
                                <div class="ticket-id-modern">#YT-0001</div>
                                <div class="ticket-status-modern status-new">
                                    <i class="fas fa-star"></i> Nouveau
                                </div>
                            </div>
                            <h3 class="ticket-title-modern">Problème de connexion</h3>
                            <p class="ticket-description-modern">
                                Impossible de se connecter à la plateforme depuis ce matin...
                            </p>
                            <div class="ticket-footer-modern">
                                <div class="ticket-client-modern">
                                    <div class="client-avatar-modern">
                                        JD
                                    </div>
                                    <div class="client-name-modern">Jean Dupont</div>
                                </div>
                                <div class="ticket-time-modern">il y a 2 heures</div>
                            </div>
                        </a>
                        <a href="#" class="ticket-item-modern">
                            <div class="ticket-priority-bar priority-medium"></div>
                            <div class="ticket-header-modern">
                                <div class="ticket-id-modern">#YT-0002</div>
                                <div class="ticket-status-modern status-open">
                                    <i class="fas fa-hourglass-half"></i> Ouvert
                                </div>
                            </div>
                            <h3 class="ticket-title-modern">Erreur lors du paiement</h3>
                            <p class="ticket-description-modern">
                                Un message d'erreur apparaît lors de la validation du paiement...
                            </p>
                            <div class="ticket-footer-modern">
                                <div class="ticket-client-modern">
                                    <div class="client-avatar-modern">
                                        ML
                                    </div>
                                    <div class="client-name-modern">Marie Leroy</div>
                                </div>
                                <div class="ticket-time-modern">il y a 1 jour</div>
                            </div>
                        </a>
                        <a href="#" class="ticket-item-modern">
                            <div class="ticket-priority-bar priority-low"></div>
                            <div class="ticket-header-modern">
                                <div class="ticket-id-modern">#YT-0003</div>
                                <div class="ticket-status-modern status-pending">
                                    <i class="fas fa-clock"></i> En attente
                                </div>
                            </div>
                            <h3 class="ticket-title-modern">Demande d'information</h3>
                            <p class="ticket-description-modern">
                                Je souhaite obtenir plus d'informations sur les fonctionnalités...
                            </p>
                            <div class="ticket-footer-modern">
                                <div class="ticket-client-modern">
                                    <div class="client-avatar-modern">
                                        AB
                                    </div>
                                    <div class="client-name-modern">Alice Bernard</div>
                                </div>
                                <div class="ticket-time-modern">il y a 3 jours</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="modern-card-footer">
                    Affichage de 3 tickets sur 12
                </div>
            </div>
        </div>

        <!-- Colonne de droite -->
        <div class="right-column">
            <!-- Mes indicateurs -->
            <div class="modern-card">
                <div class="modern-card-header">
                    <div class="modern-card-title">
                        <div class="modern-card-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        Mes indicateurs
                    </div>
                </div>
                <div class="modern-card-body">
                    <div class="metrics-list">
                        <div class="metric-item">
                            <div class="metric-header">
                                <span class="metric-label">Taux de résolution</span>
                                <span class="metric-value">85%</span>
                            </div>
                            <div class="metric-bar">
                                <div class="metric-fill metric-success" style="width: 85%"></div>
                            </div>
                        </div>
                        
                        <div class="metric-item">
                            <div class="metric-header">
                                <span class="metric-label">Tickets en retard</span>
                                <span class="metric-value">2</span>
                            </div>
                            <div class="metric-bar">
                                <div class="metric-fill metric-danger" style="width: 16.6%"></div>
                            </div>
                        </div>
                        
                        <div class="metric-item">
                            <div class="metric-header">
                                <span class="metric-label">Satisfaction client</span>
                                <span class="metric-value">4.5/5</span>
                            </div>
                            <div class="metric-bar">
                                <div class="metric-fill metric-info" style="width: 90%"></div>
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
                        <a href="#" class="quick-action-modern">
                            <div class="action-icon-modern stat-icon-primary">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="action-content-modern">
                                <div class="action-title-modern">Créer un ticket</div>
                                <div class="action-description-modern">Pour un client ou un problème technique</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow-modern"></i>
                        </a>
                        
                        <a href="#" class="quick-action-modern">
                            <div class="action-icon-modern stat-icon-success">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="action-content-modern">
                                <div class="action-title-modern">Base de connaissances</div>
                                <div class="action-description-modern">Solutions aux problèmes courants</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow-modern"></i>
                        </a>
                        
                        <a href="#" class="quick-action-modern">
                            <div class="action-icon-modern stat-icon-warning">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="action-content-modern">
                                <div class="action-title-modern">Tickets en attente</div>
                                <div class="action-description-modern">5 tickets nécessitent une action</div>
                            </div>
                            <i class="fas fa-chevron-right action-arrow-modern"></i>
                        </a>
                        
                        <a href="#" class="quick-action-modern">
                            <div class="action-icon-modern stat-icon-info">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <div class="action-content-modern">
                                <div class="action-title-modern">Mes statistiques</div>
                                <div class="action-description-modern">Voir mes performances détaillées</div>
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
<script src="/js/dashboardAgentIndex.js"></script>
@endsection