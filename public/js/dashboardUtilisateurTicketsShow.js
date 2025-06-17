document.addEventListener("DOMContentLoaded", function () {
    // Wait a tiny bit to ensure all content is rendered
    setTimeout(function () {
        const commentsBody = document.querySelector(".comments-body");
        if (commentsBody) {
            commentsBody.scrollTop = commentsBody.scrollHeight;
        }
    }, 100);
});
function shareTicket() {
    if (navigator.share) {
        navigator.share({
            title: "{{$ticket->numero}} - {{$ticket->titre}}",
            text: "Consultez ce ticket de support",
            url: window.location.href,
        });
    } else {
        // Fallback: copier l'URL dans le presse-papiers
        navigator.clipboard.writeText(window.location.href).then(function () {
            alert("Lien copié dans le presse-papiers !");
        });
    }
}

// Auto-resize textarea
document.getElementById("comment").addEventListener("input", function () {
    this.style.height = "auto";
    this.style.height = this.scrollHeight + "px";
});

// Confirmation avant suppression (si applicable)
function confirmDelete() {
    return confirm(
        "Êtes-vous sûr de vouloir supprimer ce ticket ? Cette action est irréversible."
    );
}
