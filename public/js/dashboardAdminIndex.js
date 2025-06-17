// Animation des barres de progression
document.addEventListener("DOMContentLoaded", function () {
    // Animation des statistiques
    const statValues = document.querySelectorAll(".stat-value-enhanced");
    statValues.forEach((stat, index) => {
        const finalValue = parseInt(stat.textContent.replace(/,/g, ""));
        stat.textContent = "0";

        setTimeout(() => {
            animateNumber(stat, 0, finalValue, 1500);
        }, index * 200);
    });

    // Animation des barres de métriques
    const metricFills = document.querySelectorAll(".metric-fill");
    metricFills.forEach((fill, index) => {
        const width = fill.style.width;
        fill.style.width = "0%";

        setTimeout(() => {
            fill.style.width = width;
        }, 1000 + index * 200);
    });

    // Animation d'entrée des cartes
    const cards = document.querySelectorAll(
        ".modern-card, .stat-card-enhanced"
    );
    cards.forEach((card, index) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(20px)";

        setTimeout(() => {
            card.style.transition = "all 0.5s ease";
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
        }, index * 100);
    });

    // Animation des tickets
    const tickets = document.querySelectorAll(".ticket-item-modern");
    tickets.forEach((ticket, index) => {
        ticket.style.opacity = "0";
        ticket.style.transform = "translateX(-20px)";

        setTimeout(() => {
            ticket.style.transition = "all 0.3s ease";
            ticket.style.opacity = "1";
            ticket.style.transform = "translateX(0)";
        }, 800 + index * 150);
    });

    // Animation des membres d'équipe
    const members = document.querySelectorAll(".team-member-item");
    members.forEach((member, index) => {
        member.style.opacity = "0";
        member.style.transform = "translateX(20px)";

        setTimeout(() => {
            member.style.transition = "all 0.3s ease";
            member.style.opacity = "1";
            member.style.transform = "translateX(0)";
        }, 1200 + index * 100);
    });
});

// Fonction d'animation des nombres
function animateNumber(element, start, end, duration) {
    const range = end - start;
    const increment = range / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= end) {
            current = end;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current).toLocaleString();
    }, 16);
}

// Mise à jour automatique des données (optionnel)
setInterval(() => {
    // Ici vous pouvez ajouter du code pour rafraîchir les données via AJAX
    console.log("Vérification des nouvelles données...");
}, 30000); // Toutes les 30 secondes

// Raccourcis clavier
document.addEventListener("keydown", function (e) {
    // Ctrl/Cmd + 1 pour aller aux utilisateurs
    if ((e.ctrlKey || e.metaKey) && e.key === "1") {
        e.preventDefault();
        window.location.href = '{{ route("dashboard.admin.utilisateurs") }}';
    }

    // Ctrl/Cmd + 2 pour aller aux équipes
    if ((e.ctrlKey || e.metaKey) && e.key === "2") {
        e.preventDefault();
        window.location.href = '{{ route("dashboard.admin.equipes") }}';
    }

    // Ctrl/Cmd + 3 pour aller à l'historique
    if ((e.ctrlKey || e.metaKey) && e.key === "3") {
        e.preventDefault();
        window.location.href = '{{ route("histories.index") }}';
    }
});
