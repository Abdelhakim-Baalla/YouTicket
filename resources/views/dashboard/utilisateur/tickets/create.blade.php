@extends('layouts.user')

@section('title', 'Créer un Ticket - YouTicket')
@section('page-title', 'Nouveau Ticket')
@section('page-subtitle', 'Créez un nouveau ticket de support')

@section('styles')
<style>
    .form-container {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
        margin-bottom: 2rem;
    }
    
    .form-header {
        background: rgba(15, 15, 35, 0.9);
        padding: 2rem;
        border-bottom: 1px solid var(--border);
        text-align: center;
    }
    
    .form-icon {
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
    
    .form-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }
    
    .form-subtitle {
        color: var(--text-secondary);
        font-size: 0.875rem;
    }
    
    .form-body {
        padding: 2rem;
    }
    
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .form-group.full-width {
        grid-column: 1 / -1;
    }
    
    .form-label {
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .form-label .required {
        color: #f87171;
    }
    
    .form-input, .form-select, .form-textarea {
        padding: 0.75rem 1rem;
        background: rgba(15, 15, 35, 0.5);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--text-primary);
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }
    
    .form-input:focus, .form-select:focus, .form-textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.1);
        background: rgba(15, 15, 35, 0.7);
    }
    
    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        appearance: none;
    }
    
    .form-textarea {
        resize: vertical;
        min-height: 120px;
    }
    
    .form-help {
        font-size: 0.75rem;
        color: var(--text-secondary);
        margin-top: 0.25rem;
    }
    
    .form-error {
        font-size: 0.75rem;
        color: #f87171;
        margin-top: 0.25rem;
    }
    
    .file-upload {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        border: 2px dashed var(--border);
        border-radius: 12px;
        background: rgba(15, 23, 42, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .file-upload:hover {
        border-color: var(--primary);
        background: rgba(15, 23, 42, 0.5);
    }
    
    .file-upload.dragover {
        border-color: var(--primary);
        background: rgba(8, 145, 178, 0.1);
    }
    
    .file-upload-input {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
    }
    
    .file-upload-icon {
        width: 48px;
        height: 48px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        font-size: 1.25rem;
        color: white;
    }
    
    .file-upload-text {
        text-align: center;
        color: var(--text-secondary);
    }
    
    .file-upload-title {
        font-weight: 500;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
    }
    
    .file-list {
        margin-top: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .file-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.75rem;
        background: rgba(15, 23, 42, 0.5);
        border-radius: 8px;
    }
    
    .file-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .file-icon {
        width: 32px;
        height: 32px;
        background: var(--gradient-primary);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.875rem;
    }
    
    .file-details {
        display: flex;
        flex-direction: column;
    }
    
    .file-name {
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.875rem;
    }
    
    .file-size {
        font-size: 0.75rem;
        color: var(--text-secondary);
    }
    
    .file-remove {
        padding: 0.25rem;
        background: rgba(239, 68, 68, 0.2);
        border: none;
        border-radius: 4px;
        color: #f87171;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .file-remove:hover {
        background: rgba(239, 68, 68, 0.3);
    }
    
    .priority-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 0.75rem;
    }
    
    .priority-option {
        position: relative;
    }
    
    .priority-input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }
    
    .priority-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1rem 0.75rem;
        background: rgba(15, 23, 42, 0.5);
        border: 1px solid var(--border);
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }
    
    .priority-input:checked + .priority-label {
        border-color: var(--primary);
        background: rgba(8, 145, 178, 0.1);
    }
    
    .priority-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }
    
    .priority-immediat .priority-icon { background: rgba(239, 68, 68, 0.2); color: #f87171; }
    .priority-urgent .priority-icon { background: rgba(245, 101, 101, 0.2); color: #fca5a5; }
    .priority-standard .priority-icon { background: rgba(59, 130, 246, 0.2); color: #60a5fa; }
    .priority-faible .priority-icon { background: rgba(107, 114, 128, 0.2); color: #9ca3af; }
    
    .priority-text {
        font-size: 0.75rem;
        font-weight: 500;
        color: var(--text-primary);
    }
    
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
    }
    
    .btn {
        padding: 0.75rem 1.5rem;
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
    
    .progress-steps {
        display: flex;
        justify-content: center;
        margin-bottom: 2rem;
    }
    
    .step {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(30, 41, 59, 0.8);
        border: 1px solid var(--border);
        border-radius: 20px;
        font-size: 0.875rem;
        color: var(--text-secondary);
    }
    
    .step.active {
        background: var(--gradient-primary);
        color: white;
    }
    
    .step-icon {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
    }
    
    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .priority-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .form-body {
            padding: 1.5rem;
        }
        
        .form-header {
            padding: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <!-- Étapes de progression -->
    <div class="progress-steps">
        <div class="step active">
            <div class="step-icon">
                <i class="fas fa-edit"></i>
            </div>
            Création du ticket
        </div>
    </div>

    <!-- Formulaire de création -->
    <div class="form-container">
        <div class="form-header">
            <div class="form-icon">
                <i class="fas fa-plus"></i>
            </div>
            <h1 class="form-title">Créer un nouveau ticket</h1>
            <p class="form-subtitle">Décrivez votre problème ou votre demande en détail pour obtenir une assistance rapide</p>
        </div>
        
        <div class="form-body">
            <form action="{{route('dashboard.utilisateur.tickets.create.store')}}" method="POST" enctype="multipart/form-data" id="ticketForm">
                @csrf
                
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
                           <option value="{{$projet->id}}">{{$projet->nom}}</option>
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
                           <option value="{{$type->id}}">{{$type->nom}}</option>
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
                        <input type="text" name="titre" id="titre" class="form-input" placeholder="Résumé court et précis du problème" required>
                        <div class="form-help">Décrivez brièvement votre problème en quelques mots</div>
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="description" class="form-label">
                            <i class="fas fa-align-left"></i>
                            Description détaillée <span class="required">*</span>
                        </label>
                        <textarea name="description" id="description" class="form-textarea" placeholder="Décrivez votre problème en détail : que s'est-il passé ? quand ? dans quelles circonstances ? quelles sont les conséquences ?" required></textarea>
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
                                    <input type="radio" name="priorite" value="{{$priorite->id}}" id="priority-immediat" class="priority-input" required>
                                    <label for="priority-immediat" class="priority-label">
                                        <div class="priority-icon">
                                            <i class="fas fa-exclamation"></i>
                                        </div>
                                        <div class="priority-text">Critique</div>
                                    </label>
                                </div>
                            @elseif($priorite->nom == 'Haute')
                                 <div class="priority-option priority-urgent">
                                    <input type="radio" name="priorite" value="{{$priorite->id}}" id="priority-urgent" class="priority-input">
                                    <label for="priority-urgent" class="priority-label">
                                        <div class="priority-icon">
                                            <i class="fas fa-arrow-up"></i>
                                        </div>
                                        <div class="priority-text">Haute</div>
                                    </label>
                                </div>
                            @elseif($priorite->nom == 'Moyenne')
                                <div class="priority-option priority-standard">
                                    <input type="radio" name="priorite" value="{{$priorite->id}}" id="priority-standard" class="priority-input">
                                    <label for="priority-standard" class="priority-label">
                                        <div class="priority-icon">
                                            <i class="fas fa-minus"></i>
                                        </div>
                                        <div class="priority-text">Moyenne</div>
                                    </label>
                                </div>
                            @else    
                                <div class="priority-option priority-faible">
                                    <input type="radio" name="priorite" value="{{$priorite->id}}" id="priority-faible" class="priority-input">
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
                           <option value="{{$etat->id}}">{{$etat->nom}}</option>
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
                            <option value="{{$frequence->id}}">{{$frequence->nom}}</option>
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
                           <option value="{{$expert->id}}"> {{$expert->utilisateur->prenom}} {{$expert->utilisateur->nom}} @if($expert->utilisateur->poste)({{$expert->utilisateur->poste}})@endif</option>
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
                           <option value="{{$sla->id}}"> {{$sla->nom}} ({{$sla->description}})</option>
                           @endforeach
                        </select>
                        <div class="form-help">Choisir votre Service Level Agreement</div>
                    </div>
                </div>
                
                <!-- Pièces jointes -->
                <div class="form-group full-width">
                    <label class="form-label">
                        <i class="fas fa-paperclip"></i>
                        Pièces jointes
                    </label>
                    <div class="file-upload" id="fileUpload">
                        <input type="file" name="pieces_jointes[]" id="fileInput" class="file-upload-input" multiple accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.txt,.zip">
                        <div class="file-upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="file-upload-text">
                            <div class="file-upload-title">Glissez vos fichiers ici ou cliquez pour parcourir</div>
                            <div>Formats acceptés: JPG, PNG, PDF, DOC, TXT, ZIP (max 10MB par fichier)</div>
                        </div>
                    </div>
                    <div class="file-list" id="fileList"></div>
                    <div class="form-help">Ajoutez des captures d'écran, documents ou fichiers qui peuvent aider à résoudre votre problème</div>
                </div>
                
                <!-- Actions -->
                <div class="form-actions">
                    <a href="{{route('dashboard.utilisateur.tickets')}}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Annuler
                    </a>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-paper-plane"></i>
                        Créer le ticket
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/dashboardUtilisateurTicketsCreate.js')}}"></script>
@endsection
