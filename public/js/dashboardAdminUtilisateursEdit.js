// Prévisualisation de la photo
document.getElementById("photo").addEventListener("change", function (e) {
    const file = e.target.files[0];
    const preview = document.getElementById("photoPreview");

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.innerHTML = `<img src="${e.target.result}" alt="Prévisualisation">`;
        };
        reader.readAsDataURL(file);
    }
});

// Confirmation de suppression
function confirmDelete() {
    if (
        confirm(
            '⚠️ ATTENTION !\n\nÊtes-vous sûr de vouloir supprimer cet utilisateur ?\n\nCette action est irréversible et supprimera :\n- L\'utilisateur "{{ $utilisateur->prenom }} {{ $utilisateur->nom }}"\n- Toutes ses données associées\n- Son historique\n\nTapez "SUPPRIMER" pour confirmer :'
        )
    ) {
        const confirmation = prompt(
            'Tapez "SUPPRIMER" pour confirmer la suppression :'
        );
        if (confirmation === "SUPPRIMER") {
            document.getElementById("deleteForm").submit();
        } else {
            alert("Suppression annulée.");
        }
    }
}

// Détection des changements
let originalData = {
    prenom: document.getElementById("prenom").value,
    nom: document.getElementById("nom").value,
    email: document.getElementById("email").value,
    telephone: document.getElementById("telephone").value,
    poste: document.getElementById("poste").value,
    departement: document.getElementById("departement").value,
    equipe_id: document.getElementById("equipe_id").value,
    role_id: document.getElementById("role_id").value,
    actif: document.querySelector('input[name="actif"]:checked').value,
};

function hasChanges() {
    return (
        document.getElementById("prenom").value !== originalData.prenom ||
        document.getElementById("nom").value !== originalData.nom ||
        document.getElementById("email").value !== originalData.email ||
        document.getElementById("telephone").value !== originalData.telephone ||
        document.getElementById("poste").value !== originalData.poste ||
        document.getElementById("departement").value !==
            originalData.departement ||
        document.getElementById("equipe_id").value !== originalData.equipe_id ||
        document.getElementById("role_id").value !== originalData.role_id ||
        document.querySelector('input[name="actif"]:checked').value !==
            originalData.actif
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
    const sections = document.querySelectorAll(".form-section");
    sections.forEach((section, index) => {
        section.style.opacity = "0";
        section.style.transform = "translateY(20px)";

        setTimeout(() => {
            section.style.transition = "all 0.5s ease";
            section.style.opacity = "1";
            section.style.transform = "translateY(0)";
        }, index * 200);
    });
});
