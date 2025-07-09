// dashboardAgentIndex.js

// Toggle sidebar mobile (compatible avec le layout agent)
document.addEventListener("DOMContentLoaded", function () {
    // Gestion du sidebar mobile
    const mobileMenuToggle = document.getElementById("mobileMenuToggle");
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener("click", function () {
            document.getElementById("sidebar").classList.toggle("open");
        });
    }

    // Gestion des dropdowns (profil et notifications)
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

    // Fermer les dropdowns au clic extérieur
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

    // Fermer au scroll
    window.addEventListener("scroll", () => {
        if (topbarDropdown) topbarDropdown.classList.remove("show");
        if (notificationDropdown) notificationDropdown.classList.remove("show");
    });

    // Animation des éléments du dashboard
    animateDashboardElements();

    // Gestion des tickets (interactions)
    setupTicketInteractions();

    // Mise à jour automatique des données
    setupDataRefresh();

    // Raccourcis clavier spécifiques aux agents
    setupKeyboardShortcuts();

    // Gestion des notifications en temps réel
    setupRealTimeNotifications();
});

// Animation des éléments du dashboard
function animateDashboardElements() {
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
}

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

// Configuration des interactions avec les tickets
function setupTicketInteractions() {
    // Gestion du clic sur un ticket
    const ticketItems = document.querySelectorAll(".ticket-item-modern");
    ticketItems.forEach((ticket) => {
        ticket.addEventListener("click", function (e) {
            // Si on clique sur un lien à l'intérieur, on ne fait rien
            if (e.target.tagName === "A" || e.target.closest("a")) return;

            const ticketId =
                this.dataset.ticketId ||
                this.querySelector(".ticket-id-modern").textContent.replace(
                    "#YT-",
                    ""
                );
            window.location.href = `/tickets/${ticketId}`;
        });
    });

    // Tooltip pour les tickets
    tippy("[data-tippy-content]", {
        placement: "top",
        animation: "shift-away",
        duration: 200,
        arrow: true,
    });
}

// Mise à jour automatique des données
function setupDataRefresh() {
    // Intervalle de rafraîchissement des données (30 secondes)
    const refreshInterval = 30000;
    let isRefreshing = false;

    setInterval(async () => {
        if (isRefreshing) return;
        isRefreshing = true;

        try {
            const response = await fetch("/api/agent/dashboard-data");
            const data = await response.json();

            // Mise à jour des statistiques
            updateStatistics(data.stats);

            // Mise à jour de la liste des tickets
            updateTicketList(data.recentTickets);

            // Mise à jour des indicateurs
            updateMetrics(data.metrics);

            // Notification discrète si nouveaux tickets
            if (data.newTicketsCount > 0) {
                showNewTicketsNotification(data.newTicketsCount);
            }
        } catch (error) {
            console.error(
                "Erreur lors du rafraîchissement des données:",
                error
            );
        } finally {
            isRefreshing = false;
        }
    }, refreshInterval);
}

// Mise à jour des statistiques
function updateStatistics(stats) {
    // Tickets assignés
    animateNumber(
        document.querySelector(
            ".stat-card-enhanced:nth-child(1) .stat-value-enhanced"
        ),
        parseInt(
            document
                .querySelector(
                    ".stat-card-enhanced:nth-child(1) .stat-value-enhanced"
                )
                .textContent.replace(/,/g, "")
        ),
        stats.assignedTickets,
        1000
    );

    // Tickets résolus
    animateNumber(
        document.querySelector(
            ".stat-card-enhanced:nth-child(2) .stat-value-enhanced"
        ),
        parseInt(
            document
                .querySelector(
                    ".stat-card-enhanced:nth-child(2) .stat-value-enhanced"
                )
                .textContent.replace(/,/g, "")
        ),
        stats.resolvedTickets,
        1000
    );

    // Temps moyen
    document.querySelector(
        ".stat-card-enhanced:nth-child(3) .stat-value-enhanced"
    ).textContent = stats.averageTime;

    // Satisfaction
    document.querySelector(
        ".stat-card-enhanced:nth-child(4) .stat-value-enhanced"
    ).textContent = stats.satisfactionRating;
}

