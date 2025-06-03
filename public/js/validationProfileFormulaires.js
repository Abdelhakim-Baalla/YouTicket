// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });

            // Update active navigation
            document
                .querySelectorAll(".nav-link")
                .forEach((link) => link.classList.remove("active"));
            this.classList.add("active");
        }
    });
});

// Update active navigation on scroll
window.addEventListener("scroll", () => {
    const sections = document.querySelectorAll("[id]");
    const navLinks = document.querySelectorAll(".nav-link");

    let current = "";
    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (scrollY >= sectionTop - 200) {
            current = section.getAttribute("id");
        }
    });

    navLinks.forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("href") === `#${current}`) {
            link.classList.add("active");
        }
    });
});

// Utility functions for validation
function showError(input, message) {
    const formGroup = input.closest('.form-group');
    let errorElement = formGroup.querySelector('.error-message');
    
    if (!errorElement) {
        errorElement = document.createElement('div');
        errorElement.className = 'error-message';
        formGroup.appendChild(errorElement);
    }
    
    errorElement.textContent = message;
    errorElement.style.cssText = `
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: block;
        animation: fadeIn 0.3s ease;
    `;
    
    input.style.borderColor = '#ef4444';
    input.style.boxShadow = '0 0 0 3px rgba(239, 68, 68, 0.2)';
}

function clearError(input) {
    const formGroup = input.closest('.form-group');
    const errorElement = formGroup.querySelector('.error-message');
    
    if (errorElement) {
        errorElement.remove();
    }
    
    input.style.borderColor = 'var(--border)';
    input.style.boxShadow = 'none';
}

function showSuccess(button, message = 'Enregistré !') {
    const originalText = button.innerHTML;
    const originalBackground = button.style.background;
    
    button.innerHTML = `<i class="fas fa-check mr-2"></i>${message}`;
    button.style.background = '#10b981';
    button.disabled = true;
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.style.background = originalBackground;
        button.disabled = false;
    }, 2500);
}

function showButtonError(button, message = 'Erreur lors de l\'enregistrement') {
    const originalText = button.innerHTML;
    const originalBackground = button.style.background;
    
    button.innerHTML = `<i class="fas fa-times mr-2"></i>${message}`;
    button.style.background = '#ef4444';
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.style.background = originalBackground;
    }, 3000);
}

// Validation functions
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validatePhone(phone) {
    if (!phone || phone.trim() === '') return true; // Téléphone optionnel
    
    // Nettoyer le numéro (supprimer espaces, points, tirets, parenthèses)
    const cleanPhone = phone.replace(/[\s.\-()]/g, '');
    
    // Vérifier si c'est un numéro international valide
    // Formats acceptés:
    // - Commence par + suivi de 1-3 chiffres pour le code pays, puis 4-15 chiffres
    // - Ou commence par 00 suivi de 1-3 chiffres pour le code pays, puis 4-15 chiffres
    // - Ou numéro local (6-15 chiffres)
    const internationalRegex = /^(\+|00)\d{1,3}\d{4,15}$/;
    const localRegex = /^\d{6,15}$/;
    
    // Vérifications spécifiques par pays pour une meilleure validation
    const countryPatterns = {
        // France: +33 ou 0033, puis 9 chiffres (01-09)
        france: /^(\+33|0033|0)[1-9]\d{8}$/,
        // Maroc: +212 ou 00212, puis 9 chiffres
        maroc: /^(\+212|00212|0)[5-7]\d{8}$/,
        // États-Unis/Canada: +1, puis 10 chiffres
        usa_canada: /^(\+1|001)\d{10}$/,
        // Royaume-Uni: +44, puis 10-11 chiffres
        uk: /^(\+44|0044|0)\d{10,11}$/,
        // Allemagne: +49, puis 10-12 chiffres
        germany: /^(\+49|0049|0)\d{10,12}$/,
        // Espagne: +34, puis 9 chiffres
        spain: /^(\+34|0034)\d{9}$/,
        // Italie: +39, puis 6-11 chiffres
        italy: /^(\+39|0039)\d{6,11}$/
    };
    
    // Vérifier d'abord les patterns spécifiques
    for (const pattern of Object.values(countryPatterns)) {
        if (pattern.test(cleanPhone)) {
            return true;
        }
    }
    
    // Si aucun pattern spécifique ne correspond, utiliser la validation générale
    return internationalRegex.test(cleanPhone) || localRegex.test(cleanPhone);
}

