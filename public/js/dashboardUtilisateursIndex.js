document.addEventListener("DOMContentLoaded", function () {
    // Animation des cartes de statistiques
    const statCards = document.querySelectorAll(".stat-card");
    statCards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = "0";
            card.style.transform = "translateY(20px)";

            setTimeout(() => {
                card.style.transition = "all 0.5s ease";
                card.style.opacity = "1";
                card.style.transform = "translateY(0)";
            }, 50);
        }, index * 100);
    });

    // Animation des tickets
    const ticketItems = document.querySelectorAll(".ticket-item");
    ticketItems.forEach((item, index) => {
        item.style.opacity = "0";
        item.style.transform = "translateX(-10px)";

        setTimeout(() => {
            item.style.transition = "all 0.3s ease";
            item.style.opacity = "1";
            item.style.transform = "translateX(0)";
        }, 500 + index * 100);
    });

    // Animation des activités
    const activityItems = document.querySelectorAll(".activity-item");
    activityItems.forEach((item, index) => {
        item.style.opacity = "0";
        item.style.transform = "translateY(10px)";

        setTimeout(() => {
            item.style.transition = "all 0.3s ease";
            item.style.opacity = "1";
            item.style.transform = "translateY(0)";
        }, 800 + index * 100);
    });
});
