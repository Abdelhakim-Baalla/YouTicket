@extends('layouts.auth')
@section('title', 'Réinitialiser le mot de passe - YouTicket')
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
            <h1 class="brand-tagline">Nouveau mot de passe</h1>
            <p class="brand-description">
                Choisissez un nouveau mot de passe sécurisé pour protéger votre compte YouTicket.
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
                        <i class="fas fa-lock"></i>
                    </div>
                    <span>Crypté</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <span>Protégé</span>
                </div>
            </div>
        </div>

        <div class="auth-card">
            <div class="auth-header">
                <h2 class="auth-title">Réinitialisation</h2>
                <p class="auth-subtitle">Définissez votre nouveau mot de passe</p>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ old('email', $email) }}">
                
                <div class="form-group">
                    <label for="password" class="form-label">Nouveau mot de passe</label>
                    <div class="input-wrapper">
                        <i class="fas fa-key input-icon"></i>
                        <input 
                            type="password" 
                            id="password"
                            name="password" 
                            class="form-control @error('password') error @enderror" 
                            placeholder="••••••••"
                            required
                            autocomplete="new-password"
                            autofocus
                        >
                    </div>
                    @error('password')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-help">
                        <i class="fas fa-info-circle"></i>
                        Minimum 8 caractères avec des chiffres et symboles
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <div class="input-wrapper">
                        <i class="fas fa-key input-icon"></i>
                        <input 
                            type="password" 
                            id="password_confirmation"
                            name="password_confirmation" 
                            class="form-control" 
                            placeholder="••••••••"
                            required
                            autocomplete="new-password"
                        >
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Enregistrer le nouveau mot de passe
                </button>
            </form>

            <div class="auth-footer">
                <p>Vous vous souvenez de votre mot de passe ? <a href="{{ route('login') }}" class="auth-link">Se connecter</a></p>
            </div>

            <div class="auth-info">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="info-content">
                        <h4>Sécurité renforcée</h4>
                        <p>Votre mot de passe est crypté et stocké de manière sécurisée.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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
</style>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const authWrapper = document.querySelector('.auth-wrapper');
        authWrapper.style.opacity = '0';
        authWrapper.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            authWrapper.style.transition = 'all 0.6s ease-out';
            authWrapper.style.opacity = '1';
            authWrapper.style.transform = 'translateY(0)';
        }, 100);

        // Password strength indicator
        const passwordInput = document.getElementById('password');
        if (passwordInput) {
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                const strengthIndicator = document.getElementById('password-strength');
                
                if (!strengthIndicator) {
                    const div = document.createElement('div');
                    div.id = 'password-strength';
                    div.className = 'password-strength';
                    this.parentNode.parentNode.appendChild(div);
                }
                
                const strength = checkPasswordStrength(password);
                updateStrengthIndicator(strength);
            });
        }
    });

    function checkPasswordStrength(password) {
        let strength = 0;
        
        // Length >= 8
        if (password.length >= 8) strength++;
        // Contains numbers
        if (/\d/.test(password)) strength++;
        // Contains lowercase
        if (/[a-z]/.test(password)) strength++;
        // Contains uppercase
        if (/[A-Z]/.test(password)) strength++;
        // Contains special chars
        if (/[^a-zA-Z0-9]/.test(password)) strength++;
        
        return strength;
    }

    function updateStrengthIndicator(strength) {
        const indicator = document.getElementById('password-strength');
        if (!indicator) return;
        
        const messages = [
            'Très faible',
            'Faible',
            'Moyen',
            'Fort',
            'Très fort'
        ];
        
        const colors = [
            '#ef4444', // red-500
            '#f97316', // orange-500
            '#eab308', // yellow-500
            '#22c55e', // green-500
            '#10b981'  // emerald-500
        ];
        
        indicator.textContent = `Sécurité: ${messages[strength - 1] || 'Très faible'}`;
        indicator.style.color = colors[strength - 1] || colors[0];
    }
</script>
@endsection
@endsection