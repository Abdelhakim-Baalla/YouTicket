@extends('layouts.admin')

@section('title', 'Créer une Équipe - YouTicket')
@section('page-title', 'Créer une Équipe')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboardAdminEquipesCreate.css')}}">
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
                        <label for="email" class="form-label required">Email de l'équipe</label>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               class="form-control @error('email') error @enderror" 
                               value="{{ old('email') }}" 
                               placeholder="Ex: equipe@example.com"
                               >
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Choisissez un email unique pour votre équipe
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="telephone" class="form-label required">Telephone de l'équipe</label>
                        <input type="text" 
                               name="telephone" 
                               id="telephone" 
                               class="form-control @error('telephone') error @enderror" 
                               value="{{ old('telephone') }}" 
                               placeholder="Ex: +212X XXX XXX XX"
                               >
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Choisissez un numéro de telephone pour votre équipe
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="specialite" class="form-label required">Spécialité de l'équipe</label>
                        <input type="text" 
                               name="specialite" 
                               id="specialite" 
                               class="form-control @error('specialite') error @enderror" 
                               value="{{ old('specialite') }}" 
                               placeholder="Ex: Front-end"
                               >
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="form-help">
                            Choisissez une spécialité pour votre équipe
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
<script src="{{asset('js/dashboardAdminEquipesCreate.js')}}"></script>
@endsection
