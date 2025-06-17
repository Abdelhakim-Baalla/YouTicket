// Confirmation de suppression
function confirmDelete() {
    if (
        confirm(
            '⚠️ ATTENTION !\n\nÊtes-vous sûr de vouloir supprimer cette équipe ?\n\nCette action est irréversible et supprimera :\n- L\'équipe "{{ $equipe->nom }}"\n- Tous les liens avec les membres\n- L\'historique associé\n\nTapez "SUPPRIMER" pour confirmer :'
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

// Animation d'entrée
document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".detail-card");
    cards.forEach((card, index) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(20px)";

        setTimeout(() => {
            card.style.transition = "all 0.5s ease";
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
        }, index * 100);
    });

    // Animation des membres
    const members = document.querySelectorAll(".member-item");
    members.forEach((member, index) => {
        member.style.opacity = "0";
        member.style.transform = "translateX(-10px)";

        setTimeout(() => {
            member.style.transition = "all 0.3s ease";
            member.style.opacity = "1";
            member.style.transform = "translateX(0)";
        }, 500 + index * 100);
    });
});
