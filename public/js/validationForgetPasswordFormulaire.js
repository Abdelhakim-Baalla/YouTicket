// Animation d'entrée
document.addEventListener("DOMContentLoaded", function () {
    const authWrapper = document.querySelector(".auth-wrapper");
    authWrapper.style.opacity = "0";
    authWrapper.style.transform = "translateY(20px)";

    setTimeout(() => {
        authWrapper.style.transition = "all 0.6s ease-out";
        authWrapper.style.opacity = "1";
        authWrapper.style.transform = "translateY(0)";
    }, 100);
});

// Validation basique du formulaire
document.querySelector("form").addEventListener("submit", function (e) {
    const email = document.getElementById("email").value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        e.preventDefault();

        // Ajouter une classe d'erreur
        const emailInput = document.getElementById("email");
        emailInput.classList.add("error");

        // Afficher un message d'erreur personnalisé
        let errorDiv = document.querySelector(".error-message");
        if (!errorDiv) {
            errorDiv = document.createElement("div");
            errorDiv.className = "error-message";
            errorDiv.innerHTML =
                '<i class="fas fa-exclamation-circle"></i> Veuillez saisir une adresse email valide';
            emailInput.parentNode.parentNode.appendChild(errorDiv);
        }

        // Retirer l'erreur quand l'utilisateur tape
        emailInput.addEventListener("input", function () {
            this.classList.remove("error");
            const existingError =
                this.parentNode.parentNode.querySelector(".error-message");
            if (existingError) {
                existingError.remove();
            }
        });
    }
});
