@extends('layouts.admin')

@section('title', 'Créer une Équipe - YouTicket')
@section('page-title', 'Créer une Équipe')

@section('styles')
<style>
    .form-container {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .form-card {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
    }
    
    .form-header {
        background: rgba(15, 15, 35, 0.9);
        padding: 1.5rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .form-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.25rem;
        font-weight: 600;
    }
    
    .form-icon {
        width: 40px;
        height: 40px;
        background: var(--gradient-primary);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
    
    .form-body {
        padding: 2rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.875rem;
    }
    
    .form-label.required::after {
        content: ' *';
        color: #ef4444;
    }
    
    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        background: rgba(15, 15, 35, 0.5);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--text-primary);
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        background: rgba(15, 15, 35, 0.7);
    }
    
    .form-control::placeholder {
        color: var(--text-muted);
    }
    
    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }
    
    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        appearance: none;
    }
    
    .form-help {
        margin-top: 0.25rem;
        font-size: 0.75rem;
        color: var(--text-muted);
    }
    
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
        margin-top: 2rem;
    }
    
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
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
        transform: translateY(-1px);
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
    
    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
        font-size: 0.875rem;
        color: var(--text-muted);
    }
    
    .breadcrumb a {
        color: var(--primary-light);
        text-decoration: none;
    }
    
    .breadcrumb a:hover {
        text-decoration: underline;
    }
    
    .error-message {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
    }
    
    .form-control.error {
        border-color: #ef4444;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }
    
    @media (max-width: 768px) {
        .form-container {
            margin: 0;
        }
        
        .form-body {
            padding: 1.5rem;
        }
        
        .form-actions {
            flex-direction: column-reverse;
        }
        
        .btn {
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')
<div class="fade-in">
    <!-- Breadcrumb -->
    <nav class="breadcrumb">
        <a href="{{ route('dashboard.admin') }}">
            <i class="fas fa-home"></i>
            Dashboard
        </a>
        <i class="fas fa-chevron-right"></i>
        <a href="{{ route('dashboard.admin.equipes') }}">Équipes</a>
        <i class="fas fa-chevron-right"></i>
        <span>Nouvelle équipe</span>
    </nav>

    <div class="form-container">
        <div class="form-card">
            <div class="form-header">
                <div class="form-title">
                    <div class="form-icon">
                        <i class="fas fa-people-group"></i>
                    </div>
                    <span>Créer une nouvelle équipe</span>
                </div>
                <a href="{{ route('dashboard.admin.equipes') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Retour
                </a>
            </div>

            <div class="form-body">
                <form action="{{ route('dashboard.admin.equipes.store') }}" method="POST" id="createTeamForm">
                    @csrf
                    
                    <div class="form-group">
                        <label for="nom" class="form-label required">Nom de l'équipe</label>
                        <input type="text" 
                               name="nom" 
                               id="nom" 
                               class="form-control @error('nom') error @enderror" 
                               value="{{ old('nom') }}" 
                               placeholder="Ex: Équipe Support, Développement..."
                               required>
                        @error('nom')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Choisissez un nom descriptif pour votre équipe
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" 
                                  id="description" 
                                  class="form-control @error('description') error @enderror"
                                  placeholder="Décrivez le rôle et les responsabilités de cette équipe...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Description optionnelle des missions de l'équipe
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="active" class="form-label required">Statut initial</label>
                        <select name="active" 
                                id="active" 
                                class="form-control form-select @error('active') error @enderror" 
                                required>
                            <option value="1" {{ old('active', '1') == '1' ? 'selected' : '' }}>
                                ✅ Active - L'équipe peut recevoir des tickets
                            </option>
                            <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>
                                ❌ Inactive - L'équipe est désactivée
                            </option>
                        </select>
                        @error('active')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Une équipe active peut recevoir et traiter des tickets
                        </div>
                    </div>

                    {{-- modifer le responsable de l'equipe --}}
                    <div class="form-group">
                        <label for="responsable" class="form-label">Responsable de l'équipe</label>
                        <select name="responsable" 
                                id="responsable" 
                                class="form-control form-select @error('responsable') error @enderror">
                            <option value="">Aucun responsable</option>
                            @foreach($agents as $agent)
                                <option value="{{ $agent->id }}" 
                                        @if(old('responsable') == $agent->id) selected @endif
                                        @foreach($equipes as $equipe) 
                                        @if(!empty($agent->utilisateur->equipe_id) && $agent->utilisateur->equipe_id == $equipe->id) disabled @endif 
                                        @if(!empty($equipe->responsable) && $agent->id == $equipe->responsable) disabled @endif
                                        @endforeach
                                    >
                                    
                                    {{ $agent->utilisateur->prenom }} {{ $agent->utilisateur->nom }} ({{ $agent->utilisateur->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('responsable')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Sélectionnez un utilisateur pour être le responsable de cette équipe
                        </div>
                    </div>

                    {{-- Ajouter/Suppression d'agents dans l'équipe --}}
                    <div class="form-group">
                        <label class="form-label">Ajouter/Supprimer des agents</label>
    
                        <div class="agents-list">
                        @foreach($agents as $agent)
                            <div class="agent-item">
                                @if(!empty($equipe->responsable->id) && $agent->utilisateur_id == $equipe->responsable->id)
                                    <div class="agent-disabled">
                                        <input type="checkbox" 
                                               id="agent-{{ $agent->id }}" 
                                               disabled
                                               checked>
                                        <label for="agent-{{ $agent->id }}">
                                            {{ $agent->utilisateur->prenom }} {{ $agent->utilisateur->nom }} 
                                            ({{ $agent->utilisateur->email }}) - Responsable
                                        </label>
                                    </div>
                                @else
                                    <div class="agent-selectable">
                                        <input type="checkbox" 
                                               name="agents[]" 
                                               id="agent-{{ $agent->id }}" 
                                               value="{{ $agent->id }}"
                                               @if(!empty($agent->utilisateur->equipe_id)) checked disabled @endif>
                                        <label for="agent-{{ $agent->id }}" class="cursor-pointer @if(!empty($agent->utilisateur->equipe_id)) line-through cursor-not-allowed font-italic text-[15px] text-muted !important text-red-500 @endif">
                                            {{ $agent->utilisateur->prenom }} {{ $agent->utilisateur->nom }} 
                                            ({{ $agent->utilisateur->email }})
                                        </label>
                                        @if(!empty($agent->utilisateur->equipe_id)) <span class="text-muted text-[9px] text-gray-300">(Membre de l'équipe: {{ $agent->utilisateur->equipe->nom }})</span> @endif
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        </div>

                        @error('agents')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                        <div class="form-help">
                            Cochez les cases des agents à ajouter ou décochez pour supprimer de cette équipe
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('dashboard.admin.equipes') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            Annuler
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Créer l'équipe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Validation côté client
    document.getElementById('createTeamForm').addEventListener('submit', function(e) {
        const nom = document.getElementById('nom').value.trim();
        
        if (!nom) {
            e.preventDefault();
            alert('Le nom de l\'équipe est obligatoire.');
            document.getElementById('nom').focus();
            return false;
        }
        
        if (nom.length < 2) {
            e.preventDefault();
            alert('Le nom de l\'équipe doit contenir au moins 2 caractères.');
            document.getElementById('nom').focus();
            return false;
        }
    });

    // Auto-resize textarea
    const textarea = document.getElementById('description');
    textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    // Animation d'entrée
    document.addEventListener('DOMContentLoaded', function() {
        const formCard = document.querySelector('.form-card');
        formCard.style.opacity = '0';
        formCard.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            formCard.style.transition = 'all 0.5s ease';
            formCard.style.opacity = '1';
            formCard.style.transform = 'translateY(0)';
        }, 100);
    });
</script>
@endsection
