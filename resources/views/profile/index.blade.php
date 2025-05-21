@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Mon profil</h1>
        <button type="button" class="btn btn-primary">
            <i class="fas fa-save me-1"></i> Enregistrer les modifications
        </button>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <div class="position-relative d-inline-block">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto" style="width: 120px; height: 120px; font-size: 48px;">
                                <i class="fas fa-user"></i>
                            </div>
                            <button type="button" class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle" style="width: 32px; height: 32px;">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                    </div>
                    <h5 class="card-title">Pierre Durand</h5>
                    <p class="text-muted">Administrateur</p>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="fas fa-key me-1"></i> Changer le mot de passe
                        </button>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Navigation</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="#personal_info" class="list-group-item list-group-item-action active">
                            <i class="fas fa-user me-2"></i> Informations personnelles
                        </a>
                        <a href="#account_settings" class="list-group-item list-group-item-action">
                            <i class="fas fa-cog me-2"></i> Paramètres du compte
                        </a>
                        <a href="#notifications" class="list-group-item list-group-item-action">
                            <i class="fas fa-bell me-2"></i> Préférences de notification
                        </a>
                        <a href="#security" class="list-group-item list-group-item-action">
                            <i class="fas fa-shield-alt me-2"></i> Sécurité
                        </a>
                        <a href="#api_tokens" class="list-group-item list-group-item-action">
                            <i class="fas fa-key me-2"></i> Jetons API
                        </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Statistiques</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>Tickets créés</span>
                            <span class="badge bg-primary rounded-pill">24</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>Tickets résolus</span>
                            <span class="badge bg-success rounded-pill">18</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>Commentaires</span>
                            <span class="badge bg-info rounded-pill">42</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>Dernière connexion</span>
                            <span class="text-muted small">21/05/2025 08:30</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>Membre depuis</span>
                            <span class="text-muted small">01/01/2025</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card mb-4" id="personal_info">
                <div class="card-header">
                    <h5 class="card-title">Informations personnelles</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="first_name" value="Pierre">
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="last_name" value="Durand">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="pierre.durand@exemple.com">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" id="phone" value="+33 1 23 45 67 89">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="job_title" class="form-label">Titre du poste</label>
                            <input type="text" class="form-control" id="job_title" value="Directeur informatique">
                        </div>

                        <div class="mb-3">
                            <label for="department" class="form-label">Département</label>
                            <select class="form-select" id="department">
                                <option value="">Sélectionner un département</option>
                                <option value="it" selected>IT</option>
                                <option value="accounting">Comptabilité</option>
                                <option value="hr">Ressources Humaines</option>
                                <option value="marketing">Marketing</option>
                                <option value="sales">Ventes</option>
                                <option value="management">Direction</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Biographie</label>
                            <textarea class="form-control" id="bio" rows="3">Directeur informatique avec plus de 15 ans d'expérience dans la gestion des systèmes d'information et des équipes techniques.</textarea>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4" id="account_settings">
                <div class="card-header">
                    <h5 class="card-title">Paramètres du compte</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="language" class="form-label">Langue</label>
                            <select class="form-select" id="language">
                                <option value="fr" selected>Français</option>
                                <option value="en">English</option>
                                <option value="es">Español</option>
                                <option value="de">Deutsch</option>
                                <option value="it">Italiano</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="timezone" class="form-label">Fuseau horaire</label>
                            <select class="form-select" id="timezone">
                                <option value="UTC">UTC</option>
                                <option value="Europe/Paris" selected>Europe/Paris</option>
                                <option value="Europe/London">Europe/London</option>
                                <option value="America/New_York">America/New_York</option>
                                <option value="America/Los_Angeles">America/Los_Angeles</option>
                                <option value="Asia/Tokyo">Asia/Tokyo</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date_format" class="form-label">Format de date</label>
                            <select class="form-select" id="date_format">
                                <option value="d/m/Y" selected>DD/MM/YYYY (31/12/2025)</option>
                                <option value="m/d/Y">MM/DD/YYYY (12/31/2025)</option>
                                <option value="Y-m-d">YYYY-MM-DD (2025-12-31)</option>
                                <option value="d F Y">DD Month YYYY (31 Décembre 2025)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="time_format" class="form-label">Format d'heure</label>
                            <select class="form-select" id="time_format">
                                <option value="H:i" selected>24 heures (14:30)</option>
                                <option value="h:i A">12 heures (02:30 PM)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="dark_mode">
                                <label class="form-check-label" for="dark_mode">Mode sombre</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="compact_mode">
                                <label class="form-check-label" for="compact_mode">Mode compact</label>
                            </div>
                            <div class="form-text">Réduit l'espacement pour afficher plus de contenu à l'écran</div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4" id="notifications">
                <div class="card-header">
                    <h5 class="card-title">Préférences de notification</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Canaux de notification</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notify_email" checked>
                                <label class="form-check-label" for="notify_email">
                                    Email
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notify_browser" checked>
                                <label class="form-check-label" for="notify_browser">
                                    Notifications du navigateur
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notify_sms">
                                <label class="form-check-label" for="notify_sms">
                                    SMS
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notify_slack">
                                <label class="form-check-label" for="notify_slack">
                                    Slack
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Événements</label>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Événement</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Navigateur</th>
                                            <th class="text-center">SMS</th>
                                            <th class="text-center">Slack</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Nouveau ticket assigné</td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        </tr>
                                        <tr>
                                            <td>Commentaire sur un ticket assigné</td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        </tr>
                                        <tr>
                                            <td>Ticket proche de l'échéance SLA</td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        </tr>
                                        <tr>
                                            <td>Ticket résolu</td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        </tr>
                                        <tr>
                                            <td>Nouvel article dans la base de connaissances</td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="notification_frequency" class="form-label">Fréquence des notifications</label>
                            <select class="form-select" id="notification_frequency">
                                <option value="immediate" selected>Immédiate</option>
                                <option value="hourly">Toutes les heures</option>
                                <option value="daily">Quotidienne (résumé)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="quiet_hours" checked>
                                <label class="form-check-label" for="quiet_hours">Activer les heures de silence</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="quiet_hours_start" class="form-label">Début des heures de silence</label>
                                <input type="time" class="form-control" id="quiet_hours_start" value="22:00">
                            </div>
                            <div class="col-md-6">
                                <label for="quiet_hours_end" class="form-label">Fin des heures de silence</label>
                                <input type="time" class="form-control" id="quiet_hours_end" value="07:00">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4" id="security">
                <div class="card-header">
                    <h5 class="card-title">Sécurité</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h6>Changer le mot de passe</h6>
                        <form>
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Mot de passe actuel</label>
                                <input type="password" class="form-control" id="current_password">
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="new_password">
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirmer le nouveau mot de passe</label>
                                <input type="password" class="form-control" id="confirm_password">
                            </div>
                            <button type="button" class="btn btn-primary">Changer le mot de passe</button>
                        </form>
                    </div>

                    <div class="mb-4">
                        <h6>Authentification à deux facteurs</h6>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enable_2fa">
                                <label class="form-check-label" for="enable_2fa">Activer l'authentification à deux facteurs</label>
                            </div>
                            <div class="form-text">Ajoute une couche de sécurité supplémentaire à votre compte</div>
                        </div>
                        <button type="button" class="btn btn-outline-primary" disabled>Configurer l'authentification à deux facteurs</button>
                    </div>

                    <div class="mb-4">
                        <h6>Sessions actives</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Appareil</th>
                                        <th>Navigateur</th>
                                        <th>Adresse IP</th>
                                        <th>Dernière activité</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <i class="fas fa-desktop me-1"></i> Windows 10
                                        </td>
                                        <td>Chrome 112.0</td>
                                        <td>192.168.1.105</td>
                                        <td>Actuellement</td>
                                        <td><span class="badge bg-success">Session actuelle</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-mobile-alt me-1"></i> iPhone 13
                                        </td>
                                        <td>Safari 15.4</td>
                                        <td>192.168.1.110</td>
                                        <td>Il y a 2 heures</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-sign-out-alt"></i> Déconnecter
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-laptop me-1"></i> MacBook Pro
                                        </td>
                                        <td>Firefox 99.0</td>
                                        <td>192.168.1.120</td>
                                        <td>Hier, 15:45</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-sign-out-alt"></i> Déconnecter
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-outline-danger">
                            <i class="fas fa-sign-out-alt me-1"></i> Déconnecter toutes les autres sessions
                        </button>
                    </div>

                    <div>
                        <h6>Historique de connexion</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date et heure</th>
                                        <th>Appareil</th>
                                        <th>Navigateur</th>
                                        <th>Adresse IP</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>21/05/2025 08:30</td>
                                        <td>Windows 10</td>
                                        <td>Chrome 112.0</td>
                                        <td>192.168.1.105</td>
                                        <td><span class="badge bg-success">Réussi</span></td>
                                    </tr>
                                    <tr>
                                        <td>20/05/2025 17:15</td>
                                        <td>iPhone 13</td>
                                        <td>Safari 15.4</td>
                                        <td>192.168.1.110</td>
                                        <td><span class="badge bg-success">Réussi</span></td>
                                    </tr>
                                    <tr>
                                        <td>20/05/2025 09:45</td>
                                        <td>Windows 10</td>
                                        <td>Chrome 112.0</td>
                                        <td>192.168.1.105</td>
                                        <td><span class="badge bg-success">Réussi</span></td>
                                    </tr>
                                    <tr>
                                        <td>19/05/2025 14:20</td>
                                        <td>MacBook Pro</td>
                                        <td>Firefox 99.0</td>
                                        <td>192.168.1.120</td>
                                        <td><span class="badge bg-success">Réussi</span></td>
                                    </tr>
                                    <tr>
                                        <td>19/05/2025 08:10</td>
                                        <td>Inconnu</td>
                                        <td>Chrome 112.0</td>
                                        <td>203.0.113.42</td>
                                        <td><span class="badge bg-danger">Échoué</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="api_tokens">
                <div class="card-header">
                    <h5 class="card-title">Jetons API</h5>
                </div>
                <div class="card-body">
                    <p>Créez des jetons API pour accéder à l'API du système de ticketing depuis des applications externes.</p>
                    
                    <div class="mb-4">
                        <h6>Créer un nouveau jeton</h6>
                        <form>
                            <div class="mb-3">
                                <label for="token_name" class="form-label">Nom du jeton</label>
                                <input type="text" class="form-control" id="token_name" placeholder="Ex: Application mobile">
                            </div>
                            <div class="mb-3">
                                <label for="token_permissions" class="form-label">Permissions</label>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="perm_read_tickets" checked>
                                    <label class="form-check-label" for="perm_read_tickets">
                                        Lire les tickets
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="perm_create_tickets" checked>
                                    <label class="form-check-label" for="perm_create_tickets">
                                        Créer des tickets
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="perm_update_tickets">
                                    <label class="form-check-label" for="perm_update_tickets">
                                        Mettre à jour des tickets
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="perm_delete_tickets">
                                    <label class="form-check-label" for="perm_delete_tickets">
                                        Supprimer des tickets
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="perm_read_users">
                                    <label class="form-check-label" for="perm_read_users">
                                        Lire les utilisateurs
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="token_expiration" class="form-label">Expiration</label>
                                <select class="form-select" id="token_expiration">
                                    <option value="never">Jamais</option>
                                    <option value="1_day">1 jour</option>
                                    <option value="7_days">7 jours</option>
                                    <option value="30_days" selected>30 jours</option>
                                    <option value="60_days">60 jours</option>
                                    <option value="90_days">90 jours</option>
                                    <option value="1_year">1 an</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i> Créer un jeton
                            </button>
                        </form>
                    </div>
                    
                    <div>
                        <h6>Jetons actifs</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Dernière utilisation</th>
                                        <th>Créé le</th>
                                        <th>Expire le</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Application mobile</td>
                                        <td>21/05/2025 09:15</td>
                                        <td>15/05/2025</td>
                                        <td>14/06/2025</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i> Révoquer
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Intégration Slack</td>
                                        <td>20/05/2025 14:30</td>
                                        <td>10/05/2025</td>
                                        <td>09/06/2025</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i> Révoquer
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
