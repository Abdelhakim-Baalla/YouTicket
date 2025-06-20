// Gestion des fichiers
const fileUpload = document.getElementById("fileUpload");
const fileInput = document.getElementById("fileInput");
const fileList = document.getElementById("fileList");
const previewContainer = document.getElementById("previewContainer");
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

function getFileIcon(file) {
    const extension = file.name.split(".").pop().toLowerCase();
    const fileType = file.type.split("/")[0];

    const icons = {
        image: "fa-file-image",
        pdf: "fa-file-pdf",
        word: "fa-file-word",
        excel: "fa-file-excel",
        powerpoint: "fa-file-powerpoint",
        audio: "fa-file-audio",
        video: "fa-file-video",
        archive: "fa-file-archive",
        text: "fa-file-alt",
        code: "fa-file-code",
        default: "fa-file",
    };

    if (fileType === "image") return icons.image;
    if (extension === "pdf") return icons.pdf;
    if (["doc", "docx"].includes(extension)) return icons.word;
    if (["xls", "xlsx"].includes(extension)) return icons.excel;
    if (["ppt", "pptx"].includes(extension)) return icons.powerpoint;
    if (["mp3", "wav", "ogg"].includes(extension)) return icons.audio;
    if (["mp4", "mov", "avi"].includes(extension)) return icons.video;
    if (["zip", "rar", "7z"].includes(extension)) return icons.archive;
    if (["txt", "rtf"].includes(extension)) return icons.text;
    if (["js", "html", "css", "php", "json"].includes(extension))
        return icons.code;

    return icons.default;
}

function createPreview(file) {
    const previewItem = document.createElement("div");
    previewItem.className = "preview-item";
    previewItem.dataset.fileName = file.name;
    previewItem.dataset.fileSize = file.size;

    const fileType = file.type.split("/")[0];
    const extension = file.name.split(".").pop().toLowerCase();

    if (fileType === "image") {
        // Prévisualisation d'image
        const reader = new FileReader();
        reader.onload = (e) => {
            previewItem.innerHTML = `
                <div class="preview-content">
                    <img src="${e.target.result}" alt="${
                file.name
            }" class="preview-image">
                    <div class="preview-info">
                        <div class="preview-name">${file.name}</div>
                        <div class="preview-size">${formatFileSize(
                            file.size
                        )}</div>
                    </div>
                    <button type="button" class="preview-remove" onclick="removeFile('${
                        file.name
                    }', ${file.size})">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
        };
        reader.readAsDataURL(file);
    } else {
        // Prévisualisation pour autres types de fichiers
        const icon = getFileIcon(file);
        previewItem.innerHTML = `
            <div class="preview-content">
                <div class="preview-icon">
                    <i class="fas ${icon}"></i>
                </div>
                <div class="preview-info">
                    <div class="preview-name">${file.name}</div>
                    <div class="preview-size">${formatFileSize(file.size)}</div>
                </div>
                <button type="button" class="preview-remove" onclick="removeFile('${
                    file.name
                }', ${file.size})">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
    }

    return previewItem;
}

function handleFiles(files) {
    Array.from(files).forEach((file) => {
        if (file.size > 10 * 1024 * 1024) {
            alert(`Le fichier "${file.name}" est trop volumineux (max 10MB)`);
            return;
        }

        if (
            selectedFiles.some(
                (f) => f.name === file.name && f.size === file.size
            )
        ) {
            alert(`Le fichier "${file.name}" est déjà sélectionné`);
            return;
        }

        selectedFiles.push(file);
        const previewItem = createPreview(file);
        previewContainer.appendChild(previewItem);
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

    // Supprimer la prévisualisation correspondante
    const previewItem = document.querySelector(
        `.preview-item[data-file-name="${fileName}"][data-file-size="${fileSize}"]`
    );
    if (previewItem) {
        previewItem.remove();
    }

    updateFileInput();
}

// function renderFileList() {
//     fileList.innerHTML = "";
//     selectedFiles.forEach((file) => addFileToList(file));
// }

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
