@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Sauvegarde et restauration</h1>
        <button type="button" class="btn btn-primary">
            <i class="fas fa-save me-1"></i> Enregistrer les modifications
        </button>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Navigation</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="/settings" class="list-group-item list-group-item-action">
                            <i class="fas fa-cog me-2"></i> Général
                        </a>
                        <a href="/settings/notifications" class="list-group-item list-group-item-action">
                            <i class="fas fa-bell me-2"></i> Notifications
                        </a>
                        <a href="/settings/integrations" class="list-group-item list-group-item-action">
                            <i class="fas fa-plug me-2"></i> Intégrations
                        </a>
                        <a href="/settings/email" class="list-group-item list-group-item-action">
                            <i class="fas fa-envelope me-2"></i> Email
                        </a>
                        <a href="/settings/security" class="list-group-item list-group-item-action">
                            <i class="fas fa-user-shield me-2"></i> Sécurité
                        </a>
                        <a href="/settings/appearance" class="list-group-item list-group-item-action">
                            <i class="fas fa-palette me-2"></i> Apparence
                        </a>
                        <a href="/settings/language" class="list-group-item list-group-item-action">
                            <i class="fas fa-language me-2"></i> Langue et région
                        </a>
                        <a href="/settings/backup" class="list-group-item list-group-item-action active">
                            <i class="fas fa-database me-2"></i> Sauvegarde et restauration
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Sauvegarde de la base de données</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h6>Sauvegardes automatiques</h6>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="auto_backup" checked>
                            <label class="form-check-label" for="auto_backup">Activer les sauvegardes automatiques</label>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="backup_frequency" class="form-label">Fréquence</label>
                                <select class="form-select" id="backup_frequency">
                                    <option value="daily" selected>Quotidienne</option>
                                    <option value="weekly">Hebdomadaire</option>
                                    <option value="monthly">Mensuelle</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="backup_time" class="form-label">Heure de sauvegarde</label>
                                <input type="time" class="form-control" id="backup_time" value="02:00">
                                <div class="form-text">Heure à laquelle la sauvegarde automatique sera effectuée</div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="backup_retention" class="form-label">Conservation des sauvegardes</label>
                            <select class="form-select" id="backup_retention">
                                <option value="7">7 jours</option>
                                <option value="14">14 jours</option>
                                <option value="30" selected>30 jours</option>
                                <option value="60">60 jours</option>
                                <option value="90">90 jours</option>
                                <option value="180">180 jours</option>
                                <option value="365">1 an</option>
                            </select>
                            <div class="form-text">Les sauvegardes plus anciennes seront automatiquement supprimées</div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h6>Sauvegarde manuelle</h6>
                        <p>Créez une sauvegarde complète de la base de données à tout moment.</p>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="include_attachments" checked>
                                <label class="form-check-label" for="include_attachments">
                                    Inclure les pièces jointes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="include_logs" checked>
                                <label class="form-check-label" for="include_logs">
                                    Inclure les journaux d'activité
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-download me-1"></i> Créer une sauvegarde maintenant
                        </button>
                    </div>
                    
                    <div>
                        <h6>Sauvegardes récentes</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom du fichier</th>
                                        <th>Date</th>
                                        <th>Taille</th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>backup_20250521_020000.zip</td>
                                        <td>21/05/2025 02:00</td>
                                        <td>45.2 Mo</td>
                                        <td><span class="badge bg-info">Automatique</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>backup_20250520_020000.zip</td>
                                        <td>20/05/2025 02:00</td>
                                        <td>44.8 Mo</td>
                                        <td><span class="badge bg-info">Automatique</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>backup_20250519_150532.zip</td>
                                        <td>19/05/2025 15:05</td>
                                        <td>44.5 Mo</td>
                                        <td><span class="badge bg-warning">Manuel</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>backup_20250519_020000.zip</td>
                                        <td>19/05/2025 02:00</td>
                                        <td>44.3 Mo</td>
                                        <td><span class="badge bg-info">Automatique</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>backup_20250518_020000.zip</td>
                                        <td>18/05/2025 02:00</td>
                                        <td>43.9 Mo</td>
                                        <td><span class="badge bg-info">Automatique</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Suivant</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Restauration</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i> La restauration d'une sauvegarde remplacera toutes les données actuelles. Cette action est irréversible.
                    </div>
                    
                    <div class="mb-4">
                        <h6>Restaurer depuis une sauvegarde</h6>
                        <p>Sélectionnez une sauvegarde existante dans la liste ci-dessus ou importez un fichier de sauvegarde.</p>
                        
                        <div class="mb-3">
                            <label for="backup_file" class="form-label">Importer un fichier de sauvegarde</label>
                            <input class="form-control" type="file" id="backup_file">
                            <div class="form-text">Formats acceptés : .zip, .sql</div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="confirm_restore">
                                <label class="form-check-label" for="confirm_restore">
                                    Je comprends que cette action remplacera toutes les données actuelles
                                </label>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-danger" disabled>
                            <i class="fas fa-undo-alt me-1"></i> Restaurer
                        </button>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Stockage des sauvegardes</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="storage_location" class="form-label">Emplacement de stockage</label>
                            <select class="form-select" id="storage_location">
                                <option value="local" selected>Stockage local</option>
                                <option value="s3">Amazon S3</option>
                                <option value="google_drive">Google Drive</option>
                                <option value="dropbox">Dropbox</option>
                                <option value="ftp">FTP</option>
                            </select>
                        </div>
                        
                        <div id="local_storage_settings">
                            <div class="mb-3">
                                <label for="local_path" class="form-label">Chemin de stockage local</label>
                                <input type="text" class="form-control" id="local_path" value="/var/backups/ticketing">
                                <div class="form-text">Chemin absolu sur le serveur où les sauvegardes seront stockées</div>
                            </div>
                        </div>
                        
                        <div id="cloud_storage_settings" style="display: none;">
                            <div class="mb-3">
                                <label for="cloud_key" class="form-label">Clé d'API</label>
                                <input type="password" class="form-control" id="cloud_key">
                            </div>
                            
                            <div class="mb-3">
                                <label for="cloud_secret" class="form-label">Secret d'API</label>
                                <input type="password" class="form-control" id="cloud_secret">
                            </div>
                            
                            <div class="mb-3">
                                <label for="cloud_bucket" class="form-label">Bucket / Dossier</label>
                                <input type="text" class="form-control" id="cloud_bucket" placeholder="backups/ticketing">
                            </div>
                            
                            <div class="mb-3">
                                <label for="cloud_region" class="form-label">Région</label>
                                <input type="text" class="form-control" id="cloud_region" placeholder="eu-west-3">
                            </div>
                            
                            <div class="mb-3">
                                <button type="button" class="btn btn-outline-primary">
                                    <i class="fas fa-check-circle me-1"></i> Tester la connexion
                                </button>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="encrypt_backups" checked>
                                <label class="form-check-label" for="encrypt_backups">Chiffrer les sauvegardes</label>
                            </div>
                            <div class="form-text">Les sauvegardes seront chiffrées avec AES-256 avant d'être stockées</div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="compress_backups" checked>
                                <label class="form-check-label" for="compress_backups">Compresser les sauvegardes</label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="backup_notification" checked>
                                <label class="form-check-label" for="backup_notification">Envoyer une notification après chaque sauvegarde</label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="notification_email" class="form-label">Email de notification</label>
                            <input type="email" class="form-control" id="notification_email" value="admin@exemple.com">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
