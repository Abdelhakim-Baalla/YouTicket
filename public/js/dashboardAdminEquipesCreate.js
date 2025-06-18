// Validation côté client
document
    .getElementById("createTeamForm")
    .addEventListener("submit", function (e) {
        const nom = document.getElementById("nom").value.trim();

        if (!nom) {
            e.preventDefault();
            alert("Le nom de l'équipe est obligatoire.");
            document.getElementById("nom").focus();
            return false;
        }

        if (nom.length < 2) {
            e.preventDefault();
            alert("Le nom de l'équipe doit contenir au moins 2 caractères.");
            document.getElementById("nom").focus();
            return false;
        }
    });

// Auto-resize textarea
const textarea = document.getElementById("description");
textarea.addEventListener("input", function () {
    this.style.height = "auto";
    this.style.height = this.scrollHeight + "px";
});

// Animation d'entrée
document.addEventListener("DOMContentLoaded", function () {
    const formCard = document.querySelector(".form-card");
    formCard.style.opacity = "0";
    formCard.style.transform = "translateY(20px)";

    setTimeout(() => {
        formCard.style.transition = "all 0.5s ease";
        formCard.style.opacity = "1";
        formCard.style.transform = "translateY(0)";
    }, 100);
});
