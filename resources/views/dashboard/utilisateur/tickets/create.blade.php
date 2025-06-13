@extends('layouts.user')

@section('title', 'Créer un Ticket - YouTicket')
@section('page-title', 'Nouveau Ticket')
@section('page-subtitle', 'Créez un nouveau ticket de support')

@section('styles')
<style>
    .form-container {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
        margin-bottom: 2rem;
    }
    
    .form-header {
        background: rgba(15, 15, 35, 0.9);
        padding: 2rem;
        border-bottom: 1px solid var(--border);
        text-align: center;
    }
    
    .form-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        color: white;
    }
    
    .form-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }
    
    .form-subtitle {
        color: var(--text-secondary);
        font-size: 0.875rem;
    }
    
    .form-body {
        padding: 2rem;
    }
    
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .form-group.full-width {
        grid-column: 1 / -1;
    }
    
    .form-label {
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .form-label .required {
        color: #f87171;
    }
    
    .form-input, .form-select, .form-textarea {
        padding: 0.75rem 1rem;
        background: rgba(15, 15, 35, 0.5);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--text-primary);
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }
    
    .form-input:focus, .form-select:focus, .form-textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.1);
        background: rgba(15, 15, 35, 0.7);
    }
    
    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        appearance: none;
    }
    
    .form-textarea {
        resize: vertical;
        min-height: 120px;
    }
    
    .form-help {
        font-size: 0.75rem;
        color: var(--text-secondary);
        margin-top: 0.25rem;
    }
    
    .form-error {
        font-size: 0.75rem;
        color: #f87171;
        margin-top: 0.25rem;
    }
    
    .file-upload {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        border: 2px dashed var(--border);
        border-radius: 12px;
        background: rgba(15, 23, 42, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .file-upload:hover {
        border-color: var(--primary);
        background: rgba(15, 23, 42, 0.5);
    }
    
    .file-upload.dragover {
        border-color: var(--primary);
        background: rgba(8, 145, 178, 0.1);
    }
    
    .file-upload-input {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
    }
    
    .file-upload-icon {
        width: 48px;
        height: 48px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        font-size: 1.25rem;
        color: white;
    }
    
    .file-upload-text {
        text-align: center;
        color: var(--text-secondary);
    }
    
    .file-upload-title {
        font-weight: 500;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
    }
    
    .file-list {
        margin-top: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .file-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.75rem;
        background: rgba(15, 23, 42, 0.5);
        border-radius: 8px;
    }
    
    .file-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .file-icon {
        width: 32px;
        height: 32px;
        background: var(--gradient-primary);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.875rem;
    }
    
    .file-details {
        display: flex;
        flex-direction: column;
    }
    
    .file-name {
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.875rem;
    }
    
    .file-size {
        font-size: 0.75rem;
        color: var(--text-secondary);
    }
    
    .file-remove {
        padding: 0.25rem;
        background: rgba(239, 68, 68, 0.2);
        border: none;
        border-radius: 4px;
        color: #f87171;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .file-remove:hover {
        background: rgba(239, 68, 68, 0.3);
    }
    
    .priority-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 0.75rem;
    }
    
    .priority-option {
        position: relative;
    }
    
    .priority-input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }
    
    .priority-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1rem 0.75rem;
        background: rgba(15, 23, 42, 0.5);
        border: 1px solid var(--border);
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }
    
    .priority-input:checked + .priority-label {
        border-color: var(--primary);
        background: rgba(8, 145, 178, 0.1);
    }
    
    .priority-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }
    
    .priority-immediat .priority-icon { background: rgba(239, 68, 68, 0.2); color: #f87171; }
    .priority-urgent .priority-icon { background: rgba(245, 101, 101, 0.2); color: #fca5a5; }
    .priority-standard .priority-icon { background: rgba(59, 130, 246, 0.2); color: #60a5fa; }
    .priority-faible .priority-icon { background: rgba(107, 114, 128, 0.2); color: #9ca3af; }
    
    .priority-text {
        font-size: 0.75rem;
        font-weight: 500;
        color: var(--text-primary);
    }
    
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
    }
    
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-size: 0.875rem;
    }
    
    .btn-primary {
        background: var(--gradient-primary);
        color: white;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }
    
    .btn-secondary {
        background: rgba(71, 85, 105, 0.8);
        color: var(--text-primary);
        border: 1px solid var(--border);
    }
    
    .btn-secondary:hover {
        background: rgba(71, 85, 105, 1);
    }
    
    .progress-steps {
        display: flex;
        justify-content: center;
        margin-bottom: 2rem;
    }
    
    .step {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(30, 41, 59, 0.8);
        border: 1px solid var(--border);
        border-radius: 20px;
        font-size: 0.875rem;
        color: var(--text-secondary);
    }
    
    .step.active {
        background: var(--gradient-primary);
        color: white;
    }
    
    .step-icon {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
    }
    
    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .priority-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .form-body {
            padding: 1.5rem;
        }
        
        .form-header {
            padding: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <!-- Étapes de progression -->
    <div class="progress-steps">
        <div class="step active">
            <div class="step-icon">
                <i class="fas fa-edit"></i>
            </div>
            Création du ticket
        </div>
    </div>

    <!-- Formulaire de création -->
    <div class="form-container">
        <div class="form-header">
            <div class="form-icon">
                <i class="fas fa-plus"></i>
            </div>
            <h1 class="form-title">Créer un nouveau ticket</h1>
            <p class="form-subtitle">Décrivez votre problème ou votre demande en détail pour obtenir une assistance rapide</p>
        </div>
        
        <div class="form-body">
            <form action="" method="POST" enctype="multipart/form-data" id="ticketForm">
                @csrf
                
                <!-- Informations de base -->
                <div class="form-grid">
                    <div class="form-group">
                        <label for="projet" class="form-label">
                            <i class="fas fa-folder"></i>
                            Projet
                        </label>
                        <select name="projet" id="projet" class="form-select">
                            <option value="">Sélectionner un projet</option>
                            <option value="site-web">Site Web</option>
                            <option value="application-mobile">Application Mobile</option>
                            <option value="systeme-erp">Système ERP</option>
                            <option value="infrastructure">Infrastructure</option>
                            <option value="autre">Autre</option>
                        </select>
                        <div class="form-help">Choisissez le projet concerné par votre demande</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="type" class="form-label">
                            <i class="fas fa-tag"></i>
                            Type <span class="required">*</span>
                        </label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="">Sélectionner un type</option>
                            <option value="incident">Incident</option>
                            <option value="demande">Demande de service</option>
                            <option value="probleme">Problème</option>
                            <option value="changement">Demande de changement</option>
                        </select>
                        <div class="form-help">Précisez la nature de votre demande</div>
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="titre" class="form-label">
                            <i class="fas fa-heading"></i>
                            Titre <span class="required">*</span>
                        </label>
                        <input type="text" name="titre" id="titre" class="form-input" placeholder="Résumé court et précis du problème" required>
                        <div class="form-help">Décrivez brièvement votre problème en quelques mots</div>
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="description" class="form-label">
                            <i class="fas fa-align-left"></i>
                            Description détaillée <span class="required">*</span>
                        </label>
                        <textarea name="description" id="description" class="form-textarea" placeholder="Décrivez votre problème en détail : que s'est-il passé ? quand ? dans quelles circonstances ? quelles sont les conséquences ?" required></textarea>
                        <div class="form-help">Plus vous donnez de détails, plus nous pourrons vous aider efficacement</div>
                    </div>
                </div>
                
                <!-- Priorité -->
                <div class="form-group full-width">
                    <label class="form-label">
                        <i class="fas fa-flag"></i>
                        Priorité <span class="required">*</span>
                    </label>
                    <div class="priority-grid">
                        <div class="priority-option priority-immediat">
                            <input type="radio" name="priorite" value="immediat" id="priority-immediat" class="priority-input" required>
                            <label for="priority-immediat" class="priority-label">
                                <div class="priority-icon">
                                    <i class="fas fa-exclamation"></i>
                                </div>
                                <div class="priority-text">Immédiat</div>
                            </label>
                        </div>
                        <div class="priority-option priority-urgent">
                            <input type="radio" name="priorite" value="urgent" id="priority-urgent" class="priority-input">
                            <label for="priority-urgent" class="priority-label">
                                <div class="priority-icon">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                                <div class="priority-text">Urgent</div>
                            </label>
                        </div>
                        <div class="priority-option priority-standard">
                            <input type="radio" name="priorite" value="standard" id="priority-standard" class="priority-input">
                            <label for="priority-standard" class="priority-label">
                                <div class="priority-icon">
                                    <i class="fas fa-minus"></i>
                                </div>
                                <div class="priority-text">Standard</div>
                            </label>
                        </div>
                        <div class="priority-option priority-faible">
                            <input type="radio" name="priorite" value="faible" id="priority-faible" class="priority-input">
                            <label for="priority-faible" class="priority-label">
                                <div class="priority-icon">
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                                <div class="priority-text">Faible</div>
                            </label>
                        </div>
                    </div>
                    <div class="form-help">Évaluez l'urgence de votre demande</div>
                </div>
                
                <!-- Impact et Fréquence -->
                <div class="form-grid">
                    <div class="form-group">
                        <label for="impact" class="form-label">
                            <i class="fas fa-layer-group"></i>
                            Impact <span class="required">*</span>
                        </label>
                        <select name="impact" id="impact" class="form-select" required>
                            <option value="">Sélectionner l'impact</option>
                            <option value="bloquant">Bloquant/Critique</option>
                            <option value="majeur">Majeur/Grave</option>
                            <option value="moyen">Moyen</option>
                            <option value="mineur">Mineur/Faible</option>
                        </select>
                        <div class="form-help">Quel est l'impact sur votre travail ?</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="frequence" class="form-label">
                            <i class="fas fa-sync"></i>
                            Fréquence <span class="required">*</span>
                        </label>
                        <select name="frequence" id="frequence" class="form-select" required>
                            <option value="">Sélectionner la fréquence</option>
                            <option value="tres-forte">Très forte/Tout le temps</option>
                            <option value="forte">Forte/Souvent</option>
                            <option value="faible">Faible/De temps en temps</option>
                            <option value="tres-faible">Très faible/Rarement</option>
                        </select>
                        <div class="form-help">À quelle fréquence le problème survient-il ?</div>
                    </div>
                </div>
                
                <!-- Pièces jointes -->
                <div class="form-group full-width">
                    <label class="form-label">
                        <i class="fas fa-paperclip"></i>
                        Pièces jointes
                    </label>
                    <div class="file-upload" id="fileUpload">
                        <input type="file" name="pieces_jointes[]" id="fileInput" class="file-upload-input" multiple accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.txt,.zip">
                        <div class="file-upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="file-upload-text">
                            <div class="file-upload-title">Glissez vos fichiers ici ou cliquez pour parcourir</div>
                            <div>Formats acceptés: JPG, PNG, PDF, DOC, TXT, ZIP (max 10MB par fichier)</div>
                        </div>
                    </div>
                    <div class="file-list" id="fileList"></div>
                    <div class="form-help">Ajoutez des captures d'écran, documents ou fichiers qui peuvent aider à résoudre votre problème</div>
                </div>
                
                <!-- Actions -->
                <div class="form-actions">
                    <a href="" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Annuler
                    </a>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-paper-plane"></i>
                        Créer le ticket
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Gestion des fichiers
    const fileUpload = document.getElementById('fileUpload');
    const fileInput = document.getElementById('fileInput');
    const fileList = document.getElementById('fileList');
    let selectedFiles = [];
    
    // Drag and drop
    fileUpload.addEventListener('dragover', (e) => {
        e.preventDefault();
        fileUpload.classList.add('dragover');
    });
    
    fileUpload.addEventListener('dragleave', () => {
        fileUpload.classList.remove('dragover');
    });
    
    fileUpload.addEventListener('drop', (e) => {
        e.preventDefault();
        fileUpload.classList.remove('dragover');
        handleFiles(e.dataTransfer.files);
    });
    
    fileInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });
    
    function handleFiles(files) {
        Array.from(files).forEach(file => {
            if (file.size > 10 * 1024 * 1024) { // 10MB limit
                alert(`Le fichier "${file.name}" est trop volumineux (max 10MB)`);
                return;
            }
            
            if (selectedFiles.find(f => f.name === file.name && f.size === file.size)) {
                alert(`Le fichier "${file.name}" est déjà sélectionné`);
                return;
            }
            
            selectedFiles.push(file);
            addFileToList(file);
        });
        
        updateFileInput();
    }
    
    function addFileToList(file) {
        const fileItem = document.createElement('div');
        fileItem.className = 'file-item';
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
            <button type="button" class="file-remove" onclick="removeFile('${file.name}', ${file.size})">
                <i class="fas fa-times"></i>
            </button>
        `;
        fileList.appendChild(fileItem);
    }
    
    function removeFile(fileName, fileSize) {
        selectedFiles = selectedFiles.filter(f => !(f.name === fileName && f.size === fileSize));
        updateFileInput();
        renderFileList();
    }
    
    function renderFileList() {
        fileList.innerHTML = '';
        selectedFiles.forEach(file => addFileToList(file));
    }
    
    function updateFileInput() {
        const dt = new DataTransfer();
        selectedFiles.forEach(file => dt.items.add(file));
        fileInput.files = dt.files;
    }
    
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }
    
    // Auto-resize textarea
    document.getElementById('description').addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });
    
    // Form validation
    document.getElementById('ticketForm').addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Création en cours...';
        submitBtn.disabled = true;
    });
    
    // Priority selection helper
    document.querySelectorAll('input[name="priorite"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Update form help based on priority
            const helpTexts = {
                'immediat': 'Problème critique bloquant complètement votre travail',
                'urgent': 'Problème important nécessitant une résolution rapide',
                'standard': 'Problème normal pouvant attendre le délai habituel',
                'faible': 'Problème mineur ou demande d\'amélioration'
            };
            
            const helpElement = this.closest('.form-group').querySelector('.form-help');
            helpElement.textContent = helpTexts[this.value] || 'Évaluez l\'urgence de votre demande';
        });
    });
    
    // Type selection helper
    document.getElementById('type').addEventListener('change', function() {
        const descriptions = {
            'incident': 'Un service ne fonctionne pas comme prévu',
            'demande': 'Demande d\'un nouveau service ou d\'une nouvelle fonctionnalité',
            'probleme': 'Cause inconnue d\'un ou plusieurs incidents',
            'changement': 'Modification d\'un service existant'
        };
        
        const helpElement = this.parentNode.querySelector('.form-help');
        helpElement.textContent = descriptions[this.value] || 'Précisez la nature de votre demande';
    });
</script>
@endsection