// Mise à jour de la liste des tickets
function updateTicketList(tickets) {
    const ticketsContainer = document.querySelector(".tickets-list");
    if (!ticketsContainer) return;

    // Si pas de tickets, afficher l'état vide
    if (tickets.length === 0) {
        ticketsContainer.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-check-circle"></i>
                <p>Aucun ticket assigné pour le moment</p>
            </div>
        `;
        return;
    }

    // Générer le HTML pour les nouveaux tickets
    let ticketsHTML = "";
    tickets.forEach((ticket) => {
        ticketsHTML += `
            <a href="/tickets/${
                ticket.id
            }" class="ticket-item-modern" data-ticket-id="${ticket.id}">
                <div class="ticket-priority-bar priority-${
                    ticket.priority
                }"></div>
                <div class="ticket-header-modern">
                    <div class="ticket-id-modern">#YT-${String(
                        ticket.id
                    ).padStart(4, "0")}</div>
                    <div class="ticket-status-modern status-${ticket.status}">
                        ${getStatusIcon(ticket.status)} ${getStatusLabel(
            ticket.status
        )}
                    </div>
                </div>
                <h3 class="ticket-title-modern">${ticket.title}</h3>
                <p class="ticket-description-modern">
                    ${
                        ticket.description.length > 100
                            ? ticket.description.substring(0, 100) + "..."
                            : ticket.description
                    }
                </p>
                <div class="ticket-footer-modern">
                    <div class="ticket-client-modern">
                        <div class="client-avatar-modern">
                            ${ticket.user.firstName.charAt(
                                0
                            )}${ticket.user.lastName.charAt(0)}
                        </div>
                        <div class="client-name-modern">${
                            ticket.user.firstName
                        } ${ticket.user.lastName}</div>
                    </div>
                    <div class="ticket-time-modern" data-tippy-content="${new Date(
                        ticket.createdAt
                    ).toLocaleString()}">
                        ${formatRelativeTime(new Date(ticket.createdAt))}
                    </div>
                </div>
            </a>
        `;
    });

    ticketsContainer.innerHTML = ticketsHTML;
    setupTicketInteractions(); // Reconfigurer les interactions
}

// Mise à jour des indicateurs
function updateMetrics(metrics) {
    // Taux de résolution
    const resolutionFill = document.querySelector(
        ".metric-item:nth-child(1) .metric-fill"
    );
    if (resolutionFill) {
        resolutionFill.style.width = `${metrics.resolutionRate}%`;
        document.querySelector(
            ".metric-item:nth-child(1) .metric-value"
        ).textContent = `${metrics.resolutionRate}%`;
    }

    // Tickets en retard
    const overdueFill = document.querySelector(
        ".metric-item:nth-child(2) .metric-fill"
    );
    if (overdueFill) {
        overdueFill.style.width = `${metrics.overduePercentage}%`;
        document.querySelector(
            ".metric-item:nth-child(2) .metric-value"
        ).textContent = metrics.overdueCount;
    }

    // Satisfaction client
    const satisfactionFill = document.querySelector(
        ".metric-item:nth-child(3) .metric-fill"
    );
    if (satisfactionFill) {
        satisfactionFill.style.width = `${
            (metrics.satisfactionRating / 5) * 100
        }%`;
        document.querySelector(
            ".metric-item:nth-child(3) .metric-value"
        ).textContent = `${metrics.satisfactionRating}/5`;
    }
}

// Notification de nouveaux tickets
function showNewTicketsNotification(count) {
    const notification = document.createElement("div");
    notification.className = "new-tickets-notification";
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-ticket-alt"></i>
            <span>${count} nouveau(x) ticket(s) assigné(s)</span>
        </div>
    `;

    document.body.appendChild(notification);

    // Animation d'entrée
    setTimeout(() => {
        notification.style.opacity = "1";
        notification.style.transform = "translateY(0)";
    }, 100);

    // Disparaît après 5 secondes
    setTimeout(() => {
        notification.style.opacity = "0";
        notification.style.transform = "translateY(-20px)";
        setTimeout(() => notification.remove(), 300);
    }, 5000);

    // Fermeture au clic
    notification.addEventListener("click", () => {
        notification.style.opacity = "0";
        notification.style.transform = "translateY(-20px)";
        setTimeout(() => notification.remove(), 300);
    });
}

// Configuration des raccourcis clavier
function setupKeyboardShortcuts() {
    document.addEventListener("keydown", function (e) {
        // Ctrl/Cmd + N pour nouveau ticket
        if ((e.ctrlKey || e.metaKey) && e.key === "n") {
            e.preventDefault();
            window.location.href = "/tickets/create";
        }

        // Ctrl/Cmd + T pour voir tous les tickets
        if ((e.ctrlKey || e.metaKey) && e.key === "t") {
            e.preventDefault();
            window.location.href = "/agent/tickets";
        }

        // Ctrl/Cmd + K pour base de connaissances
        if ((e.ctrlKey || e.metaKey) && e.key === "k") {
            e.preventDefault();
            window.location.href = "/agent/knowledgebase";
        }

        // Ctrl/Cmd + R pour actualiser les données
        if ((e.ctrlKey || e.metaKey) && e.key === "r") {
            e.preventDefault();
            setupDataRefresh(); // Force le rafraîchissement
        }
    });
}

