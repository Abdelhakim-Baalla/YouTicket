@extends('layouts.admin')

@section('title', 'Modifier l\'Équipe - YouTicket')
@section('page-title', 'Modifier l\'Équipe')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboardAdminEquipesEdit.css')}}">
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
                        <label for="email" class="form-label required">Email de l'équipe</label>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               class="form-control @error('email') error @enderror" 
                               value="{{ old('email', $equipe->email) }}" 
                               placeholder="Ex: equipe@example.com"
                               >
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Modifiez l'email' de votre équipe si nécessaire
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telephone" class="form-label required">Telephone de l'équipe</label>
                        <input type="text" 
                               name="telephone" 
                               id="telephone" 
                               class="form-control @error('telephone') error @enderror" 
                               value="{{ old('telephone', $equipe->telephone) }}" 
                               placeholder="Ex: +212X XXX XXX X"
                               >
                        @error('telephone')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Modifiez le numéro de telephone de votre équipe si nécessaire
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="specialite" class="form-label required">Spécialité de l'équipe</label>
                        <input type="text" 
                               name="specialite" 
                               id="specialite" 
                               class="form-control @error('specialite') error @enderror" 
                               value="{{ old('specialite', $equipe->specialite) }}" 
                               placeholder="Ex: Front-end"
                               >
                        @error('specialite')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Modifiez la Spécialité de votre équipe si nécessaire
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
                    {{-- modifer le responsable de l'equipe --}}
                    <div class="form-group">
                        <label for="responsable" class="form-label">Responsable de l'équipe</label>
                        <select name="responsable" 
                                id="responsable" 
                                class="form-control form-select @error('responsable') error @enderror">
                            <option value="">Aucun responsable</option>
                            @foreach($agents as $agent)
                                <option value="{{ $agent->id }}" 
                                    @if(!@empty($equipe->responsable->id)) 
                                        {{ $agent->utilisateur_id == $equipe->responsable->id ? 'selected' : '' }}
                                    @endif>

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
                                               @if(!empty($agent->utilisateur->equipe_id) && $agent->utilisateur->equipe_id != $equipe->id) checked disabled @endif
                                               @if(!empty($agent->utilisateur->equipe_id) && $agent->utilisateur->equipe_id == $equipe->id) checked @endif
                                               @if($equipe->utilisateurs->contains($agent->utilisateur_id)) checked @endif>
                                        <label for="agent-{{ $agent->id }}" class="cursor-pointer @if(!empty($agent->utilisateur->equipe_id) && $agent->utilisateur->equipe_id != $equipe->id) line-through cursor-not-allowed font-italic text-[15px] text-muted !important text-red-500 @endif">
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
                <form id="deleteForm" action="{{ route('dashboard.admin.equipes.delete', $equipe->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/dashboardAdminEquipesEdit.js')}}"></script>
@endsection
