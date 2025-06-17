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

    // Auto-submit des filtres avec délai
    const filterInputs = document.querySelectorAll(
        ".filter-input, .filter-select"
    );
    let filterTimeout;

    filterInputs.forEach((input) => {
        input.addEventListener("change", function () {
            clearTimeout(filterTimeout);
            filterTimeout = setTimeout(() => {
                this.closest("form").submit();
            }, 500);
        });
    });
});

// Raccourcis clavier
document.addEventListener("keydown", function (e) {
    // Ctrl/Cmd + F pour focus sur la recherche
    if ((e.ctrlKey || e.metaKey) && e.key === "f") {
        e.preventDefault();
        document.querySelector(".filter-input")?.focus();
    }

    // Échap pour réinitialiser les filtres
    if (e.key === "Escape") {
        window.location.href = '{{ route("histories.index") }}';
    }
});