// Configuration des notifications en temps réel
function setupRealTimeNotifications() {
    // Utilisation de Laravel Echo ou équivalent pour les websockets
    if (typeof Echo !== "undefined") {
        // Notification de nouveau ticket assigné
        Echo.private(`agent.${window.authUser.id}`).listen(
            "TicketAssigned",
            (data) => {
                showNewTicketAssignedNotification(data.ticket);
            }
        );

        // Notification de mise à jour de ticket
        Echo.private(`agent.${window.authUser.id}`).listen(
            "TicketUpdated",
            (data) => {
                showTicketUpdatedNotification(data.ticket);
            }
        );
    }
}

// Notification de ticket assigné
function showNewTicketAssignedNotification(ticket) {
    const notification = document.createElement("div");
    notification.className = "ticket-notification";
    notification.innerHTML = `
        <div class="notification-header">
            <i class="fas fa-ticket-alt"></i>
            <span>Nouveau ticket assigné</span>
            <button class="close-btn">&times;</button>
        </div>
        <div class="notification-body">
            <strong>#YT-${String(ticket.id).padStart(4, "0")}</strong> - ${
        ticket.title
    }
        </div>
        <div class="notification-footer">
            <a href="/tickets/${ticket.id}">Voir le ticket</a>
        </div>
    `;

    document.body.appendChild(notification);

    // Animation et gestion de la fermeture
    setTimeout(() => notification.classList.add("show"), 100);

    notification.querySelector(".close-btn").addEventListener("click", () => {
        notification.classList.remove("show");
        setTimeout(() => notification.remove(), 300);
    });

    // Fermeture automatique après 10 secondes
    setTimeout(() => {
        notification.classList.remove("show");
        setTimeout(() => notification.remove(), 300);
    }, 10000);
}

// Notification de mise à jour de ticket
function showTicketUpdatedNotification(ticket) {
    const notification = document.createElement("div");
    notification.className = "ticket-notification";
    notification.innerHTML = `
        <div class="notification-header">
            <i class="fas fa-sync-alt"></i>
            <span>Ticket mis à jour</span>
            <button class="close-btn">&times;</button>
        </div>
        <div class="notification-body">
            <strong>#YT-${String(ticket.id).padStart(
                4,
                "0"
            )}</strong> - Statut: ${getStatusLabel(ticket.status)}
        </div>
        <div class="notification-footer">
            <a href="/tickets/${ticket.id}">Voir le ticket</a>
        </div>
    `;

    document.body.appendChild(notification);

    // Animation et gestion de la fermeture
    setTimeout(() => notification.classList.add("show"), 100);

    notification.querySelector(".close-btn").addEventListener("click", () => {
        notification.classList.remove("show");
        setTimeout(() => notification.remove(), 300);
    });

    // Fermeture automatique après 10 secondes
    setTimeout(() => {
        notification.classList.remove("show");
        setTimeout(() => notification.remove(), 300);
    }, 10000);
}

// Helper: Obtenir l'icône de statut
function getStatusIcon(status) {
    switch (status) {
        case "new":
            return '<i class="fas fa-star"></i>';
        case "open":
            return '<i class="fas fa-hourglass-half"></i>';
        case "pending":
            return '<i class="fas fa-clock"></i>';
        case "solved":
            return '<i class="fas fa-check"></i>';
        case "closed":
            return '<i class="fas fa-times"></i>';
        default:
            return '<i class="fas fa-question"></i>';
    }
}

// Helper: Obtenir le libellé de statut
function getStatusLabel(status) {
    switch (status) {
        case "new":
            return "Nouveau";
        case "open":
            return "Ouvert";
        case "pending":
            return "En attente";
        case "solved":
            return "Résolu";
        case "closed":
            return "Fermé";
        default:
            return "Inconnu";
    }
}

// Helper: Formater le temps relatif
function formatRelativeTime(date) {
    const now = new Date();
    const diffInSeconds = Math.floor((now - date) / 1000);

    if (diffInSeconds < 60) return "à l'instant";
    if (diffInSeconds < 3600)
        return `il y a ${Math.floor(diffInSeconds / 60)} min`;
    if (diffInSeconds < 86400)
        return `il y a ${Math.floor(diffInSeconds / 3600)} h`;
    if (diffInSeconds < 604800)
        return `il y a ${Math.floor(diffInSeconds / 86400)} j`;

    return date.toLocaleDateString();
}
