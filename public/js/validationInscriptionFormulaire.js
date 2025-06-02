document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const rememberCheckbox = document.getElementById('remember');
    
    // Expressions régulières pour la validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    
    // Fonction de validation d'email
    function validateEmail() {
        const email = emailInput.value.trim();
        const errorElement = emailInput.nextElementSibling?.querySelector('.error-message') || 
                            emailInput.parentElement.nextElementSibling;
        
        if (!email) {
            showError(emailInput, errorElement, 'L\'email est requis');
            return false;
        }
        
        if (!emailRegex.test(email)) {
            showError(emailInput, errorElement, 'Veuillez entrer une adresse email valide');
            return false;
        }
        
        removeError(emailInput, errorElement);
        return true;
    }
    
    // Fonction de validation de mot de passe
    function validatePassword() {
        const password = passwordInput.value.trim();
        const errorElement = passwordInput.nextElementSibling?.querySelector('.error-message') || 
                            passwordInput.parentElement.nextElementSibling;
        
        if (!password) {
            showError(passwordInput, errorElement, 'Le mot de passe est requis');
            return false;
        }
        
        if (password.length < 8) {
            showError(passwordInput, errorElement, 'Le mot de passe doit contenir au moins 8 caractères');
            return false;
        }
        
        // Décommentez pour une validation plus stricte
        /*
        if (!passwordRegex.test(password)) {
            showError(passwordInput, errorElement, 
                'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial');
            return false;
        }
        */
        
        removeError(passwordInput, errorElement);
        return true;
    }
    
    // Afficher les erreurs
    function showError(input, errorElement, message) {
        input.classList.add('error');
        
        if (errorElement && errorElement.classList.contains('error-message')) {
            errorElement.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
            errorElement.style.display = 'flex';
        } else {
            // Créer un élément d'erreur si non existant
            const newErrorElement = document.createElement('div');
            newErrorElement.className = 'error-message';
            newErrorElement.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
            
            if (input.parentElement.nextElementSibling) {
                input.parentElement.parentElement.insertBefore(newErrorElement, input.parentElement.nextSibling);
            } else {
                input.parentElement.parentElement.appendChild(newErrorElement);
            }
        }
    }
    
    // Supprimer les erreurs
    function removeError(input, errorElement) {
        input.classList.remove('error');
        if (errorElement && errorElement.classList.contains('error-message')) {
            errorElement.style.display = 'none';
        }
    }
    
    // Écouteurs d'événements pour la validation en temps réel
    emailInput.addEventListener('input', validateEmail);
    emailInput.addEventListener('blur', validateEmail);
    passwordInput.addEventListener('input', validatePassword);
    passwordInput.addEventListener('blur', validatePassword);
    
    // Validation avant soumission
    form.addEventListener('submit', function(e) {
        // Valider tous les champs
        const isEmailValid = validateEmail();
        const isPasswordValid = validatePassword();
        
        if (!isEmailValid || !isPasswordValid) {
            e.preventDefault();
            
            // Focus sur le premier champ invalide
            if (!isEmailValid) {
                emailInput.focus();
            } else if (!isPasswordValid) {
                passwordInput.focus();
            }
            
            // Afficher un message flash d'erreur
            const flashContainer = document.querySelector('.flash-messages');
            if (flashContainer) {
                const errorMessage = document.createElement('div');
                errorMessage.className = 'flash-message error';
                errorMessage.innerHTML = `
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Veuillez corriger les erreurs dans le formulaire</span>
                    <span class="close-flash">&times;</span>
                `;
                flashContainer.appendChild(errorMessage);
                
                // Auto-remove after 5 seconds
                setTimeout(() => {
                    errorMessage.classList.add('slide-out');
                    setTimeout(() => errorMessage.remove(), 300);
                }, 5000);
                
                // Close button functionality
                const closeBtn = errorMessage.querySelector('.close-flash');
                if (closeBtn) {
                    closeBtn.addEventListener('click', () => {
                        errorMessage.classList.add('slide-out');
                        setTimeout(() => errorMessage.remove(), 300);
                    });
                }
            }
        }
    });
    
    // Initial validation check (for prefilled values)
    validateEmail();
    validatePassword();
});