@extends('layouts.admin')

@section('title', 'Modifier l\'Équipe - YouTicket')
@section('page-title', 'Modifier l\'Équipe')

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
        background: var(--gradient-accent);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
    
    .form-body {
        padding: 2rem;
    }
    
    .team-info {
        background: rgba(99, 102, 241, 0.1);
        border: 1px solid rgba(99, 102, 241, 0.2);
        border-radius: 12px;
        padding: 1rem;
        margin-bottom: 2rem;
    }
    
    .team-meta {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        font-size: 0.875rem;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-secondary);
    }
    
    .meta-value {
        color: var(--text-primary);
        font-weight: 500;
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
        justify-content: space-between;
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
        background: var(--gradient-accent);
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
    
    .btn-danger {
        background: var(--gradient-warning);
        color: white;
    }
    
    .btn-danger:hover {
        transform: translateY(-1px);
        box-shadow: var(--shadow);
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
    
    .status-indicator {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
    }
    
    .status-active {
        background: rgba(5, 150, 105, 0.2);
        color: #10b981;
        border: 1px solid rgba(5, 150, 105, 0.3);
    }
    
    .status-inactive {
        background: rgba(220, 38, 38, 0.2);
        color: #ef4444;
        border: 1px solid rgba(220, 38, 38, 0.3);
    }
    
    @media (max-width: 768px) {
        .form-container {
            margin: 0;
        }
        
        .form-body {
            padding: 1.5rem;
        }
        
        .form-actions {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .btn {
            justify-content: center;
        }
        
        .team-meta {
            grid-template-columns: 1fr;
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
        <span>Modifier {{ $equipe->nom }}</span>
    </nav>

    <div class="form-container">
        <div class="form-card">
            <div class="form-header">
                <div class="form-title">
                    <div class="form-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <span>Modifier l'équipe</span>
                </div>
                <a href="{{ route('dashboard.admin.equipes') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Retour
                </a>
            </div>

            <div class="form-body">
                <!-- Informations actuelles -->
                <div class="team-info">
                    <h3 class="text-lg font-semibold mb-3 flex items-center gap-2">
                        <i class="fas fa-info-circle"></i>
                        Informations actuelles
                    </h3>
                    <div class="team-meta">
                        <div class="meta-item">
                            <i class="fas fa-hashtag"></i>
                            <span>ID:</span>
                            <span class="meta-value">#{{ str_pad($equipe->id, 3, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar-plus"></i>
                            <span>Créée le:</span>
                            <span class="meta-value">{{ $equipe->created_at->format('d/m/Y à H:i') }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-clock"></i>
                            <span>Modifiée le:</span>
                            <span class="meta-value">{{ $equipe->updated_at->format('d/m/Y à H:i') }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-users"></i>
                            <span>Membres:</span>
                            <span class="meta-value">{{ $equipe->utilisateurs->count() }} membre(s)</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-toggle-on"></i>
                            <span>Statut actuel:</span>
                            <span class="status-indicator {{ $equipe->active ? 'status-active' : 'status-inactive' }}">
                                <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                {{ $equipe->active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>

                <form action="{{ route('dashboard.admin.equipes.update', $equipe->id) }}" method="POST" id="editTeamForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="nom" class="form-label required">Nom de l'équipe</label>
                        <input type="text" 
                               name="nom" 
                               id="nom" 
                               class="form-control @error('nom') error @enderror" 
                               value="{{ old('nom', $equipe->nom) }}" 
                               placeholder="Ex: Équipe Support, Développement..."
                               required>
                        @error('nom')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Modifiez le nom de votre équipe si nécessaire
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" 
                                  id="description" 
                                  class="form-control @error('description') error @enderror"
                                  placeholder="Décrivez le rôle et les responsabilités de cette équipe...">{{ old('description', $equipe->description) }}</textarea>
                        @error('description')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Description des missions de l'équipe
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="active" class="form-label required">Statut</label>
                        <select name="active" 
                                id="active" 
                                class="form-control form-select @error('active') error @enderror" 
                                required>
                            <option value="1" {{ old('active', $equipe->active) == '1' ? 'selected' : '' }}>
                                ✅ Active - L'équipe peut recevoir des tickets
                            </option>
                            <option value="0" {{ old('active', $equipe->active) == '0' ? 'selected' : '' }}>
                                ❌ Inactive - L'équipe est désactivée
                            </option>
                        </select>
                        @error('active')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Une équipe inactive ne peut plus recevoir de nouveaux tickets
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="flex gap-2">
                            <a href="{{ route('dashboard.admin.equipes') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i>
                                Annuler
                            </a>
                            <a href="{{ route('dashboard.admin.equipes.show', $equipe->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                                Voir détails
                            </a>
                        </div>
                        
                        <div class="flex gap-2">
                            <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                                <i class="fas fa-trash"></i>
                                Supprimer
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                Enregistrer les modifications
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Formulaire de suppression caché -->
                <form id="deleteForm" action="" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Validation côté client
    document.getElementById('editTeamForm').addEventListener('submit', function(e) {
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

    // Confirmation de suppression
    function confirmDelete() {
        if (confirm('⚠️ ATTENTION !\n\nÊtes-vous sûr de vouloir supprimer cette équipe ?\n\nCette action est irréversible et supprimera :\n- L\'équipe "{{ $equipe->nom }}"\n- Tous les liens avec les membres\n- L\'historique associé\n\nTapez "SUPPRIMER" pour confirmer :')) {
            const confirmation = prompt('Tapez "SUPPRIMER" pour confirmer la suppression :');
            if (confirmation === 'SUPPRIMER') {
                document.getElementById('deleteForm').submit();
            } else {
                alert('Suppression annulée.');
            }
        }
    }

    // Auto-resize textarea
    const textarea = document.getElementById('description');
    textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    // Détection des changements
    let originalData = {
        nom: document.getElementById('nom').value,
        description: document.getElementById('description').value,
        active: document.getElementById('active').value
    };

    function hasChanges() {
        return (
            document.getElementById('nom').value !== originalData.nom ||
            document.getElementById('description').value !== originalData.description ||
            document.getElementById('active').value !== originalData.active
        );
    }

    // Avertissement avant de quitter si des changements non sauvegardés
    window.addEventListener('beforeunload', function(e) {
        if (hasChanges()) {
            e.preventDefault();
            e.returnValue = '';
        }
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
