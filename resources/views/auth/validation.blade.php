@extends('layouts.auth')

@section('title', 'Compte Désactivé - YouTicket')

@section('content')
<div class="auth-container">
    <div class="disabled-account-wrapper fade-in">
        <!-- Header Section -->
        <div class="disabled-header">
            <div class="status-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h1 class="disabled-title">Compte Temporairement Désactivé</h1>
            <p class="disabled-subtitle">
                Votre compte YouTicket est actuellement suspendu. Découvrez ci-dessous les différentes options pour réactiver votre accès.
            </p>
        </div>

        <!-- Account Status Card -->
        <div class="status-card">
            <div class="status-info">
                <div class="status-row">
                    <span class="status-label">Email du compte :</span>
                    <span class="status-value">{{ auth()->user()->email }}</span>
                </div>
                <div class="status-row">
                    <span class="status-label">Date de désactivation :</span>
                    <span class="status-value">{{ auth()->user()->created_at }}</span>
                </div>
                <div class="status-row">
                    <span class="status-label">Raison :</span>
                    <span class="status-value reason">{{ $raison ?? 'Vérification de sécurité requise' }}</span>
                </div>
                <div class="status-row">
                    <span class="status-label">Statut :</span>
                    <span class="status-badge disabled">
                        <i class="fas fa-ban"></i>
                        Désactivé
                    </span>
                </div>
            </div>
        </div>

        <!-- Activation Options -->
        <div class="activation-options">
            <h2 class="options-title">Options de Réactivation</h2>
            <p class="options-subtitle">Choisissez la méthode qui vous convient le mieux pour récupérer l'accès à votre compte</p>

            <div class="options-grid">
                <!-- Email Verification -->
                <div class="option-card featured">
                    <div class="option-header">
                        <div class="option-icon primary">
                            <i class="fas fa-envelope-open"></i>
                        </div>
                        <div class="option-badge">Recommandé</div>
                    </div>
                    <h3 class="option-title">Validation par Email</h3>
                    <p class="option-description">
                        Recevez un lien de vérification sécurisé dans votre boîte email pour réactiver instantanément votre compte.
                    </p>
                    <div class="option-features">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Activation immédiate</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Processus sécurisé</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Lien valable 24h</span>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('validation.email') }}" class="option-form">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                            Envoyer l'email de validation
                        </button>
                    </form>
                </div>

                <!-- SMS Verification -->
                <div class="option-card">
                    <div class="option-header">
                        <div class="option-icon accent">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                    </div>
                    <h3 class="option-title">Validation par SMS</h3>
                    <p class="option-description">
                        Recevez un code de vérification par SMS sur votre numéro de téléphone enregistré.
                    </p>
                    <div class="option-features">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Code à 6 chiffres</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Valable 10 minutes</span>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('validation.sms') }}" class="option-form">
                        @csrf
                        <div class="phone-input">
                            <input type="tel" name="phone" value="{{ auth()->user()->telephone }}" placeholder="+212 XXXXXXXXX" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-accent">
                            <i class="fas fa-sms"></i>
                            Envoyer le code SMS
                        </button>
                    </form>
                    <form method="POST" action="{{ route('validation.sms.valider') }}" class="option-form" style="margin-top:1rem;">
                        @csrf
                        <div class="code-input">
                            <input type="text" name="code" placeholder="Entrez le code reçu" maxlength="6" class="form-control code-field" required>
                        </div>
                        @error('code')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check"></i>
                            Valider le code
                        </button>
                    </form>
                </div>

                <!-- Identity Verification -->
                {{-- <div class="option-card">
                    <div class="option-header">
                        <div class="option-icon success">
                            <i class="fas fa-id-card"></i>
                        </div>
                    </div>
                    <h3 class="option-title">Vérification d'Identité</h3>
                    <p class="option-description">
                        Téléchargez une pièce d'identité valide pour une vérification manuelle par notre équipe.
                    </p>
                    <div class="option-features">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>CNI, Passeport acceptés</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-clock"></i>
                            <span>Traitement sous 24-48h</span>
                        </div>
                    </div>
                    <form method="POST" action="" enctype="multipart/form-data" class="option-form">
                        @csrf
                        <div class="file-upload">
                            <input type="file" name="identity_document" accept="image/*,.pdf" class="file-input" id="identity-upload" required>
                            <label for="identity-upload" class="file-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Choisir un fichier</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-upload"></i>
                            Envoyer le document
                        </button>
                    </form>
                </div> --}}

                <!-- Security Questions -->
                {{-- <div class="option-card">
                    <div class="option-header">
                        <div class="option-icon info">
                            <i class="fas fa-question-circle"></i>
                        </div>
                    </div>
                    <h3 class="option-title">Questions de Sécurité</h3>
                    <p class="option-description">
                        Répondez à vos questions de sécurité configurées lors de la création de votre compte.
                    </p>
                    <div class="option-features">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>3 questions à répondre</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Activation immédiate</span>
                        </div>
                    </div>
                    <form method="POST" action="" class="option-form">
                        @csrf
                        <div class="security-questions">
                            <div class="question-group">
                                <label class="question-label">Quel était le nom de votre premier animal de compagnie ?</label>
                                <input type="text" name="answer1" class="form-control" required>
                            </div>
                            <div class="question-group">
                                <label class="question-label">Dans quelle ville êtes-vous né(e) ?</label>
                                <input type="text" name="answer2" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-key"></i>
                            Valider les réponses
                        </button>
                    </form>
                </div> --}}

                <!-- Contact Support -->
                <div class="option-card">
                    <div class="option-header">
                        <div class="option-icon warning">
                            <i class="fas fa-headset"></i>
                        </div>
                    </div>
                    <h3 class="option-title">Contacter le Support</h3>
                    <p class="option-description">
                        Notre équipe support est là pour vous aider. Décrivez votre situation pour une assistance personnalisée.
                    </p>
                    <div class="option-features">
                        <div class="feature-item">
                            <i class="fas fa-clock"></i>
                            <span>Réponse sous 2-4h</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-user-tie"></i>
                            <span>Support expert</span>
                        </div>
                    </div>
                    <form method="POST" action="" class="option-form">
                        @csrf
                        <div class="contact-fields">
                            <select name="subject" class="form-control" required>
                                <option value="">Choisir un sujet</option>
                                <option value="account_locked">Compte bloqué</option>
                                <option value="suspicious_activity">Activité suspecte</option>
                                <option value="password_reset">Problème de mot de passe</option>
                                <option value="technical_issue">Problème technique</option>
                                <option value="other">Autre</option>
                            </select>
                            <textarea name="message" placeholder="Décrivez votre problème en détail..." class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-paper-plane"></i>
                            Envoyer le message
                        </button>
                    </form>
                </div>

                <!-- Two-Factor Authentication -->
                {{-- <div class="option-card">
                    <div class="option-header">
                        <div class="option-icon primary">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="option-badge">Sécurisé</div>
                    </div>
                    <h3 class="option-title">Authentification à Deux Facteurs</h3>
                    <p class="option-description">
                        Utilisez votre application d'authentification (Google Authenticator, Authy) pour générer un code.
                    </p>
                    <div class="option-features">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Sécurité maximale</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Code à 6 chiffres</span>
                        </div>
                    </div>
                    <form method="POST" action="" class="option-form">
                        @csrf
                        <div class="code-input">
                            <input type="text" name="code" placeholder="123456" class="form-control code-field" maxlength="6" required>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-shield-check"></i>
                            Vérifier le code
                        </button>
                    </form>
                </div> --}}
            </div>
        </div>

        <!-- Help Section -->
        <div class="help-section">
            <div class="help-card">
                <div class="help-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="help-content">
                    <h3 class="help-title">Besoin d'aide ?</h3>
                    <p class="help-text">
                        Si aucune de ces options ne fonctionne ou si vous rencontrez des difficultés, 
                        consultez notre centre d'aide ou contactez-nous directement.
                    </p>
                    <div class="help-actions">
                        <a href="#" class="help-link">
                            <i class="fas fa-book"></i>
                            Centre d'aide
                        </a>
                        <a href="#" class="help-link">
                            <i class="fas fa-comments"></i>
                            Chat en direct
                        </a>
                        <a href="#" class="help-link">
                            <i class="fas fa-phone"></i>
                            Nous appeler
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Notice -->
        <div class="security-notice">
            <div class="notice-icon">
                <i class="fas fa-lock"></i>
            </div>
            <div class="notice-content">
                <h4 class="notice-title">Votre sécurité est notre priorité</h4>
                <p class="notice-text">
                    La désactivation de votre compte est une mesure de sécurité préventive. 
                    Toutes vos données sont sécurisées et seront restaurées dès la réactivation de votre compte.
                </p>
            </div>
        </div>
    </div>
