@extends('layouts.user')

@section('title', 'Modifier Ticket - YouTicket')
@section('page-title', 'Modifier Ticket')
@section('page-subtitle', 'Modifiez les détails de votre ticket')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboardUtilisateurTicketsCreate.css')}}">
@endsection

@section('content')
<div class="container">
    <!-- Étapes de progression -->
    <div class="progress-steps">
        <div class="step active">
            <div class="step-icon">
                <i class="fas fa-edit"></i>
            </div>
            Modification du ticket
        </div>
    </div>

    <!-- Formulaire de modification -->
    <div class="form-container">
        <div class="form-header">
            <div class="form-icon">
                <i class="fas fa-edit"></i>
            </div>
            <h1 class="form-title">Modifier le ticket #{{ $ticket->id }}</h1>
            <p class="form-subtitle">Mettez à jour les informations de votre ticket pour une meilleure assistance</p>
        </div>
        
        <div class="form-body">
            <form action="{{ route('dashboard.utilisateur.tickets.edit.store', $ticket->id) }}" method="POST" enctype="multipart/form-data" id="ticketForm">
                @csrf
                @method('PUT')
                
                <!-- Informations de base -->
                <div class="form-grid">
                    <div class="form-group">
                        <label for="projet" class="form-label">
                            <i class="fas fa-folder"></i>
                            Projet
                        </label>
                        <select name="projet" id="projet" class="form-select">
                            <option value="">Sélectionner un projet</option>
                           @foreach($projets as $projet)
                           <option value="{{$projet->id}}" {{ $ticket->projet_id == $projet->id ? 'selected' : '' }}>{{$projet->nom}}</option>
                           @endforeach
                        </select>
                        <div class="form-help">Choisissez le projet concerné par votre demande</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="type" class="form-label">
                            <i class="fas fa-tag"></i>
                            Type <span class="required">*</span>
                        </label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="">Sélectionner un type</option>
                            @foreach($typeTickets as $type)
                           <option value="{{$type->id}}" {{ $ticket->type_ticket_id == $type->id ? 'selected' : '' }}>{{$type->nom}}</option>
                           @endforeach
                        </select>
                        <div class="form-help">Précisez la nature de votre demande</div>
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="titre" class="form-label">
                            <i class="fas fa-heading"></i>
                            Titre <span class="required">*</span>
                        </label>
                        <input type="text" name="titre" id="titre" class="form-input" placeholder="Résumé court et précis du problème" value="{{ $ticket->titre }}" required>
                        <div class="form-help">Décrivez brièvement votre problème en quelques mots</div>
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="description" class="form-label">
                            <i class="fas fa-align-left"></i>
                            Description détaillée <span class="required">*</span>
                        </label>
                        <textarea name="description" id="description" class="form-textarea" placeholder="Décrivez votre problème en détail : que s'est-il passé ? quand ? dans quelles circonstances ? quelles sont les conséquences ?" required>{{ $ticket->description }}</textarea>
                        <div class="form-help">Plus vous donnez de détails, plus nous pourrons vous aider efficacement</div>
                    </div>
                </div>
                
                <!-- Priorité -->
                <div class="form-group full-width">
                    <label class="form-label">
                        <i class="fas fa-flag"></i>
                        Priorité <span class="required">*</span>
                    </label>
                    <div class="priority-grid">
                        @foreach($priorites as $priorite)
                            @if($priorite->nom == 'Critique')
                                 <div class="priority-option priority-immediat">
                                    <input type="radio" name="priorite" value="{{$priorite->id}}" id="priority-immediat" class="priority-input" required {{ $ticket->priorite_id == $priorite->id ? 'checked' : '' }}>
                                    <label for="priority-immediat" class="priority-label">
                                        <div class="priority-icon">
                                            <i class="fas fa-exclamation"></i>
                                        </div>
                                        <div class="priority-text">Critique</div>
                                    </label>
                                </div>
                            @elseif($priorite->nom == 'Haute')
                                 <div class="priority-option priority-urgent">
                                    <input type="radio" name="priorite" value="{{$priorite->id}}" id="priority-urgent" class="priority-input" {{ $ticket->priorite_id == $priorite->id ? 'checked' : '' }}>
                                    <label for="priority-urgent" class="priority-label">
                                        <div class="priority-icon">
                                            <i class="fas fa-arrow-up"></i>
                                        </div>
                                        <div class="priority-text">Haute</div>
                                    </label>
                                </div>
                            @elseif($priorite->nom == 'Moyenne')
                                <div class="priority-option priority-standard">
                                    <input type="radio" name="priorite" value="{{$priorite->id}}" id="priority-standard" class="priority-input" {{ $ticket->priorite_id == $priorite->id ? 'checked' : '' }}>
                                    <label for="priority-standard" class="priority-label">
                                        <div class="priority-icon">
                                            <i class="fas fa-minus"></i>
                                        </div>
                                        <div class="priority-text">Moyenne</div>
                                    </label>
                                </div>
                            @else    
                                <div class="priority-option priority-faible">
                                    <input type="radio" name="priorite" value="{{$priorite->id}}" id="priority-faible" class="priority-input" {{ $ticket->priorite_id == $priorite->id ? 'checked' : '' }}>
                                    <label for="priority-faible" class="priority-label">
                                        <div class="priority-icon">
                                            <i class="fas fa-arrow-down"></i>
                                        </div>
                                        <div class="priority-text">Basse</div>
                                    </label>
                                </div>   
                            @endif
                        @endforeach
                    </div>
                    <div class="form-help">Évaluez l'urgence de votre demande</div>
                </div>
                
                <!-- Impact et Fréquence -->
                <div class="form-grid">
                    <div class="form-group">
                        <label for="etat" class="form-label">
                            <i class="fas fa-layer-group"></i>
                            Etat <span class="required">*</span>
                        </label>
                        <select name="etat" id="etat" class="form-select" required>
                            <option value="">Sélectionner l'etat</option>
                           @foreach($etats as $etat)
                           <option value="{{$etat->id}}" {{ $ticket->etat_id == $etat->id ? 'selected' : '' }}>{{$etat->nom}}</option>
                           @endforeach
                        </select>
                        <div class="form-help">Quel est l'etat sur votre travail ?</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="frequence" class="form-label">
                            <i class="fas fa-sync"></i>
                            Fréquence <span class="required">*</span>
                        </label>
                        <select name="frequence" id="frequence" class="form-select" required>
                            <option value="">Sélectionner la fréquence</option>
                            @foreach($frequences as $frequence)
                            <option value="{{$frequence->id}}" {{ $ticket->frequence_id == $frequence->id ? 'selected' : '' }}>{{$frequence->nom}}</option>
                            @endforeach
                        </select>
                        <div class="form-help">À quelle fréquence le problème survient-il ?</div>
                    </div>
                </div>

                <!-- Assigne a-->
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="assigne_a_id" class="form-label">
                            <i class="fa-solid fa-user-tie"></i>
                            Assigné à <span class="required">*</span>
                        </label>
                        <select name="assigne_a_id" id="assigne_a_id" class="form-select" required>
                            <option value="">Sélectionner l'expert</option>
                           @foreach($experts as $expert)
                           <option value="{{$expert->id}}" {{ $ticket->assigne_a_id == $expert->id ? 'selected' : '' }}> {{$expert->utilisateur->prenom}} {{$expert->utilisateur->nom}} @if($expert->utilisateur->poste)({{$expert->utilisateur->poste}})@endif</option>
                           @endforeach
                        </select>
                        <div class="form-help">Séléctionnez l'expert assigné</div>
                    </div>
                </div>

                <!-- SLA-->
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="sla" class="form-label">
                            <i class="fa-solid fa-handshake"></i>
                            SLA (Service Level Agreement) <span class="required">*</span>
                        </label>
                        <select name="sla" id="sla" class="form-select" required>
                            <option value="">Sélectionner le type de contrat</option>
                           @foreach($slas as $sla)
                           <option value="{{$sla->id}}" {{ $ticket->sla_id == $sla->id ? 'selected' : '' }}> {{$sla->nom}} ({{$sla->description}})</option>
                           @endforeach
                        </select>
                        <div class="form-help">Choisir votre Service Level Agreement</div>
                    </div>
                </div>
                
                <!-- Pièces jointes existantes -->
               
                @if($ticket->pieceJointes)
                    @if($ticket->pieceJointes->count() > 0)
                    <div class="form-group full-width" id="pieceJointeActuelle">
                    <label class="form-label">
                        <i class="fas fa-paperclip"></i>
                        Pièces jointes actuelles
                    </label>
                    <div class="file-list">
                        @foreach($ticket->pieceJointes as $pieceJointe)
                        <div class="file-item">
                            <div class="file-info">
                                <div class="file-icon">
                                    <i class="fas fa-file"></i>
                                </div>
                                <div class="file-details">
                                    <div class="file-name">{{ $pieceJointe->nom_original}}</div>
                                    <div class="file-size">{{ ($pieceJointe->taille) }}</div>
                                </div>
                            </div>
                            <a href="{{ route('dashboard.utilisateur.tickets.pieces-jointes.supprimer', ['ticket' => $ticket->id, 'pieceJointe' => $pieceJointe->id]) }}" class="file-remove" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fichier ?')">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    </div>
                    @endif
                @endif
                
                <!-- Nouvelle pièce jointe -->
               <!-- Pièces jointes -->
