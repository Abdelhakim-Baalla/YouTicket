@extends('layouts.user')

@section('title', 'Mes Tickets - YouTicket')
@section('page-title', 'Mes Tickets')
@section('page-subtitle', 'Consultez et gérez tous vos tickets de support')

@section('styles')
<style>
    .filters-section {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .filters-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        align-items: end;
    }
    
    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .filter-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-primary);
    }
    
    .filter-input, .filter-select {
        padding: 0.75rem 1rem;
        background: rgba(15, 15, 35, 0.5);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--text-primary);
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }
    
    .filter-input:focus, .filter-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.1);
    }
    
    .filter-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        appearance: none;
    }
    
    .quick-filters {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        margin-bottom: 1rem;
    }
    
    .quick-filter {
        padding: 0.5rem 1rem;
        background: rgba(30, 41, 59, 0.5);
        border: 1px solid var(--border);
        border-radius: 20px;
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 0.75rem;
        transition: all 0.3s ease;
    }
    
    .quick-filter:hover, .quick-filter.active {
        background: var(--gradient-primary);
        color: white;
        transform: translateY(-1px);
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
    
    .btn-sm {
        padding: 0.5rem 0.75rem;
        font-size: 0.75rem;
    }
    
    .tickets-container {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
    }
    
    .tickets-header {
        background: rgba(15, 15, 35, 0.9);
        padding: 1.5rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .tickets-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.25rem;
        font-weight: 600;
    }
    
    .tickets-icon {
        width: 40px;
        height: 40px;
        background: var(--gradient-primary);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
    
    .tickets-body {
        padding: 1.5rem;
    }
    
    .tickets-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .ticket-item {
        padding: 1.25rem;
        background: rgba(15, 23, 42, 0.5);
        border-radius: 12px;
        transition: all 0.2s ease;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .ticket-item:hover {
        background: rgba(15, 23, 42, 0.7);
        transform: translateY(-2px);
    }
    
    .ticket-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .ticket-info {
        flex: 1;
    }
    
    .ticket-id {
        font-family: 'Monaco', 'Menlo', monospace;
        font-size: 0.875rem;
        color: var(--primary-light);
        margin-bottom: 0.25rem;
    }
    
    .ticket-title {
        font-weight: 600;
        color: var(--text-primary);
        font-size: 1.125rem;
        margin-bottom: 0.5rem;
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
        font-weight: 500;
    }
    
    .badge-status-nouveau { background: rgba(59, 130, 246, 0.2); color: #60a5fa; }
    .badge-status-en-attente { background: rgba(245, 158, 11, 0.2); color: #fbbf24; }
    .badge-status-en-cours { background: rgba(16, 185, 129, 0.2); color: #34d399; }
    .badge-status-resolu { background: rgba(34, 197, 94, 0.2); color: #4ade80; }
    .badge-status-ferme { background: rgba(107, 114, 128, 0.2); color: #9ca3af; }
    
    .badge-priority-immediat { background: rgba(239, 68, 68, 0.2); color: #f87171; }
    .badge-priority-urgent { background: rgba(245, 101, 101, 0.2); color: #fca5a5; }
    .badge-priority-standard { background: rgba(59, 130, 246, 0.2); color: #60a5fa; }
    .badge-priority-haute { background: rgba(234, 230, 19, 0.9); color: #000000; }
    .badge-priority-faible { background: rgba(107, 114, 128, 0.2); color: #9ca3af; }
    
    .ticket-description {
        color: var(--text-secondary);
        font-size: 0.875rem;
        line-height: 1.5;
        margin-bottom: 1rem;
    }
    
    .ticket-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        padding-top: 1rem;
        border-top: 1px solid var(--border);
    }
    
    .ticket-dates {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
        font-size: 0.75rem;
        color: var(--text-secondary);
    }
    
    .ticket-actions {
        display: flex;
        gap: 0.5rem;
    }
    
    .empty-state {
        text-align: center;
        padding: 3rem 1.5rem;
        color: var(--text-secondary);
    }
    
    .empty-icon {
        width: 80px;
        height: 80px;
        background: rgba(71, 85, 105, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 2rem;
        color: var(--text-secondary);
    }
    
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin-top: 2rem;
    }
    
    .pagination-btn {
        padding: 0.5rem 0.75rem;
        background: rgba(30, 41, 59, 0.8);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--text-primary);
        text-decoration: none;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }
    
    .pagination-btn:hover {
        background: var(--gradient-primary);
        color: white;
    }
    
    .pagination-btn.active {
        background: var(--gradient-primary);
        color: white;
    }
    
    .pagination-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    @media (max-width: 768px) {
        .filters-grid {
            grid-template-columns: 1fr;
        }
        
        .ticket-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .ticket-footer {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .quick-filters {
            justify-content: center;
        }
    }
</style>
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
<script>
    // Auto-submit form on filter change
    document.querySelectorAll('.filter-select').forEach(select => {
        select.addEventListener('change', function() {
            this.closest('form').submit();
        });
    });
    
    // Clear filters
    function clearFilters() {
        window.location.href = '#';
    }
    
    // Add clear filters button if there are active filters
    
        document.addEventListener('DOMContentLoaded', function() {
            const filtersGrid = document.querySelector('.filters-grid');
            const clearBtn = document.createElement('div');
            clearBtn.className = 'filter-group';
            clearBtn.innerHTML = '<button type="button" class="btn btn-secondary" onclick="clearFilters()"><i class="fas fa-times"></i> Effacer</button>';
            filtersGrid.appendChild(clearBtn);
        });
    
</script>
@endsection