</div>

<style>
/* Disabled Account Specific Styles */
.disabled-account-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.disabled-header {
    text-align: center;
    margin-bottom: 3rem;
}

.status-icon {
    width: 80px;
    height: 80px;
    background: var(--gradient-accent);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 2rem;
    color: white;
    position: relative;
}

.status-icon::after {
    content: '';
    position: absolute;
    inset: -4px;
    background: var(--gradient-accent);
    border-radius: 50%;
    z-index: -1;
    opacity: 0.3;
    filter: blur(12px);
}

.disabled-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    background: linear-gradient(135deg, var(--text-primary) 0%, var(--text-secondary) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.disabled-subtitle {
    font-size: 1.1rem;
    color: var(--text-secondary);
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.status-card {
    background: rgba(30, 41, 59, 0.8);
    backdrop-filter: blur(20px);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 2rem;
    margin-bottom: 3rem;
    position: relative;
}

.status-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: var(--gradient-accent);
    border-radius: 16px 16px 0 0;
}

.status-info {
    display: grid;
    gap: 1rem;
}

.status-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid var(--border);
}

.status-row:last-child {
    border-bottom: none;
}

.status-label {
    font-weight: 500;
    color: var(--text-secondary);
}

.status-value {
    color: var(--text-primary);
    font-weight: 500;
}

