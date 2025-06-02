@extends('layouts.auth')

@section('title', 'Mot de passe oublié - YouTicket')

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
            <h1 class="brand-tagline">Récupération de mot de passe</h1>
            <p class="brand-description">
                Pas de souci ! Saisissez votre adresse email et nous vous enverrons 
                un lien pour réinitialiser votre mot de passe en toute sécurité.
            </p>
            <div class="brand-features">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <span>Sécurisé</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <span>Par email</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <span>Rapide</span>
                </div>
            </div>
        </div>

        <div class="auth-card">
            <div class="auth-header">
                <h2 class="auth-title">Mot de passe oublié ?</h2>
                <p class="auth-subtitle">Nous allons vous aider à retrouver l'accès à votre compte</p>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('status') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
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
                            required
                        >
                    </div>
                    @error('email')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-help">
                        <i class="fas fa-info-circle"></i>
                        Saisissez l'adresse email associée à votre compte
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i>
                    Envoyer le lien de réinitialisation
                </button>
            </form>

            <div class="auth-footer">
                <p>Vous vous souvenez de votre mot de passe ? <a href="{{ route('login') }}" class="auth-link">Se connecter</a></p>
                <p style="margin-top: 0.5rem;">
                    Pas encore de compte ? <a href="{{ route('register') }}" class="auth-link">Créer un compte</a>
                </p>
            </div>

            <div class="auth-info">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-shield-check"></i>
                    </div>
                    <div class="info-content">
                        <h4>Sécurité garantie</h4>
                        <p>Le lien de réinitialisation expire automatiquement après 60 minutes pour votre sécurité.</p>
                    </div>
                </div>
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div class="info-content">
                        <h4>Besoin d'aide ?</h4>
                        <p>Si vous ne recevez pas l'email, vérifiez vos spams ou contactez notre support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .alert {
        padding: 1rem;
        margin-bottom: 1.5rem;
        border-radius: 0.5rem;
        border: 1px solid transparent;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }

    .alert i {
        margin-right: 0.5rem;
    }

    .form-help {
        display: flex;
        align-items: center;
        margin-top: 0.5rem;
        font-size: 0.875rem;
        color: #6b7280;
    }

    .form-help i {
        margin-right: 0.5rem;
        color: #9ca3af;
    }

    .auth-info {
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e5e7eb;
    }

    .info-card {
        display: flex;
        align-items: flex-start;
        padding: 1rem;
        margin-bottom: 1rem;
        background-color: #f8fafc;
        border-radius: 0.5rem;
        border-left: 4px solid #3b82f6;
    }

    .info-icon {
        flex-shrink: 0;
        margin-right: 1rem;
        color: #3b82f6;
        font-size: 1.25rem;
    }

    .info-content h4 {
        margin: 0 0 0.25rem 0;
        font-size: 0.9rem;
        font-weight: 600;
        color: #1f2937;
    }

    .info-content p {
        margin: 0;
        font-size: 0.825rem;
        color: #6b7280;
        line-height: 1.4;
    }

    /* Animation pour le bouton au survol */
    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .auth-info {
            padding-top: 1.5rem;
        }

        .info-card {
            padding: 0.75rem;
        }

        .info-content h4 {
            font-size: 0.85rem;
        }

        .info-content p {
            font-size: 0.8rem;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Animation d'entrée
    document.addEventListener('DOMContentLoaded', function() {
        const authWrapper = document.querySelector('.auth-wrapper');
        authWrapper.style.opacity = '0';
        authWrapper.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            authWrapper.style.transition = 'all 0.6s ease-out';
            authWrapper.style.opacity = '1';
            authWrapper.style.transform = 'translateY(0)';
        }, 100);
    });

    // Validation basique du formulaire
    document.querySelector('form').addEventListener('submit', function(e) {
        const email = document.getElementById('email').value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (!emailRegex.test(email)) {
            e.preventDefault();
            
            // Ajouter une classe d'erreur
            const emailInput = document.getElementById('email');
            emailInput.classList.add('error');
            
            // Afficher un message d'erreur personnalisé
            let errorDiv = document.querySelector('.error-message');
            if (!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.innerHTML = '<i class="fas fa-exclamation-circle"></i> Veuillez saisir une adresse email valide';
                emailInput.parentNode.parentNode.appendChild(errorDiv);
            }
            
            // Retirer l'erreur quand l'utilisateur tape
            emailInput.addEventListener('input', function() {
                this.classList.remove('error');
                const existingError = this.parentNode.parentNode.querySelector('.error-message');
                if (existingError) {
                    existingError.remove();
                }
            });
        }
    });
</script>
@endsection