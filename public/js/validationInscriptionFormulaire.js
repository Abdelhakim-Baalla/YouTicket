document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const inputs = {
        prenom: document.getElementById('prenom'),
        nom: document.getElementById('nom'),
        email: document.getElementById('email'),
        telephone: document.getElementById('telephone'),
        post: document.getElementById('post'),
        password: document.getElementById('password'),
        password_confirmation: document.getElementById('password_confirmation'),
        terms: document.getElementById('terms')
    };

    // Expressions régulières pour la validation
    const nameRegex = /^[a-zA-ZÀ-ÿ\-'\s]{2,}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^\+?[\d\s\-]{10,15}$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Tracker pour savoir si l'utilisateur a modifié les champs après une erreur serveur
    const fieldModified = {};

    // Fonctions de validation
    function validateName(input, fieldName) {
        const value = input.value.trim();
        const errorElement = getErrorElement(input);

        if (!value) {
            showError(input, errorElement, `Le ${fieldName} est requis`, 'client');
            return false;
        }

        if (!nameRegex.test(value)) {
            showError(input, errorElement, `Le ${fieldName} contient des caractères invalides`, 'client');
            return false;
        }

        if (value.length < 2) {
            showError(input, errorElement, `Le ${fieldName} doit contenir au moins 2 caractères`, 'client');
            return false;
        }

        removeError(input, errorElement, 'client');
        return true;
    }

    function validateEmail() {
        const email = inputs.email.value.trim();
        const errorElement = getErrorElement(inputs.email);

        if (!email) {
            showError(inputs.email, errorElement, 'L\'email est requis', 'client');
            return false;
        }

        if (!emailRegex.test(email)) {
            showError(inputs.email, errorElement, 'Veuillez entrer une adresse email valide', 'client');
            return false;
        }

        // Ne supprimer que les erreurs de validation côté client
        removeError(inputs.email, errorElement, 'client');
        return true;
    }

    function validatePhone() {
        const phone = inputs.telephone.value.trim();
        const errorElement = getErrorElement(inputs.telephone);

        if (!phone) {
            showError(inputs.telephone, errorElement, 'Le numéro de téléphone est requis', 'client');
            return false;
        }

        if (!phoneRegex.test(phone)) {
            showError(inputs.telephone, errorElement, 'Veuillez entrer un numéro de téléphone valide', 'client');
            return false;
        }

        removeError(inputs.telephone, errorElement, 'client');
        return true;
    }

    function validatePost() {
        const post = inputs.post.value.trim();
        const errorElement = getErrorElement(inputs.post);

        if (!post) {
            showError(inputs.post, errorElement, 'Le poste est requis', 'client');
            return false;
        }

        if (post.length < 2) {
            showError(inputs.post, errorElement, 'Le poste doit contenir au moins 2 caractères', 'client');
            return false;
        }

        removeError(inputs.post, errorElement, 'client');
        return true;
    }

    function validatePassword() {
        const password = inputs.password.value;
        const errorElement = getErrorElement(inputs.password);

        if (!password) {
            showError(inputs.password, errorElement, 'Le mot de passe est requis', 'client');
            return false;
        }

        if (password.length < 8) {
            showError(inputs.password, errorElement, 'Le mot de passe doit contenir au moins 8 caractères', 'client');
            return false;
        }

        removeError(inputs.password, errorElement, 'client');
        return true;
    }

    function validatePasswordConfirmation() {
        const password = inputs.password.value;
        const confirmation = inputs.password_confirmation.value;
        const errorElement = getErrorElement(inputs.password_confirmation);

        if (!confirmation) {
            showError(inputs.password_confirmation, errorElement, 'La confirmation du mot de passe est requise', 'client');
            return false;
        }

        if (password !== confirmation) {
            showError(inputs.password_confirmation, errorElement, 'Les mots de passe ne correspondent pas', 'client');
            return false;
        }

        removeError(inputs.password_confirmation, errorElement, 'client');
        return true;
    }

    function validateTerms() {
        const errorElement = document.querySelector('#terms ~ .error-message') || 
                           document.createElement('div');

        if (!inputs.terms.checked) {
            if (!errorElement.classList.contains('error-message')) {
                errorElement.className = 'error-message';
                errorElement.setAttribute('data-type', 'client');
                errorElement.innerHTML = '<i class="fas fa-exclamation-circle"></i> Vous devez accepter les conditions';
                inputs.terms.parentNode.appendChild(errorElement);
            } else {
                errorElement.style.display = 'flex';
            }
            return false;
        }

        if (errorElement.getAttribute('data-type') === 'client') {
            errorElement.style.display = 'none';
        }
        return true;
    }

    // Fonctions utilitaires
    function getErrorElement(input) {
        return input.nextElementSibling?.querySelector('.error-message') || 
               input.parentElement.nextElementSibling;
    }

    function showError(input, errorElement, message, type = 'client') {
        input.classList.add('error');
        
        if (errorElement && errorElement.classList.contains('error-message')) {
            // Si c'est une erreur serveur et qu'on essaie d'afficher une erreur client, ne pas écraser
            if (errorElement.getAttribute('data-type') === 'server' && type === 'client') {
                return;
            }
            errorElement.setAttribute('data-type', type);
            errorElement.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
            errorElement.style.display = 'flex';
        } else {
            const newErrorElement = document.createElement('div');
            newErrorElement.className = 'error-message';
            newErrorElement.setAttribute('data-type', type);
            newErrorElement.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
            
            if (input.parentElement.nextElementSibling) {
                input.parentElement.parentElement.insertBefore(newErrorElement, input.parentElement.nextSibling);
            } else {
                input.parentElement.parentElement.appendChild(newErrorElement);
            }
        }
    }

    function removeError(input, errorElement, type = 'client') {
        if (errorElement && errorElement.classList.contains('error-message')) {
            // Ne supprimer que si c'est le même type d'erreur ou si on supprime explicitement tout
            if (errorElement.getAttribute('data-type') === type || type === 'all') {
                input.classList.remove('error');
                errorElement.style.display = 'none';
            }
        }
    }

    // Marquer les erreurs serveur existantes au chargement de la page
    function markServerErrors() {
        Object.values(inputs).forEach(input => {
            if (input) {
                const errorElement = getErrorElement(input);
                if (errorElement && errorElement.classList.contains('error-message') && 
                    errorElement.style.display !== 'none') {
                    errorElement.setAttribute('data-type', 'server');
                    fieldModified[input.name] = false;
                }
            }
        });
    }

    // Fonction pour effacer les erreurs serveur quand l'utilisateur modifie significativement le champ
    function clearServerErrorOnSignificantChange(input) {
        const fieldName = input.name;
        const errorElement = getErrorElement(input);
        
        if (!fieldModified[fieldName]) {
            fieldModified[fieldName] = true;
            
            // Attendre un petit délai pour s'assurer que l'utilisateur modifie vraiment
            setTimeout(() => {
                if (fieldModified[fieldName]) {
                    removeError(input, errorElement, 'server');
                }
            }, 1000);
        }
    }

    // Écouteurs d'événements avec gestion des erreurs serveur
    inputs.prenom.addEventListener('input', function() {
        clearServerErrorOnSignificantChange(this);
        validateName(inputs.prenom, 'prénom');
    });
    inputs.prenom.addEventListener('blur', () => validateName(inputs.prenom, 'prénom'));
    
    inputs.nom.addEventListener('input', function() {
        clearServerErrorOnSignificantChange(this);
        validateName(inputs.nom, 'nom');
    });
    inputs.nom.addEventListener('blur', () => validateName(inputs.nom, 'nom'));
    
    inputs.email.addEventListener('input', function() {
        clearServerErrorOnSignificantChange(this);
        validateEmail();
    });
    inputs.email.addEventListener('blur', validateEmail);
    
    inputs.telephone.addEventListener('input', function() {
        clearServerErrorOnSignificantChange(this);
        validatePhone();
    });
    inputs.telephone.addEventListener('blur', validatePhone);
    
    inputs.post.addEventListener('input', function() {
        clearServerErrorOnSignificantChange(this);
        validatePost();
    });
    inputs.post.addEventListener('blur', validatePost);
    
    inputs.password.addEventListener('input', function() {
        clearServerErrorOnSignificantChange(this);
        validatePassword();
        if (inputs.password_confirmation.value) {
            validatePasswordConfirmation();
        }
    });
    inputs.password.addEventListener('blur', validatePassword);
    
    inputs.password_confirmation.addEventListener('input', function() {
        clearServerErrorOnSignificantChange(this);
        validatePasswordConfirmation();
    });
    inputs.password_confirmation.addEventListener('blur', validatePasswordConfirmation);
    
    inputs.terms.addEventListener('change', validateTerms);

    // Validation avant soumission
    form.addEventListener('submit', function(e) {
        const isValid = [
            validateName(inputs.prenom, 'prénom'),
            validateName(inputs.nom, 'nom'),
            validateEmail(),
            validatePhone(),
            validatePost(),
            validatePassword(),
            validatePasswordConfirmation(),
            validateTerms()
        ].every(valid => valid);

        if (!isValid) {
            e.preventDefault();
            
            // Focus sur le premier champ invalide
            for (const [key, input] of Object.entries(inputs)) {
                if (input && input.classList.contains('error')) {
                    input.focus();
                    break;
                }
            }
            
            showFlashMessage('Veuillez corriger les erreurs dans le formulaire', 'error');
        }
    });

    // Fonction pour afficher les messages flash
    function showFlashMessage(message, type = 'error') {
        const flashContainer = document.querySelector('.flash-messages');
        if (flashContainer) {
            const flashMessage = document.createElement('div');
            flashMessage.className = `flash-message ${type}`;
            flashMessage.innerHTML = `
                <i class="fas ${type === 'error' ? 'fa-exclamation-circle' : 'fa-check-circle'}"></i>
                <span>${message}</span>
                <span class="close-flash">&times;</span>
            `;
            flashContainer.appendChild(flashMessage);
            
            setTimeout(() => {
                flashMessage.classList.add('slide-out');
                setTimeout(() => flashMessage.remove(), 300);
            }, 5000);
            
            const closeBtn = flashMessage.querySelector('.close-flash');
            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    flashMessage.classList.add('slide-out');
                    setTimeout(() => flashMessage.remove(), 300);
                });
            }
        }
    }

    // Initialisation
    markServerErrors();
    
    // Validation initiale seulement pour les champs sans erreurs serveur
    Object.entries(inputs).forEach(([key, input]) => {
        if (input) {
            const errorElement = getErrorElement(input);
            if (!errorElement || errorElement.getAttribute('data-type') !== 'server') {
                switch(key) {
                    case 'prenom':
                        validateName(input, 'prénom');
                        break;
                    case 'nom':
                        validateName(input, 'nom');
                        break;
                    case 'email':
                        validateEmail();
                        break;
                    case 'telephone':
                        validatePhone();
                        break;
                    case 'post':
                        validatePost();
                        break;
                    case 'password':
                        validatePassword();
                        break;
                    case 'password_confirmation':
                        validatePasswordConfirmation();
                        break;
                }
            }
        }
    });
});