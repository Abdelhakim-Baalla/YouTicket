
// Fonction pour formater la taille des fichiers
function formatFileSize(bytes) {
    if (bytes === 0) return "0 Bytes";
    const k = 1024;
    const sizes = ["Bytes", "KB", "MB", "GB"];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2) + " " + sizes[i];
}

// Modification du message de soumission pour l'édition
document.getElementById("ticketForm").addEventListener("submit", function (e) {
    const submitBtn = document.getElementById("submitBtn");
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enregistrement en cours...';
    submitBtn.disabled = true;
});