@extends('layouts.admin')

@section('title', 'Créer un Utilisateur - YouTicket')
@section('page-title', 'Créer un Utilisateur')

@section('styles')
<style>
    .form-container {
        max-width: 900px;
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
    
    .form-section {
        margin-bottom: 2rem;
    }
    
    .section-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid var(--border);
    }
    
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }
    
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .form-label {
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.875rem;
    }
    
    .form-label.required::after {
        content: ' *';
        color: #ef4444;
    }
    
    .form-control {
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
    
    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        appearance: none;
    }
    
    .form-help {
        font-size: 0.75rem;
        color: var(--text-muted);
    }
    
    .photo-upload {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .photo-preview {
        width: 80px;
        height: 80px;
        border-radius: 12px;
        background: rgba(15, 15, 35, 0.5);
        border: 2px dashed var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-muted);
        font-size: 2rem;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .photo-preview:hover {
        border-color: var(--primary);
        background: rgba(99, 102, 241, 0.1);
    }
    
    .photo-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .upload-btn {
        background: rgba(71, 85, 105, 0.8);
        color: var(--text-primary);
        border: 1px solid var(--border);
        padding: 0.75rem 1rem;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }
    
    .upload-btn:hover {
        background: rgba(71, 85, 105, 1);
    }
    
    .radio-group {
        display: flex;
        gap: 1.5rem;
        align-items: center;
    }
    
    .radio-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .radio-input {
        width: 1.25rem;
        height: 1.25rem;
        accent-color: var(--primary);
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
    
    .password-strength {
        margin-top: 0.5rem;
    }
    
    .strength-bar {
        height: 4px;
        background: rgba(71, 85, 105, 0.3);
        border-radius: 2px;
        overflow: hidden;
        margin-bottom: 0.5rem;
    }
    
    .strength-fill {
        height: 100%;
        transition: all 0.3s ease;
        border-radius: 2px;
    }
    
    .strength-weak { background: #ef4444; width: 25%; }
    .strength-fair { background: #f59e0b; width: 50%; }
    .strength-good { background: #10b981; width: 75%; }
    .strength-strong { background: #059669; width: 100%; }
    
    @media (max-width: 768px) {
        .form-container {
            margin: 0;
        }
        
        .form-body {
            padding: 1.5rem;
        }
        
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .form-actions {
            flex-direction: column-reverse;
        }
        
        .btn {
            justify-content: center;
        }
        
        .photo-upload {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .radio-group {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
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
