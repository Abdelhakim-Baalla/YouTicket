// Gestion du modal de suppression
function openDeleteModal(userId, userName, userEmail) {
    document.getElementById("deleteUserName").textContent = userName;
    document.getElementById("deleteUserEmail").textContent = userEmail;
    // document.getElementById('deleteForm').action = `/admin/utilisateurs/${userId}`;
    document.getElementById("deleteModal").classList.add("show");
}

function closeDeleteModal() {
    document.getElementById("deleteModal").classList.remove("show");
}

// Fermer le modal en cliquant à l'extérieur
document.getElementById("deleteModal").addEventListener("click", function (e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

// Animation d'entrée pour les lignes du tableau
document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll(".modern-table tbody tr");
    rows.forEach((row, index) => {
        row.style.opacity = "0";
        row.style.transform = "translateY(10px)";
        setTimeout(() => {
            row.style.transition = "all 0.3s ease";
            row.style.opacity = "1";
            row.style.transform = "translateY(0)";
        }, index * 50);
    });
});
