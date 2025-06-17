@extends('layouts.admin')

@section('title', 'Modifier l\'Utilisateur - YouTicket')
@section('page-title', 'Modifier l\'Utilisateur')

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
    
    .user-info {
        background: rgba(99, 102, 241, 0.1);
        border: 1px solid rgba(99, 102, 241, 0.2);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .user-avatar-large {
        width: 80px;
        height: 80px;
        border-radius: 12px;
        background: var(--gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        font-weight: 600;
        overflow: hidden;
    }
    
    .user-avatar-large img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .user-details {
        flex: 1;
    }
    
    .user-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }
    
    .user-meta {
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
        
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .form-actions {
            flex-direction: column;
            gap: 0.5rem;
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
        
        .user-info {
            flex-direction: column;
            text-align: center;
        }
        
        .user-meta {
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
        <a href="{{ route('dashboard.admin.utilisateurs') }}">Utilisateurs</a>
        <i class="fas fa-chevron-right"></i>
        <span>Modifier {{ $utilisateur->prenom }} {{ $utilisateur->nom }}</span>
    </nav>

    <div class="form-container">
        <div class="form-card">
            <div class="form-header">
                <div class="form-title">
                    <div class="form-icon">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <span>Modifier l'utilisateur</span>
                </div>
                <a href="{{ route('dashboard.admin.utilisateurs') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Retour
                </a>
            </div>

            <div class="form-body">
                <!-- Informations actuelles -->
                <div class="user-info">
                    <div class="user-avatar-large">
                        @if($utilisateur->photo)
                            <img src="{{ asset('storage/' . $utilisateur->photo) }}" alt="Photo">
                        @else
                            {{ substr($utilisateur->prenom ?? 'U', 0, 1) }}{{ substr($utilisateur->nom ?? 'U', 0, 1) }}
                        @endif
                    </div>
                    <div class="user-details">
                        <div class="user-name">{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</div>
                        <div class="user-meta">
                            <div class="meta-item">
                                <i class="fas fa-hashtag"></i>
                                <span>ID:</span>
                                <span class="meta-value">#{{ $utilisateur->id }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-envelope"></i>
                                <span>Email:</span>
                                <span class="meta-value">{{ $utilisateur->email }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-user-tag"></i>
                                <span>Rôle:</span>
                                <span class="meta-value">{{ $utilisateur->role->nom ?? 'Non défini' }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-toggle-on"></i>
                                <span>Statut:</span>
                                <span class="status-indicator {{ $utilisateur->actif ? 'status-active' : 'status-inactive' }}">
                                    <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                    {{ $utilisateur->actif ? 'Actif' : 'Inactif' }}
                                </span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar-plus"></i>
                                <span>Créé le:</span>
                                <span class="meta-value">{{ $utilisateur->created_at->format('d/m/Y à H:i') }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>Modifié le:</span>
                                <span class="meta-value">{{ $utilisateur->updated_at->format('d/m/Y à H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('dashboard.admin.utilisateurs.edit.submit') }}" method="POST" enctype="multipart/form-data" id="editUserForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="utilisateur_id" value="{{ $utilisateur->id }}">
                    
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
                                       value="{{ old('prenom', $utilisateur->prenom) }}" 
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
                                       value="{{ old('nom', $utilisateur->nom) }}" 
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
                                       value="{{ old('email', $utilisateur->email) }}" 
                                       required>
                                @error('email')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="tel" 
                                       name="telephone" 
                                       id="telephone" 
                                       class="form-control @error('telephone') error @enderror" 
                                       value="{{ old('telephone', $utilisateur->telephone) }}">
                                @error('telephone')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
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
                                       value="{{ old('poste', $utilisateur->poste) }}">
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
                                    <option value="it" {{ old('departement', $utilisateur->departement) == 'it' ? 'selected' : '' }}>💻 IT</option>
                                    <option value="accounting" {{ old('departement', $utilisateur->departement) == 'accounting' ? 'selected' : '' }}>💰 Comptabilité</option>
                                    <option value="hr" {{ old('departement', $utilisateur->departement) == 'hr' ? 'selected' : '' }}>👥 Ressources Humaines</option>
                                    <option value="marketing" {{ old('departement', $utilisateur->departement) == 'marketing' ? 'selected' : '' }}>📈 Marketing</option>
                                    <option value="sales" {{ old('departement', $utilisateur->departement) == 'sales' ? 'selected' : '' }}>💼 Ventes</option>
                                    <option value="management" {{ old('departement', $utilisateur->departement) == 'management' ? 'selected' : '' }}>🏢 Direction</option>
                                </select>
                                @error('departement')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="equipe_id" class="form-label">Équipe</label>
                                <select name="equipe_id" 
                                        id="equipe_id" 
                                        class="form-control form-select @error('equipe_id') error @enderror">
                                    <option value="">Aucune équipe</option>
                                    @foreach($equipes as $equipe)
                                        <option value="{{ $equipe->id }}" {{ old('equipe_id', $utilisateur->equipe_id) == $equipe->id ? 'selected' : '' }}>
                                            {{ $equipe->nom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('equipe_id')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="role_id" class="form-label required">Rôle</label>
                                <select name="role_id" 
                                        id="role_id" 
                                        class="form-control form-select @error('role_id') error @enderror" 
                                        required>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id', $utilisateur->role_id) == $role->id ? 'selected' : '' }}>
                                            {{ ucfirst($role->nom) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
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
                                @if($utilisateur->photo)
                                    <img src="{{ asset('storage/' . $utilisateur->photo) }}" alt="Photo actuelle">
                                @else
                                    <i class="fas fa-user"></i>
                                @endif
                            </div>
                            <div>
                                <label for="photo" class="upload-btn">
                                    <i class="fas fa-upload"></i>
                                    Changer la photo
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

                    <!-- Statut du compte -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-toggle-on"></i>
                            Statut du compte
                        </h3>
                        
                        <div class="radio-group">
                            <div class="radio-item">
                                <input type="radio" 
                                       name="actif" 
                                       id="actif_oui" 
                                       value="1" 
                                       class="radio-input" 
                                       {{ old('actif', $utilisateur->actif) == '1' ? 'checked' : '' }}>
                                <label for="actif_oui" class="form-label">✅ Compte actif</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" 
                                       name="actif" 
                                       id="actif_non" 
                                       value="0" 
                                       class="radio-input" 
                                       {{ old('actif', $utilisateur->actif) == '0' ? 'checked' : '' }}>
                                <label for="actif_non" class="form-label">❌ Compte inactif</label>
                            </div>
                        </div>
                        <div class="form-help">Un compte inactif ne peut pas se connecter au système</div>
                    </div>

                    <div class="form-actions">
                        <div class="flex gap-2">
                            <a href="{{ route('dashboard.admin.utilisateurs') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i>
                                Annuler
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
                <form id="deleteForm" action="{{ route('dashboard.admin.utilisateurs.delete', $utilisateur->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/dashboardAdminUtilisateursEdit.js')}}"></script>
@endsection