function validatePassword(password) {
    return {
        length: password.length >= 8,
        uppercase: /[A-Z]/.test(password),
        lowercase: /[a-z]/.test(password),
        number: /\d/.test(password),
        special: /[!@#$%^&*(),.?":{}|<>]/.test(password)
    };
}

function validateFile(file) {
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    const maxSize = 2 * 1024 * 1024; // 2MB
    
    return {
        type: allowedTypes.includes(file.type),
        size: file.size <= maxSize
    };
}

// Personal Information Form Validation
function validatePersonalInfoForm() {
    let isValid = true;
    const form = document.querySelector('#personal_info form');
    
    // Validate first name
    const prenom = document.getElementById('prenom');
    if (!prenom.value.trim()) {
        showError(prenom, 'Le prénom est requis');
        isValid = false;
    } else if (prenom.value.trim().length < 2) {
        showError(prenom, 'Le prénom doit contenir au moins 2 caractères');
        isValid = false;
    } else {
        clearError(prenom);
    }
    
    // Validate last name
    const nom = document.getElementById('nom');
    if (!nom.value.trim()) {
        showError(nom, 'Le nom est requis');
        isValid = false;
    } else if (nom.value.trim().length < 2) {
        showError(nom, 'Le nom doit contenir au moins 2 caractères');
        isValid = false;
    } else {
        clearError(nom);
    }
    
    // Validate email
    const email = document.getElementById('email');
    if (!email.value.trim()) {
        showError(email, 'L\'email est requis');
        isValid = false;
    } else if (!validateEmail(email.value)) {
        showError(email, 'Format d\'email invalide');
        isValid = false;
    } else {
        clearError(email);
    }
    
    // Validate phone (optional but if provided, should be valid)
    const telephone = document.getElementById('telephone');
    if (telephone.value.trim() && !validatePhone(telephone.value)) {
        showError(telephone, 'Format de téléphone invalide. Exemples: +212612345678, +33123456789, 0123456789');
        isValid = false;
    } else {
        clearError(telephone);
    }
    
    // Validate photo (optional but if provided, should be valid)
    const photo = document.getElementById('photo');
    if (photo.files.length > 0) {
        const file = photo.files[0];
        const validation = validateFile(file);
        
        if (!validation.type) {
            showError(photo, 'Format de fichier non supporté (JPG, PNG, GIF uniquement)');
            isValid = false;
        } else if (!validation.size) {
            showError(photo, 'La taille du fichier ne doit pas dépasser 2MB');
            isValid = false;
        } else {
            clearError(photo);
        }
    }
    
    // Validate poste
    const poste = document.getElementById('poste');
    if (!poste.value.trim()) {
        showError(poste, 'Le poste est requis');
        isValid = false;
    } else {
        clearError(poste);
    }
    
    return isValid;
}

// Account Settings Form Validation
function validateAccountSettingsForm() {
    let isValid = true;
    
    // Validate language selection
    const language = document.getElementById('language');
    if (!language.value) {
        showError(language, 'Veuillez sélectionner une langue');
        isValid = false;
    } else {
        clearError(language);
    }
    
    // Validate timezone selection
    const timezone = document.getElementById('timezone');
    if (!timezone.value) {
        showError(timezone, 'Veuillez sélectionner un fuseau horaire');
        isValid = false;
    } else {
        clearError(timezone);
    }
    
    return isValid;
}

// Notifications Form Validation
function validateNotificationsForm() {
    let isValid = true;
    
    // Validate notification frequency
    const frequency = document.getElementById('notification_frequency');
    if (!frequency.value) {
        showError(frequency, 'Veuillez sélectionner une fréquence de notification');
        isValid = false;
    } else {
        clearError(frequency);
    }
    
    // Check if at least one notification type is selected
    const checkboxes = document.querySelectorAll('#notifications input[type="checkbox"]');
    const isAnyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
    
    if (!isAnyChecked) {
        // Show error message for notification types
        const notificationSection = document.querySelector('#notifications .grid');
        let errorElement = notificationSection.querySelector('.notification-error');
        
        if (!errorElement) {
            errorElement = document.createElement('div');
            errorElement.className = 'notification-error';
            errorElement.style.cssText = `
                color: #ef4444;
                font-size: 0.875rem;
                margin-top: 1rem;
                padding: 0.75rem;
                background: rgba(239, 68, 68, 0.1);
                border: 1px solid rgba(239, 68, 68, 0.3);
                border-radius: 0.5rem;
                text-align: center;
            `;
            notificationSection.appendChild(errorElement);
        }
        
        errorElement.textContent = 'Veuillez sélectionner au moins un type de notification';
        isValid = false;
    } else {
        // Remove error message if exists
        const errorElement = document.querySelector('.notification-error');
        if (errorElement) {
            errorElement.remove();
        }
    }
    
    return isValid;
}

// Security Form Validation
function validateSecurityForm() {
    let isValid = true;
    
    const currentPassword = document.getElementById('current_password');
    const newPassword = document.getElementById('new_password');
    const confirmPassword = document.getElementById('confirm_password');
    
    // Validate current password
    if (!currentPassword.value.trim()) {
        showError(currentPassword, 'Le mot de passe actuel est requis');
        isValid = false;
    } else {
        clearError(currentPassword);
    }
    
    // Validate new password
    if (!newPassword.value.trim()) {
        showError(newPassword, 'Le nouveau mot de passe est requis');
        isValid = false;
    } else {
        const passwordValidation = validatePassword(newPassword.value);
        const errors = [];
        
        if (!passwordValidation.length) errors.push('au moins 8 caractères');
        if (!passwordValidation.uppercase) errors.push('une majuscule');
        if (!passwordValidation.lowercase) errors.push('une minuscule');
        if (!passwordValidation.number) errors.push('un chiffre');
        if (!passwordValidation.special) errors.push('un caractère spécial');
        
        if (errors.length > 0) {
            showError(newPassword, `Le mot de passe doit contenir : ${errors.join(', ')}`);
            isValid = false;
        } else {
            clearError(newPassword);
        }
    }
    
    // Validate password confirmation
    if (!confirmPassword.value.trim()) {
        showError(confirmPassword, 'La confirmation du mot de passe est requise');
        isValid = false;
    } else if (newPassword.value !== confirmPassword.value) {
        showError(confirmPassword, 'Les mots de passe ne correspondent pas');
        isValid = false;
    } else {
        clearError(confirmPassword);
    }
    
    return isValid;
}

// Password strength indicator
function updatePasswordStrength(password) {
    const validation = validatePassword(password);
    const strengthIndicator = document.getElementById('password-strength');
    
    if (!strengthIndicator) {
        const indicator = document.createElement('div');
        indicator.id = 'password-strength';
        indicator.style.cssText = `
            margin-top: 0.5rem;
            padding: 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
        `;
        document.getElementById('new_password').closest('.form-group').appendChild(indicator);
    }
    
    const score = Object.values(validation).filter(Boolean).length;
    const colors = ['#ef4444', '#f59e0b', '#eab308', '#22c55e', '#10b981'];
    const messages = [
        'Très faible',
        'Faible', 
        'Moyen',
        'Fort',
        'Très fort'
    ];
    
    const strengthElement = document.getElementById('password-strength');
    strengthElement.style.backgroundColor = `${colors[score - 1]}20`;
    strengthElement.style.borderLeft = `4px solid ${colors[score - 1]}`;
    strengthElement.style.color = colors[score - 1];
    strengthElement.textContent = `Force du mot de passe: ${messages[score - 1]}`;
}

// Form submission handlers
document.addEventListener("DOMContentLoaded", function () {
    // Personal Information Form
    const personalInfoForm = document.querySelector('#personal_info form');
    if (personalInfoForm) {
        personalInfoForm.addEventListener('submit', function(e) {
            if (!validatePersonalInfoForm()) {
                e.preventDefault();
                const submitBtn = this.querySelector('.btn.btn-primary');
                showButtonError(submitBtn, 'Veuillez corriger les erreurs');
            }
        });
    }
    
    // Account Settings Form
    const accountSettingsBtn = document.querySelector('#account_settings .btn.btn-primary');
    if (accountSettingsBtn) {
        accountSettingsBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (validateAccountSettingsForm()) {
                showSuccess(this, 'Préférences enregistrées !');
            } else {
                showButtonError(this, 'Veuillez corriger les erreurs');
            }
        });
    }
    
    // Notifications Form
    const notificationsBtn = document.querySelector('#notifications .btn.btn-primary');
    if (notificationsBtn) {
        notificationsBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (validateNotificationsForm()) {
                showSuccess(this, 'Notifications configurées !');
            } else {
                showButtonError(this, 'Veuillez corriger les erreurs');
            }
        });
    }
    
    // Security Form - CORRECTION ICI
    const securityForm = document.querySelector('#security form');
    if (securityForm) {
        securityForm.addEventListener('submit', function(e) {
            if (!validateSecurityForm()) {
                e.preventDefault();
                const submitBtn = this.querySelector('.btn.btn-primary');
                showButtonError(submitBtn, 'Veuillez corriger les erreurs');
            }
            // Si la validation passe, le formulaire sera soumis normalement vers l'action Laravel
        });
    }
    
    // Password strength indicator
    const newPasswordInput = document.getElementById("new_password");
    if (newPasswordInput) {
        newPasswordInput.addEventListener("input", function() {
            if (this.value.trim()) {
                updatePasswordStrength(this.value);
            } else {
                const strengthIndicator = document.getElementById('password-strength');
                if (strengthIndicator) {
                    strengthIndicator.remove();
                }
            }
        });
    }
    
    // Real-time validation on input
    const inputs = document.querySelectorAll('input, select');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            // Clear previous errors when user starts typing
            clearError(this);
        });
        
        input.addEventListener('input', function() {
            // Clear errors on input for better UX
            if (this.closest('.form-group').querySelector('.error-message')) {
                clearError(this);
            }
        });
    });
});

// Add CSS for animations and error states
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .form-control.error {
        border-color: #ef4444 !important;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2) !important;
    }
    
    .form-control.success {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2) !important;
    }
    
    .error-message {
        animation: fadeIn 0.3s ease;
    }
`;
document.head.appendChild(style);