.status-value.reason {
    color: var(--accent);
}

.status-badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.status-badge.disabled {
    background: rgba(220, 38, 38, 0.2);
    color: #fca5a5;
    border: 1px solid rgba(220, 38, 38, 0.3);
}

.options-title {
    font-size: 1.75rem;
    font-weight: 600;
    text-align: center;
    margin-bottom: 1rem;
    color: var(--text-primary);
}

.options-subtitle {
    text-align: center;
    color: var(--text-secondary);
    margin-bottom: 2rem;
    font-size: 1rem;
}

.options-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.option-card {
    background: rgba(30, 41, 59, 0.8);
    backdrop-filter: blur(20px);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 1.5rem;
    position: relative;
    transition: all 0.3s ease;
}

.option-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary);
}

.option-card.featured {
    border-color: var(--primary);
    box-shadow: var(--glow);
}

.option-card.featured::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: var(--gradient-primary);
    border-radius: 16px 16px 0 0;
}

.option-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.option-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: white;
}

.option-icon.primary {
    background: var(--gradient-primary);
}

.option-icon.accent {
    background: var(--gradient-accent);
}

.option-icon.success {
    background: linear-gradient(135deg, #059669 0%, #10b981 100%);
}

.option-icon.info {
    background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
}

.option-icon.warning {
    background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
}

.option-badge {
    background: var(--gradient-primary);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

.option-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.75rem;
}

.option-description {
    color: var(--text-secondary);
    margin-bottom: 1rem;
    line-height: 1.5;
    font-size: 0.9rem;
}

.option-features {
    margin-bottom: 1.5rem;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
    font-size: 0.85rem;
    color: var(--text-secondary);
}

.feature-item i {
    color: var(--success);
    font-size: 0.75rem;
}

.feature-item i.fa-clock {
    color: var(--accent);
}

.option-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.phone-input input,
.code-input input {
    text-align: center;
    font-family: 'JetBrains Mono', monospace;
    font-weight: 500;
}

.code-field {
    font-size: 1.25rem;
    letter-spacing: 0.5rem;
}

.file-upload {
    position: relative;
}

.file-input {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.file-label {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 1rem;
    background: var(--surface);
    border: 2px dashed var(--border);
    border-radius: 12px;
    color: var(--text-secondary);
    cursor: pointer;
    transition: all 0.3s ease;
}

.file-label:hover {
    border-color: var(--primary);
    color: var(--text-primary);
}

.security-questions {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.question-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.question-label {
    font-size: 0.85rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.contact-fields {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.contact-fields select,
.contact-fields textarea {
    resize: vertical;
    min-height: 40px;
}

.btn-accent {
    background: var(--gradient-accent);
    color: white;
}

.btn-success {
    background: linear-gradient(135deg, #059669 0%, #10b981 100%);
    color: white;
}

.btn-info {
    background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
    color: white;
}

.btn-warning {
    background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
    color: white;
}

.help-section {
    margin-bottom: 2rem;
}

.help-card {
    background: rgba(30, 41, 59, 0.8);
    backdrop-filter: blur(20px);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 2rem;
    display: flex;
    gap: 1.5rem;
    align-items: flex-start;
}

.help-icon {
    width: 48px;
    height: 48px;
    background: var(--gradient-primary);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: white;
    flex-shrink: 0;
}

.help-content {
    flex: 1;
}

.help-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.75rem;
}

.help-text {
    color: var(--text-secondary);
    margin-bottom: 1.5rem;
    line-height: 1.5;
}

.help-actions {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.help-link {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary-light);
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    transition: color 0.3s ease;
}

.help-link:hover {
    color: var(--primary);
}

.security-notice {
    background: rgba(99, 102, 241, 0.1);
    border: 1px solid rgba(99, 102, 241, 0.2);
    border-radius: 16px;
    padding: 1.5rem;
    display: flex;
    gap: 1rem;
    align-items: flex-start;
}

.notice-icon {
    width: 40px;
    height: 40px;
    background: var(--gradient-primary);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    color: white;
    flex-shrink: 0;
}

.notice-content {
    flex: 1;
}

.notice-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.notice-text {
    color: var(--text-secondary);
    font-size: 0.9rem;
    line-height: 1.5;
}

/* Responsive */
@media (max-width: 768px) {
    .disabled-account-wrapper {
        padding: 1rem;
    }
    
    .disabled-title {
        font-size: 2rem;
    }
    
    .options-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .status-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .help-card {
        flex-direction: column;
        text-align: center;
    }
    
    .help-actions {
        justify-content: center;
    }
    
    .security-notice {
        flex-direction: column;
        text-align: center;
    }
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // File upload preview
    const fileInputs = document.querySelectorAll('.file-input');
    fileInputs.forEach(input => {
        input.addEventListener('change', function() {
            const label = this.nextElementSibling;
            const fileName = this.files[0]?.name;
            if (fileName) {
                label.innerHTML = `<i class="fas fa-check"></i><span>${fileName}</span>`;
                label.style.borderColor = 'var(--success)';
                label.style.color = 'var(--success)';
            }
        });
    });
    
    // Code input formatting
    const codeInputs = document.querySelectorAll('.code-field');
    codeInputs.forEach(input => {
        input.addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '');
        });
    });
    
    // Phone input formatting
    const phoneInputs = document.querySelectorAll('input[type="tel"]');
    phoneInputs.forEach(input => {
        input.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.startsWith('212')) {
                value = '+' + value;
            } else if (value.startsWith('0')) {
                value = '+212' + value.substring(1);
            } else if (!value.startsWith('+')) {
                value = '+212' + value;
            }
            this.value = value;
        });
    });
    
    // Form validation feedback
    const forms = document.querySelectorAll('.option-form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>Traitement...';
            button.disabled = true;
            
            // Simulate processing (remove in real implementation)
            setTimeout(() => {
                button.innerHTML = originalText;
                button.disabled = false;
            }, 2000);
        });
    });
});
</script>
@endsection