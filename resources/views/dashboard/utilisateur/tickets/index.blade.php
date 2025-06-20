@extends('layouts.user')

@section('title', 'Mes Tickets - YouTicket')
@section('page-title', 'Mes Tickets')
@section('page-subtitle', 'Consultez et gérez tous vos tickets de support')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboardUtilisateurTicketsIndex.css')}}">
@endsection

@section('content')
<div class="container">
    <!-- Filtres rapides -->
    <div class="quick-filters">
        <a href="#" class="quick-filter ">
            Tous les tickets
        </a>
        <a href="#" class="quick-filter ">
            Nouveaux
        </a>
        <a href="#" class="quick-filter ">
            En cours
        </a>
        <a href="#" class="quick-filter ">
            En attente
        </a>
        <a href="#" class="quick-filter ">
            Résolus
        </a>
    </div>

    <!-- Section des filtres -->
    <div class="filters-section">
        <form method="GET" action="#">
            <div class="filters-grid">
                <div class="filter-group">
                    <label class="filter-label">Rechercher</label>
                    <input type="text" name="search" class="filter-input" placeholder="Titre, description..." value="">
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">Statut</label>
                    <select name="status" class="filter-select">
                        <option value="">Tous les statuts</option>
                        <option value="nouveau" >Nouveau</option>
                        <option value="en-attente" >En attente</option>
                        <option value="en-cours" >En cours</option>
                        <option value="resolu" >Résolu</option>
                        <option value="ferme" >Fermé</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">Priorité</label>
                    <select name="priority" class="filter-select">
                        <option value="">Toutes les priorités</option>
                        <option value="immediat" >Immédiat</option>
                        <option value="urgent" >Urgent</option>
                        <option value="standard" >Standard</option>
                        <option value="faible" >Faible</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">Type</label>
                    <select name="type" class="filter-select">
                        <option value="">Tous les types</option>
                        <option value="incident" >Incident</option>
                        <option value="demande" >Demande de service</option>
                        <option value="probleme" >Problème</option>
                        <option value="changement" >Changement</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                        Filtrer
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Liste des tickets -->
    <div class="tickets-container">
        <div class="tickets-header">
            <div class="tickets-title">
                <div class="tickets-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div>
                    <h2>Mes Tickets</h2>
                    <p style="font-size: 0.875rem; color: var(--text-secondary); margin: 0;">
                        {{$tickets->count()}} ticket(s) trouvé(s)
                    </p>
                </div>
            </div>
            <a href="{{route('dashboard.utilisateur.tickets.create')}}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Nouveau ticket
            </a>
        </div>
        
        <div class="tickets-body">
            
                <div class="tickets-list">
                    @foreach($tickets as $ticket)
                        <div class="ticket-item">
                        <div class="ticket-header">
                            <div class="ticket-info">
                                <div class="ticket-id">{{$ticket->numero}}</div>
                                <h3 class="ticket-title">{{$ticket->titre}}</h3>
                                <div class="ticket-meta">
                                    {{-- ETAT --}}
                                    @if($ticket->etat->nom == 'En cours')
                                        <span class="ticket-badge badge-status-en-cours">{{$ticket->etat->nom}}</span>
                                    @elseif($ticket->etat->nom == 'Nouveau')
                                        <span class="ticket-badge badge-status-nouveau">{{$ticket->etat->nom}}</span>
                                    @elseif($ticket->etat->nom == 'En attente')
                                        <span class="ticket-badge badge-status-en-attente">{{$ticket->etat->nom}}</span>
                                    @elseif($ticket->etat->nom == 'Résolu')
                                        <span class="ticket-badge badge-status-resolu">{{$ticket->etat->nom}}</span>
                                    @elseif($ticket->etat->nom == 'Fermé')
                                         <span class="ticket-badge badge-status-ferme">{{$ticket->etat->nom}}</span>
                                    @endif

                                    {{-- PRIORITE --}}
                                    @if($ticket->priorite->nom == 'Critique')
                                        <span class="ticket-badge badge-priority-urgent">{{$ticket->priorite->nom}}</span>
                                    @elseif($ticket->priorite->nom == 'Haute')
                                        <span class="ticket-badge badge-priority-haute">{{$ticket->priorite->nom}}</span>
                                    @elseif($ticket->priorite->nom == 'Moyenne')
                                        <span class="ticket-badge badge-priority-standard">{{$ticket->priorite->nom}}</span>
                                    @elseif($ticket->priorite->nom == 'Basse')
                                        <span class="ticket-badge badge-priority-faible">{{$ticket->priorite->nom}}</span>
                                    @endif

                                    {{-- TYPE TICKET --}}
                                    @if($ticket->typeTicket->nom == 'Incident')
                                        <span class="ticket-badge" style="background: rgba(139, 92, 246, 0.2); color: #a78bfa;">{{$ticket->typeTicket->nom}}</span>
                                    @elseif($ticket->typeTicket->nom == 'Demande')
                                        <span class="ticket-badge" style="background: rgba(139, 92, 246, 0.2); color: #a78bfa;">{{$ticket->typeTicket->nom}}</span>
                                    @elseif($ticket->typeTicket->nom == 'Problème')
                                        <span class="ticket-badge" style="background: rgba(139, 92, 246, 0.2); color: #a78bfa;">{{$ticket->typeTicket->nom}}</span>
                                    @elseif($ticket->typeTicket->nom == 'Question')
                                        <span class="ticket-badge" style="background: rgba(139, 92, 246, 0.2); color: #a78bfa;">{{$ticket->typeTicket->nom}}</span>
                                    @endif

                                   
                                </div>
                            </div>
                        </div>
                        <div class="ticket-description">
                           {{$ticket->description}}
                        </div>
                        <div class="ticket-footer">
                            <div class="ticket-dates">
                                <div><strong>Créé:</strong> {{$ticket->created_at}}</div>
                                <div><strong>Mis à jour:</strong> {{$ticket->updated_at}}</div>
                                @if($ticket->assigne_a)
                                <div><strong>Assigné à:</strong> {{$ticket->assigne_a->prenom}} {{$ticket->assigne_a->nom}}</div>
                                @endif
                            </div>
                            <div class="ticket-actions">
                                <a href="{{route('dashboard.utilisateur.ticket.show', $ticket->id)}}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-eye"></i>
                                    Voir
                                </a>
                                @if($ticket->etat->nom != 'Fermé' && $ticket->etat->nom != 'Résolu' && $ticket->etat->nom != 'En cours')
                                <a href="{{route('dashboard.utilisateur.tickets.edit', $ticket->id)}}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-edit"></i>
                                    Modifier
                                </a>
                                @endif
                            </div>
                        </div>
                        </div>
                    @endforeach
                    
                </div>
                
                <!-- Pagination -->
                {{$tickets->links()}}
            
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/dashboardUtilisateurTicketsIndex.js')}}"></script>
@endsection