<div class="form-group full-width">
    <label class="form-label">
        <i class="fas fa-paperclip"></i>
        Pièces jointes
    </label>
    <div class="file-upload" id="fileUpload">
        <input type="file" name="pieces_jointes[]" id="fileInput" class="file-upload-input" multiple 
               accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.txt,.zip,.mp4,.mp3,.xls,.xlsx,.ppt,.pptx">
        <div class="file-upload-icon">
            <i class="fas fa-cloud-upload-alt"></i>
        </div>
        <div class="file-upload-text">
            <div class="file-upload-title">Glissez vos fichiers ici ou cliquez pour parcourir</div>
            <div>Formats acceptés: Images, Documents, PDF, Audio, Vidéo (max 10MB par fichier)</div>
        </div>
    </div>
    <div class="file-list" id="fileList"></div>
    <div class="preview-container" id="previewContainer"></div>
    <div class="form-help">Ajoutez des captures d'écran, documents ou fichiers qui peuvent aider à résoudre votre problème</div>
</div>
                
                <!-- Actions -->
                <div class="form-actions">
                    <a href="{{ route('dashboard.utilisateur.ticket.show', $ticket->id) }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Annuler
                    </a>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-save"></i>
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/dashboardUtilisateurTicketsCreate.js')}}"></script>
<script src="{{asset('js/dashboardUtilisateurTicketsEdit.js')}}"></script>
@endsection