// Toggle sidebar mobile
document
    .getElementById("mobileMenuToggle")
    .addEventListener("click", function () {
        document.getElementById("sidebar").classList.toggle("open");
    });

// Gestion des dropdowns
const dropdowns = {
    topbarProfileBtn: document.getElementById("topbarProfileBtn"),
    topbarDropdown: document.getElementById("topbarDropdown"),
    notificationBtn: document.getElementById("notificationBtn"),
};

// Toggle dropdown
dropdowns.topbarProfileBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    dropdowns.topbarDropdown.classList.toggle("show");
});

// Fermer le dropdown quand on clique ailleurs
document.addEventListener("click", function (e) {
    if (
        !dropdowns.topbarProfileBtn.contains(e.target) &&
        !dropdowns.topbarDropdown.contains(e.target)
    ) {
        dropdowns.topbarDropdown.classList.remove("show");
    }
});

// Notifications (exemple)
dropdowns.notificationBtn.addEventListener("click", function () {
    alert("Fonctionnalité de notifications à implémenter");
});
