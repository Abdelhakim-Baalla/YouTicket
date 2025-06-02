@extends('layouts.app')

@section('title', 'Inscription - YouTicket')

@section('content')
<div class="auth-container">
    <div class="auth-wrapper fade-in">
        <div class="auth-brand">
            <div class="brand-logo">
                <div class="logo-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <span class="brand-name">YouTicket</span>
            </div>
            <h1 class="brand-tagline">Rejoignez notre communauté</h1>
            <p class="brand-description">
                Créez votre compte et découvrez une nouvelle façon de gérer vos tickets de support
                avec des outils puissants et une interface intuitive.
            </p>
            <div class="brand-features">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <span>Collaboratif</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span>Performant</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <span>Sécurisé</span>
                </div>
            </div>
        </div>

        <div class="auth-card">
            <div class="auth-header">
                <h2 class="auth-title">Créer un compte</h2>
                <p class="auth-subtitle">Commencez votre expérience avec YouTicket</p>
            </div>

            <form method="POST" action="{{ route('register.submit') }}">
                @csrf
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="prenom" class="form-label">Prénom</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user input-icon"></i>
                            <input 
                                type="text" 
                                id="prenom"
                                name="prenom" 
                                class="form-control @error('prenom') error @enderror" 
                                placeholder="Prénom"
                                value="{{ old('prenom') }}"
                                autocomplete="given-name"
                                autofocus
                            >
                        </div>
                        @error('prenom')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nom" class="form-label">Nom</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user input-icon"></i>
                            <input 
                                type="text" 
                                id="nom"
                                name="nom" 
                                class="form-control @error('nom') error @enderror" 
                                placeholder="Nom"
                                value="{{ old('nom') }}"
                                autocomplete="family-name"
                            >
                        </div>
                        @error('nom')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Adresse email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input 
                            type="email" 
                            id="email"
                            name="email" 
                            class="form-control @error('email') error @enderror" 
                            placeholder="votre@email.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                        >
                    </div>
                    @error('email')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <div class="input-wrapper">
                            <i class="fas fa-phone input-icon"></i>
                            <input 
                                type="tel" 
                                id="telephone"
                                name="telephone" 
                                class="form-control @error('telephone') error @enderror" 
                                placeholder="+212 6 12 34 56 78"
                                value="{{ old('telephone') }}"
                                autocomplete="tel"
                            >
                        </div>
                        @error('telephone')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="post" class="form-label">Poste</label>
                        <div class="input-wrapper">
                            <i class="fas fa-briefcase input-icon"></i>
                            <input 
                                type="text" 
                                id="post"
                                name="post" 
                                class="form-control @error('post') error @enderror" 
                                placeholder="Votre fonction"
                                value="{{ old('post') }}"
                                autocomplete="organization-title"
                            >
                        </div>
                        @error('post')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input 
                            type="password" 
                            id="password"
                            name="password" 
                            class="form-control @error('password') error @enderror" 
                            placeholder="8 caractères minimum"
                            value="{{ old('password') }}"
                            autocomplete="new-password"
                            minlength="8"
                        >
                    </div>
                    @error('password')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirmation</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input 
                            type="password" 
                            id="password_confirmation"
                            name="password_confirmation" 
                            class="form-control" 
                            placeholder="Retapez votre mot de passe"
                            value="{{ old('password_confirmation') }}"
                            autocomplete="new-password"
                            minlength="8"
                        >
                    </div>
                </div>

                <div class="checkbox-wrapper">
                    <input type="checkbox" id="terms" name="terms" class="checkbox @error('terms') error @enderror" >
                    <label for="terms" class="checkbox-label">
                        J'accepte les <a href="#" class="auth-link">conditions d'utilisation</a> et la 
                        <a href="#" class="auth-link">politique de confidentialité</a>
                    </label>
                    @error('terms')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i>
                    Créer mon compte
                </button>
            </form>

            <div class="auth-footer">
                <p>Déjà un compte ? <a href="{{ route('login') }}" class="auth-link">Se connecter</a></p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/validationInscriptionFormulaire.js')}}"></script>
@endsection