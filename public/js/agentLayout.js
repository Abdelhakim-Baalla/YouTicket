// agentLayout.js
document.addEventListener("DOMContentLoaded", function () {
    const mobileMenuToggle = document.getElementById("mobileMenuToggle");
    const sidebar = document.getElementById("sidebar");

    if (mobileMenuToggle && sidebar) {
        mobileMenuToggle.addEventListener("click", function () {
            sidebar.classList.toggle("open");
        });
    }

    const topbarProfileBtn = document.getElementById("topbarProfileBtn");
    const topbarDropdown = document.getElementById("topbarDropdown");
    const notificationBtn = document.getElementById("notificationBtn");
    const notificationDropdown = document.getElementById(
        "notificationDropdown"
    );

    if (topbarProfileBtn && topbarDropdown) {
        topbarProfileBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            topbarDropdown.classList.toggle("show");
            if (notificationDropdown)
                notificationDropdown.classList.remove("show");
        });
    }

    if (notificationBtn && notificationDropdown) {
        notificationBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            notificationDropdown.classList.toggle("show");
            if (topbarDropdown) topbarDropdown.classList.remove("show");
        });
    }

    document.addEventListener("click", function (e) {
        if (
            topbarProfileBtn &&
            topbarDropdown &&
            !topbarProfileBtn.contains(e.target) &&
            !topbarDropdown.contains(e.target)
        ) {
            topbarDropdown.classList.remove("show");
        }

        if (
            notificationBtn &&
            notificationDropdown &&
            !notificationBtn.contains(e.target) &&
            !notificationDropdown.contains(e.target)
        ) {
            notificationDropdown.classList.remove("show");
        }
    });

    window.addEventListener("scroll", () => {
        if (topbarDropdown) topbarDropdown.classList.remove("show");
        if (notificationDropdown) notificationDropdown.classList.remove("show");
    });

    const flashMessages = document.querySelectorAll(".flash-message");
    flashMessages.forEach((message) => {
        setTimeout(() => {
            message.style.opacity = "0";
            message.style.transform = "translateY(-20px)";
            setTimeout(() => message.remove(), 300);
        }, 5000);

        const closeBtn = message.querySelector(".flash-close");
        if (closeBtn) {
            closeBtn.addEventListener("click", function () {
                message.style.opacity = "0";
                message.style.transform = "translateY(-20px)";
                setTimeout(() => message.remove(), 300);
            });
        }
    });

    if (typeof tippy !== "undefined") {
        tippy("[data-tippy-content]", {
            placement: "top",
            animation: "shift-away",
            duration: 200,
            arrow: true,
        });
    }

    const userMenu = document.getElementById("userMenu");
    if (userMenu) {
        userMenu.addEventListener("click", function () {
            window.location.href = '{{ route("agent.profile") }}';
        });
    }
});

if (typeof Echo !== "undefined") {
    Echo.private(`agent.${window.authUser.id}`).listen(
        "TicketAssigned",
        (data) => {
            showToastNotification(
                "Nouveau ticket assigné",
                `Ticket #${data.ticket.id} - ${data.ticket.title}`,
                "/tickets/" + data.ticket.id
            );
        }
    );

    Echo.private(`agent.${window.authUser.id}`).listen(
        "TicketUpdated",
        (data) => {
            showToastNotification(
                "Ticket mis à jour",
                `Ticket #${data.ticket.id} - Statut: ${getStatusLabel(
                    data.ticket.status
                )}`,
                "/tickets/" + data.ticket.id
            );
        }
    );
}

function showToastNotification(title, message, url = "#") {
    const toast = document.createElement("div");
    toast.className = "toast-notification";
    toast.innerHTML = `
        <div class="toast-header">
            <strong>${title}</strong>
            <button class="toast-close">&times;</button>
        </div>
        <div class="toast-body">${message}</div>
    `;

    document.body.appendChild(toast);

    setTimeout(() => {
        toast.classList.add("show");
    }, 100);

    toast.addEventListener("click", () => {
        window.location.href = url;
    });

    toast.querySelector(".toast-close").addEventListener("click", (e) => {
        e.stopPropagation();
        toast.classList.remove("show");
        setTimeout(() => toast.remove(), 300);
    });

    setTimeout(() => {
        toast.classList.remove("show");
        setTimeout(() => toast.remove(), 300);
    }, 5000);
}

function getStatusLabel(status) {
    const labels = {
        new: "Nouveau",
        open: "Ouvert",
        pending: "En attente",
        solved: "Résolu",
        closed: "Fermé",
    };
    return labels[status] || "Inconnu";
}
