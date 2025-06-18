// Gestion des fichiers
const fileUpload = document.getElementById("fileUpload");
const fileInput = document.getElementById("fileInput");
const fileList = document.getElementById("fileList");
let selectedFiles = [];

// Drag and drop
fileUpload.addEventListener("dragover", (e) => {
    e.preventDefault();
    fileUpload.classList.add("dragover");
});

fileUpload.addEventListener("dragleave", () => {
    fileUpload.classList.remove("dragover");
});

fileUpload.addEventListener("drop", (e) => {
    e.preventDefault();
    fileUpload.classList.remove("dragover");
    handleFiles(e.dataTransfer.files);
});

fileInput.addEventListener("change", (e) => {
    handleFiles(e.target.files);
});

function handleFiles(files) {
    Array.from(files).forEach((file) => {
        if (file.size > 10 * 1024 * 1024) {
            // 10MB limit
            alert(`Le fichier "${file.name}" est trop volumineux (max 10MB)`);
            return;
        }

        if (
            selectedFiles.find(
                (f) => f.name === file.name && f.size === file.size
            )
        ) {
            alert(`Le fichier "${file.name}" est déjà sélectionné`);
            return;
        }

        selectedFiles.push(file);
        addFileToList(file);
    });

    updateFileInput();
}

function addFileToList(file) {
    const fileItem = document.createElement("div");
    fileItem.className = "file-item";
    fileItem.innerHTML = `
            <div class="file-info">
                <div class="file-icon">
                    <i class="fas fa-file"></i>
                </div>
                <div class="file-details">
                    <div class="file-name">${file.name}</div>
                    <div class="file-size">${formatFileSize(file.size)}</div>
                </div>
            </div>
            <button type="button" class="file-remove" onclick="removeFile('${
                file.name
            }', ${file.size})">
                <i class="fas fa-times"></i>
            </button>
        `;
    fileList.appendChild(fileItem);
}

function removeFile(fileName, fileSize) {
    selectedFiles = selectedFiles.filter(
        (f) => !(f.name === fileName && f.size === fileSize)
    );
    updateFileInput();
    renderFileList();
}

function renderFileList() {
    fileList.innerHTML = "";
    selectedFiles.forEach((file) => addFileToList(file));
}

function updateFileInput() {
    const dt = new DataTransfer();
    selectedFiles.forEach((file) => dt.items.add(file));
    fileInput.files = dt.files;
}

function formatFileSize(bytes) {
    if (bytes === 0) return "0 Bytes";
    const k = 1024;
    const sizes = ["Bytes", "KB", "MB", "GB"];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + " " + sizes[i];
}

// Auto-resize textarea
document.getElementById("description").addEventListener("input", function () {
    this.style.height = "auto";
    this.style.height = this.scrollHeight + "px";
});

// Form validation
document.getElementById("ticketForm").addEventListener("submit", function (e) {
    const submitBtn = document.getElementById("submitBtn");
    submitBtn.innerHTML =
        '<i class="fas fa-spinner fa-spin"></i> Création en cours...';
    submitBtn.disabled = true;
});

// Priority selection helper
document.querySelectorAll('input[name="priorite"]').forEach((radio) => {
    radio.addEventListener("change", function () {
        // Update form help based on priority
        const helpTexts = {
            immediat: "Problème critique bloquant complètement votre travail",
            urgent: "Problème important nécessitant une résolution rapide",
            standard: "Problème normal pouvant attendre le délai habituel",
            faible: "Problème mineur ou demande d'amélioration",
        };

        const helpElement =
            this.closest(".form-group").querySelector(".form-help");
        helpElement.textContent =
            helpTexts[this.value] || "Évaluez l'urgence de votre demande";
    });
});

// Type selection helper
document.getElementById("type").addEventListener("change", function () {
    const descriptions = {
        incident: "Un service ne fonctionne pas comme prévu",
        demande:
            "Demande d'un nouveau service ou d'une nouvelle fonctionnalité",
        probleme: "Cause inconnue d'un ou plusieurs incidents",
        changement: "Modification d'un service existant",
    };

    const helpElement = this.parentNode.querySelector(".form-help");
    helpElement.textContent =
        descriptions[this.value] || "Précisez la nature de votre demande";
});
