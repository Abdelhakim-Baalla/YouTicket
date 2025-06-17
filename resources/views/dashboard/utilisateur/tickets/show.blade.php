@extends('layouts.user')

@section('title', $ticket->numero . ' - YouTicket')
@section('page-title', 'Détails du Ticket')
@section('page-subtitle', $ticket->numero . ' - ' . $ticket->titre)

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboardUtilisateurTicketShow.css')}}">
@endsection

@section('content')
<div class="container">
    <!-- Barre d'actions -->
    <div class="actions-bar">
        <a href="{{route('dashboard.utilisateur.tickets')}}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Retour à la liste
        </a>
        
        
            <a href="{{route('dashboard.utilisateur.tickets.edit', $ticket->id)}}" class="btn btn-primary">
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
                <div class="ticket-id">{{$ticket->numero}}</div>
                <h1 class="ticket-title">{{$ticket->titre}}</h1>
                <div class="ticket-badges">
                    <span class="ticket-badge badge-status-{{ str_replace(' ', '-', strtolower($ticket->etat->nom)) }}">
                        <i class="fas fa-circle"></i>
                        {{$ticket->etat->nom}}
                    </span>
                    <span class="ticket-badge badge-priority-{{ str_replace(' ', '-', strtolower($ticket->priorite->nom)) }}">
                        <i class="fas fa-flag"></i>
                        {{$ticket->priorite->nom}}
                    </span>
                    <span class="ticket-badge" style="background: rgba(139, 92, 246, 0.2); color: #a78bfa;">
                        <i class="fas fa-tag"></i>
                        {{$ticket->typeTicket->nom}}
                    </span>
                    {{-- <span class="ticket-badge" style="background: rgba(16, 185, 129, 0.2); color: #34d399;">
                        <i class="fas fa-layer-group"></i>
                        Moyen
                    </span> --}}
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
                    <div class="ticket-description">{{$ticket->description}}</div>
                </div>
                
                <!-- Pièces jointes -->
                
                    <div class="content-section">
                        <h3 class="section-title">
                            <i class="fas fa-paperclip section-icon"></i>
                            Pièces jointes ({{$ticket->pieceJointes->count()}})
                        </h3>
                        <div class="attachments-grid">
                            @if($ticket->pieceJointes->isEmpty())
                            <p>Aucun Piece Jointe</p>
                            @else
                            {{$ticket->pieceJointes[0]}}
                            @endif
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
                    @if($ticket->projet)
                    <div class="info-item">
                        <span class="info-label">Projet:</span>
                        <span class="info-value">{{$ticket->projet->nom}}</span>
                    </div>
                    @endif

                    @if($ticket->typeTicket)
                    <div class="info-item">
                        <span class="info-label">Type:</span>
                        <span class="info-value">{{$ticket->typeTicket->nom}}</span>
                    </div>
                    @endif

                     @if($ticket->frequence)
                    <div class="info-item">
                        <span class="info-label">Fréquence:</span>
                        <span class="info-value">{{$ticket->frequence->nom}}</span>
                    </div>
                    @endif

                    @if($ticket->priorite)
                    <div class="info-item">
                        <span class="info-label">Priorité:</span>
                        <span class="info-value">{{$ticket->priorite->nom}}</span>
                    </div>
                    @endif

                    @if($ticket->etat)
                    <div class="info-item">
                        <span class="info-label">Statut:</span>
                        <span class="info-value">{{$ticket->etat->nom}}</span>
                    </div>
                    @endif
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
                        <span class="info-value">{{$ticket->created_at}}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Mis à jour:</span>
                        <span class="info-value">{{$ticket->updated_at}}</span>
                    </div>
                    @if(!empty($ticket->date_resolution))
                    <div class="info-item">
                        <span class="info-label">Résolu le:</span>
                        <span class="info-value">{{$ticket->date_resolution}}</span>
                    </div>
                    @endif
                    
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
                        <span class="info-value">{{$ticket->cree_par->prenom}} {{$ticket->cree_par->nom}}</span>
                    </div>
                    @if($ticket->assigne_a)
                    <div class="info-item">
                        <span class="info-label">Assigné à:</span>
                        <span class="info-value">{{$ticket->assigne_a->prenom}} {{$ticket->assigne_a->nom}}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Section des commentaires -->
    <div class="comments-section" id="comments-section">
        <div class="comments-header">
            <h3 class="comments-title">
                <i class="fas fa-comments"></i>
                Commentaires et Historique
            </h3>
        </div>
        
        <div class="comments-body">
            @if(!$commentaires->isEmpty())
                <div class="comments-list">
                    @foreach($commentaires as $commentaire)
                        <div class="comment-item">
                            <div class="comment-header">
                                <div class="comment-author-info">
                                    <div class="comment-avatar">
                                        <img src="{{asset('storage/'. $commentaire->utilisateur->photo)}}" alt="John Doe">
                                    </div>
                                    <div class="comment-user-details">
                                        <span class="comment-author">{{$commentaire->utilisateur->prenom}} {{$commentaire->utilisateur->nom}}</span>
                                        @if($commentaire->utilisateur->role->nom == 'admin')
                                        <span class="comment-role" style="color: rgb(255, 238, 0);"><i class="fas fa-shield"></i> Admin</span>
                                        @else
                                        <span class="comment-role">{{$commentaire->utilisateur->poste}}</span>
                                        @endif
                                    </div>
                                </div>
                                <span class="comment-date">{{$commentaire->created_at}}</span>
                            </div>
                            
                            <div class="comment-content">{{$commentaire->contenu}}</div>
                        </div>
                    @endforeach
                </div>
            
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-comment"></i>
                    </div>
                    <p>Aucun commentaire pour le moment</p>
                </div>
            @endif
            
        </div>
        
        <!-- Formulaire d'ajout de commentaire -->
        <div class="comment-form">
            <form action="{{route('dashboard.utilisateur.ticket.show.comment.store', $ticket->id)}}" method="POST">
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
<script src="{{asset('js/dashboardUtilisateurTicketsShow.js')}}"></script>
@endsection
