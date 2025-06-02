@extends('layouts.auth')

@section('title', 'Connexion - YouTicket')

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
            <h1 class="brand-tagline">Gérez vos tickets avec intelligence</h1>
            <p class="brand-description">
                Une plateforme moderne et intuitive pour optimiser votre support client 
                et transformer chaque interaction en opportunité de croissance.
            </p>
            <div class="brand-features">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <span>Rapide</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <span>Sécurisé</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <span>Analytique</span>
                </div>
            </div>
        </div>

        <div class="auth-card">
            <div class="auth-header">
                <h2 class="auth-title">Bon retour !</h2>
                <p class="auth-subtitle">Connectez-vous pour accéder à votre espace</p>
            </div>

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                
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
                            autofocus
                        >
                    </div>
                    @error('email')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
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
                            placeholder="••••••••••"
                            autocomplete="current-password"
                        >
                    </div>
                    @error('password')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="checkbox-wrapper">
                    <input type="checkbox" id="remember" name="remember" class="checkbox" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="checkbox-label">Se souvenir de moi</label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i>
                    Se connecter
                </button>
            </form>

            <div class="auth-footer">
                <p>Pas encore de compte ? <a href="{{ route('register') }}" class="auth-link">Créer un compte</a></p>
                @if (Route::has('password.request'))
                    <p style="margin-top: 0.5rem;">
                        <a href="{{ route('password.request') }}" class="auth-link">Mot de passe oublié ?</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/validationConnexionFormulaire.js')}}"></script>
@endsection