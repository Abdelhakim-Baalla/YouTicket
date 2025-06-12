@extends('layouts.user')

@section('title', 'Tableau de Bord - YouTicket')
@section('page-title', 'Tableau de Bord')
@section('page-subtitle', 'Bienvenue sur votre espace personnel, Jean Dupont')

@section('styles')
<style>
    .stats-overview {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
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
        display: flex;
        flex-direction: column;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow);
    }
    
    .stat-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
    }
    
    .stat-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-secondary);
    }
    
    .stat-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }
    
    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .stat-description {
        font-size: 0.875rem;
        color: var(--text-muted);
    }
    
    .stat-trend {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }
    
    .trend-up {
        color: var(--success);
    }
    
    .trend-down {
        color: var(--danger);
    }
    
    .content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.5rem;
    }
    
    .content-card {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
    }
    
    .card-header {
        background: rgba(15, 23, 42, 0.9);
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .card-title {
        font-size: 1.125rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .card-icon {
        width: 32px;
        height: 32px;
        background: var(--gradient-primary);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .ticket-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .ticket-item {
        padding: 1rem;
        background: rgba(15, 23, 42, 0.5);
        border-radius: 12px;
        transition: all 0.2s ease;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        text-decoration: none;
        color: inherit;
    }
    
    .ticket-item:hover {
        background: rgba(15, 23, 42, 0.7);
        transform: translateY(-2px);
    }
    
    .ticket-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }
    
    .ticket-title {
        font-weight: 600;
        color: var(--text-primary);
        font-size: 1rem;
    }
    
    .ticket-id {
        font-family: 'Monaco', 'Menlo', monospace;
        font-size: 0.875rem;
        color: var(--primary-light);
    }
    
    .ticket-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    
    .ticket-badge {
        padding: 0.25rem 0.5rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .badge-status-new {
        background: rgba(99, 102, 241, 0.2);
        color: #818cf8;
        border: 1px solid rgba(99, 102, 241, 0.3);
    }
    
    .badge-status-in_progress {
        background: rgba(245, 158, 11, 0.2);
        color: #f59e0b;
        border: 1px solid rgba(245, 158, 11, 0.3);
    }
    
    .badge-status-waiting {
        background: rgba(245, 158, 11, 0.2);
        color: #f59e0b;
        border: 1px solid rgba(245, 158, 11, 0.3);
    }
    
    .badge-status-resolved {
        background: rgba(16, 185, 129, 0.2);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }
    
    .badge-status-closed {
        background: rgba(107, 114, 128, 0.2);
        color: #6b7280;
        border: 1px solid rgba(107, 114, 128, 0.3);
    }
    
    .badge-priority-urgent {
        background: rgba(220, 38, 38, 0.2);
        color: #ef4444;
        border: 1px solid rgba(220, 38, 38, 0.3);
    }
    
    .badge-priority-high {
        background: rgba(245, 158, 11, 0.2);
        color: #f59e0b;
        border: 1px solid rgba(245, 158, 11, 0.3);
    }
    
    .badge-priority-medium {
        background: rgba(59, 130, 246, 0.2);
        color: #3b82f6;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }
    
    .badge-priority-low {
        background: rgba(16, 185, 129, 0.2);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }
    
    .ticket-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.875rem;
        color: var(--text-muted);
    }
    
    .ticket-date {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .ticket-comments {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .action-card {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
        text-decoration: none;
        color: var(--text-primary);
    }
    
    .action-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow);
        background: rgba(8, 145, 178, 0.1);
        border-color: rgba(8, 145, 178, 0.3);
    }
    
    .action-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        color: white;
    }
    
    .action-title {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .action-description {
        font-size: 0.875rem;
        color: var(--text-secondary);
    }
    
    .knowledge-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .knowledge-item {
        padding: 0.75rem 1rem;
        background: rgba(15, 23, 42, 0.5);
        border-radius: 8px;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
        color: var(--text-secondary);
    }
    
    .knowledge-item:hover {
        background: rgba(15, 23, 42, 0.7);
        color: var(--text-primary);
    }
    
    .knowledge-icon {
        width: 32px;
        height: 32px;
        background: var(--gradient-primary);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-shrink: 0;
    }
    
    .knowledge-title {
        font-size: 0.875rem;
        font-weight: 500;
    }
    
    .activity-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .activity-item {
        display: flex;
        gap: 1rem;
    }
    
    .activity-line {
        position: relative;
        width: 24px;
        display: flex;
        justify-content: center;
    }
    
    .activity-line::before {
        content: '';
        position: absolute;
        top: 32px;
        bottom: 0;
        width: 2px;
        background: var(--border);
    }
    
    .activity-icon {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: var(--gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.75rem;
        z-index: 1;
    }
    
    .activity-content {
        flex: 1;
    }
    
    .activity-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.25rem;
    }
    
    .activity-title {
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.875rem;
    }
    
    .activity-time {
        font-size: 0.75rem;
        color: var(--text-muted);
    }
    
    .activity-description {
        font-size: 0.875rem;
        color: var(--text-secondary);
    }
    
    .activity-item:last-child .activity-line::before {
        display: none;
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
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }
    
    .btn-outline {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-primary);
    }
    
    .btn-outline:hover {
        background: rgba(30, 41, 59, 0.5);
    }
    
    .btn-sm {
        padding: 0.5rem 0.75rem;
        font-size: 0.75rem;
    }
    
    .view-all {
        display: block;
        text-align: center;
        padding: 0.75rem;
        color: var(--primary-light);
        text-decoration: none;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }
    
    .view-all:hover {
        background: rgba(8, 145, 178, 0.1);
    }
    
    @media (max-width: 1024px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
    }
    
    @media (max-width: 768px) {
        .stats-overview {
            grid-template-columns: 1fr;
        }
        
        .quick-actions {
            grid-template-columns: 1fr;
        }
    }
</style>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation des cartes de statistiques
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 50);
            }, index * 100);
        });
        
        // Animation des tickets
        const ticketItems = document.querySelectorAll('.ticket-item');
        ticketItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateX(-10px)';
            
            setTimeout(() => {
                item.style.transition = 'all 0.3s ease';
                item.style.opacity = '1';
                item.style.transform = 'translateX(0)';
            }, 500 + (index * 100));
        });
        
        // Animation des activités
        const activityItems = document.querySelectorAll('.activity-item');
        activityItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(10px)';
            
            setTimeout(() => {
                item.style.transition = 'all 0.3s ease';
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }, 800 + (index * 100));
        });
    });
</script>
@endsection
