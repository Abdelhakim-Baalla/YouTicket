// Mobile menu toggle
document
    .getElementById("mobile-menu-btn")
    .addEventListener("click", function () {
        document.getElementById("mobile-menu").classList.toggle("show");
    });

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    });
});

// Flash messages handling
document.addEventListener("DOMContentLoaded", function () {
    const flashMessages = document.querySelectorAll(".flash-message");

    flashMessages.forEach((message) => {
        // Auto-remove after 5 seconds
        setTimeout(() => {
            message.classList.add("slide-out");
            setTimeout(() => message.remove(), 300);
        }, 5000);

        // Close button functionality
        const closeBtn = message.querySelector(".close-flash");
        if (closeBtn) {
            closeBtn.addEventListener("click", () => {
                message.classList.add("slide-out");
                setTimeout(() => message.remove(), 300);
            });
        }
    });
});
