// Validation côté client
document
    .getElementById("editTeamForm")
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

// Confirmation de suppression
function confirmDelete() {
    if (
        confirm(
            '⚠️ ATTENTION !\n\nÊtes-vous sûr de vouloir supprimer cette équipe ?\n\nCette action est irréversible et supprimera :\n- L\'équipe "{{ $equipe->nom }}"\n- Tous les liens avec les membres\n- L\'historique associé\n\nTapez "SUPPRIMER" pour confirmer :'
        )
    ) {
        document.getElementById("deleteForm").submit();
    }
}

// Auto-resize textarea
const textarea = document.getElementById("description");
textarea.addEventListener("input", function () {
    this.style.height = "auto";
    this.style.height = this.scrollHeight + "px";
});

// Détection des changements
let originalData = {
    nom: document.getElementById("nom").value,
    description: document.getElementById("description").value,
    active: document.getElementById("active").value,
};

function hasChanges() {
    return (
        document.getElementById("nom").value !== originalData.nom ||
        document.getElementById("description").value !==
            originalData.description ||
        document.getElementById("active").value !== originalData.active
    );
}

// Avertissement avant de quitter si des changements non sauvegardés
window.addEventListener("beforeunload", function (e) {
    if (hasChanges()) {
        e.preventDefault();
        e.returnValue = "";
    }
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
