// Recherche en temps réel
document.getElementById("searchInput").addEventListener("input", function () {
    const searchTerm = this.value.toLowerCase();
    const tableRows = document.querySelectorAll("#equipesTable tbody tr");

    tableRows.forEach((row) => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? "" : "none";
    });
});

// Animation d'entrée pour les lignes du tableau
document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll("#equipesTable tbody tr");
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
