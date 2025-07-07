// agentLayout.js

document.addEventListener("DOMContentLoaded", function() {
    // Toggle sidebar mobile
    const mobileMenuToggle = document.getElementById("mobileMenuToggle");
    const sidebar = document.getElementById("sidebar");
    
    if (mobileMenuToggle && sidebar) {
        mobileMenuToggle.addEventListener("click", function() {
            sidebar.classList.toggle("open");
        });
    }

    // Gestion des dropdowns
    const topbarProfileBtn = document.getElementById("topbarProfileBtn");
    const topbarDropdown = document.getElementById("topbarDropdown");
    const notificationBtn = document.getElementById("notificationBtn");
    const notificationDropdown = document.getElementById("notificationDropdown");

    // Toggle dropdown profil
    if (topbarProfileBtn && topbarDropdown) {
        topbarProfileBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            topbarDropdown.classList.toggle("show");
            if (notificationDropdown) notificationDropdown.classList.remove("show");
        });
    }

    // Toggle dropdown notifications
    if (notificationBtn && notificationDropdown) {
        notificationBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            notificationDropdown.classList.toggle("show");
            if (topbarDropdown) topbarDropdown.classList.remove("show");
        });
    }

    // Fermer les dropdowns au clic extérieur
    document.addEventListener("click", function(e) {
        // Profil
        if (topbarProfileBtn && topbarDropdown && 
            !topbarProfileBtn.contains(e.target) && 
            !topbarDropdown.contains(e.target)) {
            topbarDropdown.classList.remove("show");
        }
        
        // Notifications
        if (notificationBtn && notificationDropdown && 
            !notificationBtn.contains(e.target) && 
            !notificationDropdown.contains(e.target)) {
            notificationDropdown.classList.remove("show");
        }
    });

    // Fermer au scroll
    window.addEventListener("scroll", () => {
        if (topbarDropdown) topbarDropdown.classList.remove("show");
        if (notificationDropdown) notificationDropdown.classList.remove("show");
    });

    // Gestion des messages flash
    const flashMessages = document.querySelectorAll(".flash-message");
    flashMessages.forEach(message => {
        // Fermeture automatique après 5 secondes
        setTimeout(() => {
            message.style.opacity = "0";
            message.style.transform = "translateY(-20px)";
            setTimeout(() => message.remove(), 300);
        }, 5000);

        // Fermeture au clic sur le bouton
        const closeBtn = message.querySelector(".flash-close");
        if (closeBtn) {
            closeBtn.addEventListener("click", function() {
                message.style.opacity = "0";
                message.style.transform = "translateY(-20px)";
                setTimeout(() => message.remove(), 300);
            });
        }
    });

    // Initialiser les tooltips
    if (typeof tippy !== 'undefined') {
        tippy('[data-tippy-content]', {
            placement: 'top',
            animation: 'shift-away',
            duration: 200,
            arrow: true
        });
    }

    // Gestion du menu utilisateur
    const userMenu = document.getElementById("userMenu");
    if (userMenu) {
        userMenu.addEventListener("click", function() {
            window.location.href = '{{ route("agent.profile") }}';
        });
    }
});

// Si vous utilisez des websockets (Laravel Echo)
if (typeof Echo !== 'undefined') {
    // Notification de nouveau ticket assigné
    Echo.private(`agent.${window.authUser.id}`)
        .listen('TicketAssigned', (data) => {
            showToastNotification('Nouveau ticket assigné', `Ticket #${data.ticket.id} - ${data.ticket.title}`, '/tickets/' + data.ticket.id);
        });
    
    // Notification de mise à jour de ticket
    Echo.private(`agent.${window.authUser.id}`)
        .listen('TicketUpdated', (data) => {
            showToastNotification('Ticket mis à jour', `Ticket #${data.ticket.id} - Statut: ${getStatusLabel(data.ticket.status)}`, '/tickets/' + data.ticket.id);
        });
}

// Helper: Afficher une notification toast
function showToastNotification(title, message, url = '#') {
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
    
    // Animation d'entrée
    setTimeout(() => {
        toast.classList.add("show");
    }, 100);
    
    // Fermeture au clic
    toast.addEventListener("click", () => {
        window.location.href = url;
    });
    
    toast.querySelector(".toast-close").addEventListener("click", (e) => {
        e.stopPropagation();
        toast.classList.remove("show");
        setTimeout(() => toast.remove(), 300);
    });
    
    // Fermeture automatique après 5 secondes
    setTimeout(() => {
        toast.classList.remove("show");
        setTimeout(() => toast.remove(), 300);
    }, 5000);
}

// Helper: Obtenir le libellé de statut
function getStatusLabel(status) {
    const labels = {
        'new': 'Nouveau',
        'open': 'Ouvert',
        'pending': 'En attente',
        'solved': 'Résolu',
        'closed': 'Fermé'
    };
    return labels[status] || 'Inconnu';
}