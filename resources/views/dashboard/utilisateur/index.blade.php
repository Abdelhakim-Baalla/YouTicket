@extends('layouts.user')

@section('title', 'Tableau de Bord - YouTicket')
@section('page-title', 'Tableau de Bord')
@section('page-subtitle', 'Bienvenue sur votre espace personnel, Jean Dupont')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboardUtilisateurIndex.js')}}">
@endsection

@section('content')
<div class="fade-in">
    <!-- Statistiques rapides -->
    <div class="stats-overview">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-title">Tickets actifs</div>
                <div class="stat-icon" style="background: var(--gradient-primary);">
                    <i class="fas fa-ticket-alt"></i>
                </div>
            </div>
            <div class="stat-value">5</div>
            <div class="stat-description">Tickets en cours de traitement</div>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>2 nouveaux cette semaine</span>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-title">Tickets résolus</div>
                <div class="stat-icon" style="background: var(--gradient-success);">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="stat-value">12</div>
            <div class="stat-description">Tickets résolus avec succès</div>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>3 ce mois-ci</span>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-title">Temps de réponse moyen</div>
                <div class="stat-icon" style="background: var(--gradient-accent);">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
            <div class="stat-value">4h</div>
            <div class="stat-description">Délai moyen de première réponse</div>
            <div class="stat-trend trend-down">
                <i class="fas fa-arrow-down"></i>
                <span>30 min de moins que le mois dernier</span>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-title">Satisfaction</div>
                <div class="stat-icon" style="background: var(--gradient-warning);">
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="stat-value">4.8/5</div>
            <div class="stat-description">Note moyenne de satisfaction</div>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>+0.2 depuis le dernier trimestre</span>
            </div>
        </div>
    </div>

    <!-- Actions rapides -->
    <div class="quick-actions">
        <a href="" class="action-card">
            <div class="action-icon">
                <i class="fas fa-plus"></i>
            </div>
            <h3 class="action-title">Créer un ticket</h3>
            <p class="action-description">Signaler un problème ou faire une demande</p>
        </a>
        
        <a href="" class="action-card">
            <div class="action-icon" style="background: var(--gradient-accent);">
                <i class="fas fa-book"></i>
            </div>
            <h3 class="action-title">Base de connaissances</h3>
            <p class="action-description">Consultez nos guides et solutions</p>
        </a>
        
        <a href="" class="action-card">
            <div class="action-icon" style="background: var(--gradient-success);">
                <i class="fas fa-list"></i>
            </div>
            <h3 class="action-title">Mes tickets</h3>
            <p class="action-description">Voir tous vos tickets et leur statut</p>
        </a>
    </div>

    <div class="content-grid">
        <!-- Tickets récents -->
        <div class="content-card">
            <div class="card-header">
                <div class="card-title">
                    <div class="card-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <span>Tickets récents</span>
                </div>
                <a href="" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                    Nouveau ticket
                </a>
            </div>
            <div class="card-body">
                <div class="ticket-list">
                    <a href="" class="ticket-item">
                        <div class="ticket-header">
                            <div class="ticket-title">Problème de connexion à l'application CRM</div>
                            <div class="ticket-id">#1234</div>
                        </div>
                        <div class="ticket-meta">
                            <span class="ticket-badge badge-status-in_progress">
                                <i class="fas fa-spinner"></i>
                                En cours
                            </span>
                            <span class="ticket-badge badge-priority-high">
                                <i class="fas fa-arrow-up"></i>
                                Haute
                            </span>
                        </div>
                        <div class="ticket-footer">
                            <div class="ticket-date">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Créé le 20/05/2025</span>
                            </div>
                            <div class="ticket-comments">
                                <i class="fas fa-comment"></i>
                                <span>3 commentaires</span>
                            </div>
                        </div>
                    </a>
                    
                    <a href="" class="ticket-item">
                        <div class="ticket-header">
                            <div class="ticket-title">Demande d'accès au module de facturation</div>
                            <div class="ticket-id">#1235</div>
                        </div>
                        <div class="ticket-meta">
                            <span class="ticket-badge badge-status-waiting">
                                <i class="fas fa-clock"></i>
                                En attente
                            </span>
                            <span class="ticket-badge badge-priority-medium">
                                <i class="fas fa-minus"></i>
                                Moyenne
                            </span>
                        </div>
                        <div class="ticket-footer">
                            <div class="ticket-date">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Créé le 18/05/2025</span>
                            </div>
                            <div class="ticket-comments">
                                <i class="fas fa-comment"></i>
                                <span>1 commentaire</span>
                            </div>
                        </div>
                    </a>
                    
                    <a href="" class="ticket-item">
                        <div class="ticket-header">
                            <div class="ticket-title">Erreur lors de la génération des rapports mensuels</div>
                            <div class="ticket-id">#1236</div>
                        </div>
                        <div class="ticket-meta">
                            <span class="ticket-badge badge-status-resolved">
                                <i class="fas fa-check"></i>
                                Résolu
                            </span>
                            <span class="ticket-badge badge-priority-urgent">
                                <i class="fas fa-exclamation-circle"></i>
                                Urgent
                            </span>
                        </div>
                        <div class="ticket-footer">
                            <div class="ticket-date">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Créé le 15/05/2025</span>
                            </div>
                            <div class="ticket-comments">
                                <i class="fas fa-comment"></i>
                                <span>5 commentaires</span>
                            </div>
                        </div>
                    </a>
                </div>
                
                <a href="" class="view-all">
                    Voir tous mes tickets
                    <i class="fas fa-chevron-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar-content">
            <!-- Activité récente -->
            <div class="content-card mb-6">
                <div class="card-header">
                    <div class="card-title">
                        <div class="card-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <span>Activité récente</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-line">
                                <div class="activity-icon" style="background: var(--gradient-success);">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                            <div class="activity-content">
                                <div class="activity-header">
                                    <div class="activity-title">Ticket résolu</div>
                                    <div class="activity-time">Il y a 2h</div>
                                </div>
                                <div class="activity-description">
                                    Votre ticket <strong>#1236</strong> a été marqué comme résolu par Martin Dupont.
                                </div>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-line">
                                <div class="activity-icon" style="background: var(--gradient-primary);">
                                    <i class="fas fa-comment"></i>
                                </div>
                            </div>
                            <div class="activity-content">
                                <div class="activity-header">
                                    <div class="activity-title">Nouveau commentaire</div>
                                    <div class="activity-time">Il y a 5h</div>
                                </div>
                                <div class="activity-description">
                                    Sophie Martin a commenté sur votre ticket <strong>#1234</strong>.
                                </div>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-line">
                                <div class="activity-icon" style="background: var(--gradient-warning);">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <div class="activity-content">
                                <div class="activity-header">
                                    <div class="activity-title">Statut mis à jour</div>
                                    <div class="activity-time">Il y a 1j</div>
                                </div>
                                <div class="activity-description">
                                    Le statut de votre ticket <strong>#1235</strong> a été changé à "En attente".
                                </div>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-line">
                                <div class="activity-icon" style="background: var(--gradient-accent);">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <div class="activity-content">
                                <div class="activity-header">
                                    <div class="activity-title">Ticket créé</div>
                                    <div class="activity-time">Il y a 3j</div>
                                </div>
                                <div class="activity-description">
                                    Vous avez créé un nouveau ticket <strong>#1234</strong>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Articles de la base de connaissances -->
            <div class="content-card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="card-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <span>Articles populaires</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="knowledge-list">
                        <a href="#" class="knowledge-item">
                            <div class="knowledge-icon">
                                <i class="fas fa-key"></i>
                            </div>
                            <div class="knowledge-title">Comment réinitialiser votre mot de passe</div>
                        </a>
                        
                        <a href="#" class="knowledge-item">
                            <div class="knowledge-icon">
                                <i class="fas fa-sync"></i>
                            </div>
                            <div class="knowledge-title">Résoudre les problèmes de synchronisation</div>
                        </a>
                        
                        <a href="#" class="knowledge-item">
                            <div class="knowledge-icon">
                                <i class="fas fa-file-export"></i>
                            </div>
                            <div class="knowledge-title">Exporter vos données au format Excel</div>
                        </a>
                        
                        <a href="#" class="knowledge-item">
                            <div class="knowledge-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="knowledge-title">Sécuriser votre compte avec l'authentification à deux facteurs</div>
                        </a>
                    </div>
                    
                    <a href="" class="view-all">
                        Explorer la base de connaissances
                        <i class="fas fa-chevron-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/dashboardUtilisateursIndex.js')}}"></script>
@endsection
