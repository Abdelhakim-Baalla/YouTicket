// Gestion du sidebar sur mobile
document.getElementById("sidebarToggle").addEventListener("click", function () {
    document.getElementById("sidebar").classList.toggle("show");
});

// Fermer le sidebar en cliquant à l'extérieur (sur mobile)
document.addEventListener("click", function (e) {
    const sidebar = document.getElementById("sidebar");
    const sidebarToggle = document.getElementById("sidebarToggle");

    if (
        window.innerWidth <= 1024 &&
        !sidebar.contains(e.target) &&
        e.target !== sidebarToggle &&
        !sidebarToggle.contains(e.target)
    ) {
        sidebar.classList.remove("show");
    }
});

// Gestion des notifications
document
    .getElementById("notificationToggle")
    .addEventListener("click", function (e) {
        e.stopPropagation();
        document.getElementById("notificationMenu").classList.toggle("show");
    });

// Fermer le menu de notifications en cliquant à l'extérieur
document.addEventListener("click", function (e) {
    const notificationMenu = document.getElementById("notificationMenu");
    const notificationToggle = document.getElementById("notificationToggle");

    if (
        !notificationMenu.contains(e.target) &&
        e.target !== notificationToggle &&
        !notificationToggle.contains(e.target)
    ) {
        notificationMenu.classList.remove("show");
    }
});

// Menu utilisateur (à implémenter si nécessaire)
document.getElementById("userMenu").addEventListener("click", function () {
    // Afficher un menu déroulant ou rediriger vers la page de profil
    window.location.href = '{{ route("profile") }}';
});

// Fermeture automatique des messages après 5 secondes
document.addEventListener("DOMContentLoaded", function () {
    const flashMessages = document.querySelectorAll(".fixed > div");

    flashMessages.forEach((message) => {
        setTimeout(() => {
            message.classList.add("fade-out");
            setTimeout(() => message.remove(), 300);
        }, 5000);

        // Fermeture au clic sur le bouton
        const closeBtn = message.querySelector("button");
        if (closeBtn) {
            closeBtn.addEventListener("click", function () {
                message.classList.add("fade-out");
                setTimeout(() => message.remove(), 300);
            });
        }
    });
});
