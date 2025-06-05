@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Paramètres de sécurité</h1>
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
                        <a href="/settings/security" class="list-group-item list-group-item-action active">
                            <i class="fas fa-user-shield me-2"></i> Sécurité
                        </a>
                        <a href="/settings/appearance" class="list-group-item list-group-item-action">
                            <i class="fas fa-palette me-2"></i> Apparence
                        </a>
                        <a href="/settings/language" class="list-group-item list-group-item-action">
                            <i class="fas fa-language me-2"></i> Langue et région
                        </a>
                        <a href="/settings/backup" class="list-group-item list-group-item-action">
                            <i class="fas fa-database me-2"></i> Sauvegarde et restauration
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Authentification</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="password_policy" class="form-label">Politique de mot de passe</label>
                            <select class="form-select" id="password_policy">
                                <option value="basic">Basique (minimum 8 caractères)</option>
                                <option value="standard" selected>Standard (8 caractères, majuscules, minuscules, chiffres)</option>
                                <option value="strong">Fort (10 caractères, majuscules, minuscules, chiffres, caractères spéciaux)</option>
                                <option value="custom">Personnalisé</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="password_expiration" class="form-label">Expiration des mots de passe</label>
                            <select class="form-select" id="password_expiration">
                                <option value="never">Jamais</option>
                                <option value="30_days">30 jours</option>
                                <option value="60_days" selected>60 jours</option>
                                <option value="90_days">90 jours</option>
                                <option value="180_days">180 jours</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="password_history" class="form-label">Historique des mots de passe</label>
                            <select class="form-select" id="password_history">
                                <option value="0">Ne pas mémoriser les mots de passe précédents</option>
                                <option value="3">Mémoriser les 3 derniers mots de passe</option>
                                <option value="5" selected>Mémoriser les 5 derniers mots de passe</option>
                                <option value="10">Mémoriser les 10 derniers mots de passe</option>
                            </select>
                            <div class="form-text">Empêche les utilisateurs de réutiliser les mots de passe récents</div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enable_2fa" checked>
                                <label class="form-check-label" for="enable_2fa">Activer l'authentification à deux facteurs (2FA)</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enforce_2fa">
                                <label class="form-check-label" for="enforce_2fa">Rendre l'authentification à deux facteurs obligatoire pour tous les utilisateurs</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enforce_2fa_admin" checked>
                                <label class="form-check-label" for="enforce_2fa_admin">Rendre l'authentification à deux facteurs obligatoire pour les administrateurs</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Sessions</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="session_timeout" class="form-label">Délai d'expiration de session</label>
                            <select class="form-select" id="session_timeout">
                                <option value="15_min">15 minutes</option>
                                <option value="30_min">30 minutes</option>
                                <option value="1_hour" selected>1 heure</option>
                                <option value="2_hours">2 heures</option>
                                <option value="4_hours">4 heures</option>
                                <option value="8_hours">8 heures</option>
                                <option value="1_day">1 jour</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="remember_me" checked>
                                <label class="form-check-label" for="remember_me">Autoriser l'option "Se souvenir de moi"</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="remember_me_duration" class="form-label">Durée de "Se souvenir de moi"</label>
                            <select class="form-select" id="remember_me_duration">
                                <option value="1_week">1 semaine</option>
                                <option value="2_weeks" selected>2 semaines</option>
                                <option value="1_month">1 mois</option>
                                <option value="3_months">3 mois</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="concurrent_sessions" checked>
                                <label class="form-check-label" for="concurrent_sessions">Autoriser les sessions simultanées</label>
                            </div>
                            <div class="form-text">Permet à un utilisateur d'être connecté sur plusieurs appareils en même temps</div>
                        </div>

                        <div class="mb-3">
                            <label for="max_concurrent_sessions" class="form-label">Nombre maximum de sessions simultanées</label>
                            <input type="number" class="form-control" id="max_concurrent_sessions" value="5">
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Verrouillage de compte</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="account_lockout" checked>
                                <label class="form-check-label" for="account_lockout">Activer le verrouillage de compte après des tentatives de connexion échouées</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="failed_attempts" class="form-label">Nombre de tentatives avant verrouillage</label>
                            <input type="number" class="form-control" id="failed_attempts" value="5">
                        </div>

                        <div class="mb-3">
                            <label for="lockout_duration" class="form-label">Durée du verrouillage</label>
                            <select class="form-select" id="lockout_duration">
                                <option value="5_min">5 minutes</option>
                                <option value="15_min" selected>15 minutes</option>
                                <option value="30_min">30 minutes</option>
                                <option value="1_hour">1 heure</option>
                                <option value="manual">Déverrouillage manuel uniquement</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="notify_admin" checked>
                                <label class="form-check-label" for="notify_admin">Notifier l'administrateur en cas de verrouillage de compte</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Journalisation et audit</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="login_logging" checked>
                                <label class="form-check-label" for="login_logging">Enregistrer les tentatives de connexion</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="activity_logging" checked>
                                <label class="form-check-label" for="activity_logging">Enregistrer les activités des utilisateurs</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="admin_logging" checked>
                                <label class="form-check-label" for="admin_logging">Enregistrer les actions administratives</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="log_retention" class="form-label">Conservation des journaux</label>
                            <select class="form-select" id="log_retention">
                                <option value="30_days">30 jours</option>
                                <option value="60_days">60 jours</option>
                                <option value="90_days" selected>90 jours</option>
                                <option value="180_days">180 jours</option>
                                <option value="1_year">1 an</option>
                                <option value="forever">Indéfiniment</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="ip_logging" checked>
                                <label class="form-check-label" for="ip_logging">Enregistrer les adresses IP</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fas fa-download me-1"></i> Exporter les journaux d'audit
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
