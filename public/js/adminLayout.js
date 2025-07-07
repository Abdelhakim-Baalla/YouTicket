// Toggle sidebar mobile
document.getElementById("mobileMenuToggle").addEventListener("click", function () {
    document.getElementById("sidebar").classList.toggle("open");
});

// Éléments DOM
const topbarProfileBtn = document.getElementById("topbarProfileBtn");
const topbarDropdown = document.getElementById("topbarDropdown");
const notificationBtn = document.getElementById("notificationBtn");
const notificationDropdown = document.getElementById("notificationDropdown");

// Toggle dropdown profil
topbarProfileBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    topbarDropdown.classList.toggle("show");
    notificationDropdown.classList.remove("show"); // Fermer l'autre dropdown
});

// Toggle dropdown notifications
notificationBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    notificationDropdown.classList.toggle("show");
    topbarDropdown.classList.remove("show"); // Fermer l'autre dropdown
});

// Fermer les dropdowns au clic extérieur
document.addEventListener("click", function (e) {
    // Profil
    if (!topbarProfileBtn.contains(e.target) && !topbarDropdown.contains(e.target)) {
        topbarDropdown.classList.remove("show");
    }
    
    // Notifications
    if (!notificationBtn.contains(e.target) && !notificationDropdown.contains(e.target)) {
        notificationDropdown.classList.remove("show");
    }
});

// Fermer au scroll
window.addEventListener("scroll", () => {
    topbarDropdown.classList.remove("show");
    notificationDropdown.classList.remove("show");
});