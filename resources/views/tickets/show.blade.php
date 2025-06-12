@extends('layouts.user')

@section('title', 'Ticket #1234 - YouTicket')
@section('page-title', 'Détails du Ticket')
@section('page-subtitle', 'Ticket #1234 - Problème de connexion à l\'application CRM')

@section('styles')
<style>
    .ticket-container {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }
    
    .ticket-main {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
    }
    
    .ticket-sidebar {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .ticket-header {
        background: rgba(15, 15, 35, 0.9);
        padding: 2rem;
        border-bottom: 1px solid var(--border);
    }
    
    .ticket-id {
        font-family: 'Monaco', 'Menlo', monospace;
        font-size: 0.875rem;
        color: var(--primary-light);
        margin-bottom: 0.5rem;
    }
    
    .ticket-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 1rem;
    }
    
    .ticket-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
    }
    
    .ticket-badge {
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-size: 0.875rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .badge-status-nouveau { background: rgba(59, 130, 246, 0.2); color: #60a5fa; }
    .badge-status-en-attente { background: rgba(245, 158, 11, 0.2); color: #fbbf24; }
    .badge-status-en-cours { background: rgba(16, 185, 129, 0.2); color: #34d399; }
    .badge-status-resolu { background: rgba(34, 197, 94, 0.2); color: #4ade80; }
    .badge-status-ferme { background: rgba(107, 114, 128, 0.2); color: #9ca3af; }
    
    .badge-priority-immediat { background: rgba(239, 68, 68, 0.2); color: #f87171; }
    .badge-priority-urgent { background: rgba(245, 101, 101, 0.2); color: #fca5a5; }
    .badge-priority-standard { background: rgba(59, 130, 246, 0.2); color: #60a5fa; }
    .badge-priority-faible { background: rgba(107, 114, 128, 0.2); color: #9ca3af; }
    
    .ticket-content {
        padding: 2rem;
    }
    
    .content-section {
        margin-bottom: 2rem;
    }
    
    .content-section:last-child {
        margin-bottom: 0;
    }
    
    .section-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .section-icon {
        width: 20px;
        height: 20px;
        color: var(--primary);
    }
    
    .ticket-description {
        background: rgba(15, 23, 42, 0.5);
        padding: 1.5rem;
        border-radius: 12px;
        line-height: 1.6;
        color: var(--text-secondary);
        white-space: pre-wrap;
    }
    
    .attachments-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1rem;
    }
    
    .attachment-item {
        background: rgba(15, 23, 42, 0.5);
        padding: 1rem;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
    }
    
    .attachment-item:hover {
        background: rgba(15, 23, 42, 0.7);
        transform: translateY(-2px);
    }
    
    .attachment-icon {
        width: 40px;
        height: 40px;
        background: var(--gradient-primary);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }
    
    .attachment-info {
        flex: 1;
        min-width: 0;
    }
    
    .attachment-name {
        font-weight: 500;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .attachment-size {
        font-size: 0.75rem;
        color: var(--text-secondary);
    }
    
    .info-card {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 1.5rem;
    }
    
    .info-card-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .info-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .info-label {
        font-weight: 500;
        color: var(--text-secondary);
        min-width: 100px;
    }
    
    .info-value {
        color: var(--text-primary);
        text-align: right;
        flex: 1;
    }
    
    .comments-section {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
    }
    
    .comments-header {
        background: rgba(15, 15, 35, 0.9);
        padding: 1.5rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: between;
    }
    
    .comments-title {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1.125rem;
        font-weight: 600;
    }
    
    .comments-body {
        padding: 1.5rem;
        max-height: 400px;
        overflow-y: auto;
    }
    
    .comments-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .comment-item {
        background: rgba(15, 23, 42, 0.5);
        padding: 1rem;
        border-radius: 12px;
    }
    
    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.75rem;
    }
    
    .comment-author {
        font-weight: 500;
        color: var(--text-primary);
    }
    
    .comment-date {
        font-size: 0.75rem;
        color: var(--text-secondary);
    }
    
    .comment-content {
        color: var(--text-secondary);
        line-height: 1.5;
        white-space: pre-wrap;
    }
    
    .comment-form {
        padding: 1.5rem;
        border-top: 1px solid var(--border);
        background: rgba(15, 15, 35, 0.5);
    }
    
    .form-group {
        margin-bottom: 1rem;
    }
    
    .form-label {
        display: block;
        font-weight: 500;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }
    
    .form-textarea {
        width: 100%;
        padding: 0.75rem;
        background: rgba(15, 15, 35, 0.5);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--text-primary);
        font-size: 0.875rem;
        resize: vertical;
        min-height: 100px;
        transition: all 0.3s ease;
    }
    
    .form-textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.1);
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
    
    .btn-secondary {
        background: rgba(71, 85, 105, 0.8);
        color: var(--text-primary);
        border: 1px solid var(--border);
    }
    
    .btn-secondary:hover {
        background: rgba(71, 85, 105, 1);
    }
    
    .btn-danger {
        background: rgba(239, 68, 68, 0.2);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    
    .btn-danger:hover {
        background: rgba(239, 68, 68, 0.3);
    }
    
    .actions-bar {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 1.5rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .empty-state {
        text-align: center;
        padding: 2rem;
        color: var(--text-secondary);
    }
    
    .empty-icon {
        width: 60px;
        height: 60px;
        background: rgba(71, 85, 105, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        color: var(--text-secondary);
    }
    
    @media (max-width: 1024px) {
        .ticket-container {
            grid-template-columns: 1fr;
        }
        
        .ticket-sidebar {
            order: -1;
        }
    }
    
    @media (max-width: 768px) {
        .ticket-header {
            padding: 1.5rem;
        }
        
        .ticket-content {
            padding: 1.5rem;
        }
        
        .ticket-badges {
            flex-direction: column;
        }
        
        .actions-bar {
            flex-direction: column;
        }
        
        .attachments-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <!-- Barre d'actions -->
    <div class="actions-bar">
        <a href="#" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Retour à la liste
        </a>
        
        
            <a href="#" class="btn btn-primary">
                <i class="fas fa-edit"></i>
                Modifier le ticket
            </a>
        
        
        <button onclick="window.print()" class="btn btn-secondary">
            <i class="fas fa-print"></i>
            Imprimer
        </button>
        
        <button onclick="shareTicket()" class="btn btn-secondary">
            <i class="fas fa-share"></i>
            Partager
        </button>
    </div>

    <div class="ticket-container">
        <!-- Contenu principal du ticket -->
        <div class="ticket-main">
            <!-- En-tête du ticket -->
            <div class="ticket-header">
                <div class="ticket-id">#1234</div>
                <h1 class="ticket-title">Problème de connexion à l'application CRM</h1>
                <div class="ticket-badges">
                    <span class="ticket-badge badge-status-en-cours">
                        <i class="fas fa-circle"></i>
                        En cours
                    </span>
                    <span class="ticket-badge badge-priority-urgent">
                        <i class="fas fa-flag"></i>
                        Urgent
                    </span>
                    <span class="ticket-badge" style="background: rgba(139, 92, 246, 0.2); color: #a78bfa;">
                        <i class="fas fa-tag"></i>
                        Incident
                    </span>
                    <span class="ticket-badge" style="background: rgba(16, 185, 129, 0.2); color: #34d399;">
                        <i class="fas fa-layer-group"></i>
                        Moyen
                    </span>
                </div>
            </div>
            
            <!-- Contenu du ticket -->
            <div class="ticket-content">
                <!-- Description -->
                <div class="content-section">
                    <h3 class="section-title">
                        <i class="fas fa-align-left section-icon"></i>
                        Description
                    </h3>
                    <div class="ticket-description">L'application CRM est inaccessible depuis ce matin. Plusieurs utilisateurs sont impactés et ne peuvent pas accéder à leurs données. Veuillez intervenir rapidement.</div>
                </div>
                
                <!-- Pièces jointes -->
                
                    <div class="content-section">
                        <h3 class="section-title">
                            <i class="fas fa-paperclip section-icon"></i>
                            Pièces jointes (0)
                        </h3>
                        <div class="attachments-grid">
                            
                        </div>
                    </div>
                
            </div>
        </div>
        
        <!-- Sidebar avec informations -->
        <div class="ticket-sidebar">
            <!-- Informations du ticket -->
            <div class="info-card">
                <h3 class="info-card-title">
                    <i class="fas fa-info-circle"></i>
                    Informations
                </h3>
                <div class="info-list">
                    <div class="info-item">
                        <span class="info-label">Projet:</span>
                        <span class="info-value">Projet Alpha</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Type:</span>
                        <span class="info-value">Incident</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Impact:</span>
                        <span class="info-value">Moyen</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Fréquence:</span>
                        <span class="info-value">Ponctuel</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Priorité:</span>
                        <span class="info-value">Urgent</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Statut:</span>
                        <span class="info-value">En cours</span>
                    </div>
                </div>
            </div>
            
            <!-- Dates importantes -->
            <div class="info-card">
                <h3 class="info-card-title">
                    <i class="fas fa-calendar"></i>
                    Dates
                </h3>
                <div class="info-list">
                    <div class="info-item">
                        <span class="info-label">Créé le:</span>
                        <span class="info-value">20/05/2025 à 09:15</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Mis à jour:</span>
                        <span class="info-value">21/05/2025 à 10:00</span>
                    </div>
                    
                        <div class="info-item">
                            <span class="info-label">Affecté le:</span>
                            <span class="info-value">20/05/2025 à 10:00</span>
                        </div>
                    
                </div>
            </div>
            
            <!-- Assignation -->
            <div class="info-card">
                <h3 class="info-card-title">
                    <i class="fas fa-user"></i>
                    Assignation
                </h3>
                <div class="info-list">
                    <div class="info-item">
                        <span class="info-label">Créé par:</span>
                        <span class="info-value">John Doe</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Assigné à:</span>
                        <span class="info-value">Jane Smith</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Section des commentaires -->
    <div class="comments-section">
        <div class="comments-header">
            <h3 class="comments-title">
                <i class="fas fa-comments"></i>
                Commentaires et Historique
            </h3>
        </div>
        
        <div class="comments-body">
            
                <div class="comments-list">
                    
                        <div class="comment-item">
                            <div class="comment-header">
                                <span class="comment-author">John Doe</span>
                                <span class="comment-date">20/05/2025 à 09:30</span>
                            </div>
                            <div class="comment-content">J'ai créé ce ticket pour signaler un problème de connexion.</div>
                        </div>
                    
                        <div class="comment-item">
                            <div class="comment-header">
                                <span class="comment-author">Jane Smith</span>
                                <span class="comment-date">20/05/2025 à 10:00</span>
                            </div>
                            <div class="comment-content">Je suis en train d'investiguer le problème.</div>
                        </div>
                    
                </div>
            
            
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-comment"></i>
                    </div>
                    <p>Aucun commentaire pour le moment</p>
                </div>
            
        </div>
        
        <!-- Formulaire d'ajout de commentaire -->
        <div class="comment-form">
            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="comment" class="form-label">Ajouter un commentaire</label>
                    <textarea name="comment" id="comment" class="form-textarea" placeholder="Décrivez votre problème, posez une question ou ajoutez des informations supplémentaires..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i>
                    Envoyer le commentaire
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function shareTicket() {
        if (navigator.share) {
            navigator.share({
                title: 'Ticket #1234 - Problème de connexion à l\'application CRM',
                text: 'Consultez ce ticket de support',
                url: window.location.href
            });
        } else {
            // Fallback: copier l'URL dans le presse-papiers
            navigator.clipboard.writeText(window.location.href).then(function() {
                alert('Lien copié dans le presse-papiers !');
            });
        }
    }
    
    // Auto-resize textarea
    document.getElementById('comment').addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });
    
    // Confirmation avant suppression (si applicable)
    function confirmDelete() {
        return confirm('Êtes-vous sûr de vouloir supprimer ce ticket ? Cette action est irréversible.');
    }
</script>
@endsection
