@extends('layouts.admin')

@section('title', 'Créer un Utilisateur - YouTicket')
@section('page-title', 'Créer un Utilisateur')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboardAdminUtilisateursCreate.css')}}">
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
        <a href="{{ route('dashboard.admin.utilisateurs') }}">Utilisateurs</a>
        <i class="fas fa-chevron-right"></i>
        <span>Nouvel utilisateur</span>
    </nav>

    <div class="form-container">
        <div class="form-card">
            <div class="form-header">
                <div class="form-title">
                    <div class="form-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <span>Créer un nouvel utilisateur</span>
                </div>
                <a href="{{ route('dashboard.admin.utilisateurs') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Retour
                </a>
            </div>

            <div class="form-body">
                <form action="{{ route('dashboard.admin.utilisateurs.create.submit') }}" method="POST" enctype="multipart/form-data" id="createUserForm">
                    @csrf
                    
                    <!-- Informations personnelles -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-user"></i>
                            Informations personnelles
                        </h3>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="prenom" class="form-label required">Prénom</label>
                                <input type="text" 
                                       name="prenom" 
                                       id="prenom" 
                                       class="form-control @error('prenom') error @enderror" 
                                       value="{{ old('prenom') }}" 
                                       placeholder="Ex: Jean"
                                       required>
                                @error('prenom')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="nom" class="form-label required">Nom</label>
                                <input type="text" 
                                       name="nom" 
                                       id="nom" 
                                       class="form-control @error('nom') error @enderror" 
                                       value="{{ old('nom') }}" 
                                       placeholder="Ex: Dupont"
                                       required>
                                @error('nom')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="form-label required">Adresse email</label>
                                <input type="email" 
                                       name="email" 
                                       id="email" 
                                       class="form-control @error('email') error @enderror" 
                                       value="{{ old('email') }}" 
                                       placeholder="jean.dupont@entreprise.com"
                                       required>
                                @error('email')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form-help">L'email servira d'identifiant de connexion</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="tel" 
                                       name="telephone" 
                                       id="telephone" 
                                       class="form-control @error('telephone') error @enderror" 
                                       value="{{ old('telephone') }}" 
                                       placeholder="+33 1 23 45 67 89">
                                @error('telephone')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Sécurité -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-lock"></i>
                            Sécurité et accès
                        </h3>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="password" class="form-label required">Mot de passe</label>
                                <input type="password" 
                                       name="password" 
                                       id="password" 
                                       class="form-control @error('password') error @enderror" 
                                       placeholder="Minimum 8 caractères"
                                       required>
                                @error('password')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="password-strength" id="passwordStrength" style="display: none;">
                                    <div class="strength-bar">
                                        <div class="strength-fill" id="strengthFill"></div>
                                    </div>
                                    <div class="form-help" id="strengthText">Force du mot de passe</div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label required">Confirmer le mot de passe</label>
                                <input type="password" 
                                       name="password_confirmation" 
                                       id="password_confirmation" 
                                       class="form-control @error('password_confirmation') error @enderror" 
                                       placeholder="Retapez le mot de passe"
                                       required>
                                @error('password_confirmation')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="role_id" class="form-label required">Rôle</label>
                                <select name="role_id" 
                                        id="role_id" 
                                        class="form-control form-select @error('role_id') error @enderror" 
                                        required>
                                    <option value="">Sélectionner un rôle</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->nom }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form-help">Définit les permissions de l'utilisateur</div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Statut du compte</label>
                                <div class="radio-group">
                                    <div class="radio-item">
                                        <input type="radio" 
                                               name="actif" 
                                               id="actif_oui" 
                                               value="1" 
                                               class="radio-input" 
                                               {{ old('actif', '1') == '1' ? 'checked' : '' }}>
                                        <label for="actif_oui" class="form-label">✅ Actif</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" 
                                               name="actif" 
                                               id="actif_non" 
                                               value="0" 
                                               class="radio-input" 
                                               {{ old('actif') == '0' ? 'checked' : '' }}>
                                        <label for="actif_non" class="form-label">❌ Inactif</label>
                                    </div>
                                </div>
                                <div class="form-help">Un compte inactif ne peut pas se connecter</div>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Informations professionnelles -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-briefcase"></i>
                            Informations professionnelles
                        </h3>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="poste" class="form-label">Poste</label>
                                <input type="text" 
                                       name="poste" 
                                       id="poste" 
                                       class="form-control @error('poste') error @enderror" 
                                       value="{{ old('poste') }}" 
                                       placeholder="Ex: Développeur, Manager...">
                                @error('poste')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="departement" class="form-label">Département</label>
                                <select name="departement" 
                                        id="departement" 
                                        class="form-control form-select @error('departement') error @enderror">
                                    <option value="">Sélectionner un département</option>
                                    <option value="it" {{ old('departement') == 'it' ? 'selected' : '' }}>💻 IT</option>
                                    <option value="accounting" {{ old('departement') == 'accounting' ? 'selected' : '' }}>💰 Comptabilité</option>
                                    <option value="hr" {{ old('departement') == 'hr' ? 'selected' : '' }}>👥 Ressources Humaines</option>
                                    <option value="marketing" {{ old('departement') == 'marketing' ? 'selected' : '' }}>📈 Marketing</option>
                                    <option value="sales" {{ old('departement') == 'sales' ? 'selected' : '' }}>💼 Ventes</option>
                                    <option value="management" {{ old('departement') == 'management' ? 'selected' : '' }}>🏢 Direction</option>
                                </select>
                                @error('departement')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{-- defenir equipe a l'utilisateur --}}
                                <label for="equipe_id" class="form-label">Équipe</label>
                                <select name="equipe_id" 
                                        id="equipe_id" 
                                        class="form-control form-select @error('equipe_id') error @enderror">
                                    <option value="">Sélectionner une équipe</option>
                                    @foreach($equipes as $equipe)
                                        <option value="{{ $equipe->id }}" {{ old('equipe_id') == $equipe->id ? 'selected' : '' }}>
                                            {{ $equipe->nom }}
                                        </option>
                                    @endforeach
                                    </select>
                                @error('equipe_id')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form-help">Assigne l'utilisateur à une équipe spécifique</div>
                            </div>
                        </div>
                    </div>

                    <!-- Photo de profil -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-camera"></i>
                            Photo de profil
                        </h3>
                        
                        <div class="photo-upload">
                            <div class="photo-preview" id="photoPreview">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <label for="photo" class="upload-btn">
                                    <i class="fas fa-upload"></i>
                                    Choisir une photo
                                </label>
                                <input type="file" 
                                       name="photo" 
                                       id="photo" 
                                       accept="image/*" 
                                       style="display: none;">
                                <div class="form-help mt-2">PNG, JPG, GIF jusqu'à 2MB</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('dashboard.admin.utilisateurs') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            Annuler
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Créer l'utilisateur
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/dashboardAdminUtilisateursCreate.js')}}"></script>
@endsection
