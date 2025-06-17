@extends('layouts.admin')

@section('title', 'Modifier l\'Utilisateur - YouTicket')
@section('page-title', 'Modifier l\'Utilisateur')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboardAdminUtilisateursEdit.css')}}">
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
