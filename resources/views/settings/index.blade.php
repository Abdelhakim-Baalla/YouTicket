@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Paramètres du système</h1>
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
                        <a href="/settings" class="list-group-item list-group-item-action active">
                            <i class="fas fa-cog me-2"></i> Général
                        </a>
                        <a href="/settings/notifications" class="list-group-item list-group-item-action">
                            <i class="fas fa-bell me-2"></i> Notifications
                        </a>
                        <a href="/settings/integrations" class="list-group-item list-group-item-action">
                            <i class="fas fa-plug me-2"></i> Intégrations
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-envelope me-2"></i> Email
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-user-shield me-2"></i> Sécurité
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-palette me-2"></i> Apparence
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-language me-2"></i> Langue et région
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-database me-2"></i> Sauvegarde et restauration
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Paramètres généraux</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Nom de l'entreprise</label>
                            <input type="text" class="form-control" id="company_name" value="Ma Société">
                        </div>
                        <div class="mb-3">
                            <label for="site_title" class="form-label">Titre du site</label>
                            <input type="text" class="form-control" id="site_title" value="Système de Ticketing">
                        </div>
                        <div class="mb-3">
                            <label for="admin_email" class="form-label">Email de l'administrateur</label>
                            <input type="email" class="form-control" id="admin_email" value="admin@exemple.com">
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
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Paramètres des tickets</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="ticket_prefix" class="form-label">Préfixe des tickets</label>
                            <input type="text" class="form-control" id="ticket_prefix" value="TICK-">
                            <div class="form-text">Exemple: TICK-1234</div>
                        </div>
                        <div class="mb-3">
                            <label for="default_priority" class="form-label">Priorité par défaut</label>
                            <select class="form-select" id="default_priority">
                                <option value="low">Faible</option>
                                <option value="medium" selected>Moyenne</option>
                                <option value="high">Haute</option>
                                <option value="urgent">Urgente</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="auto_assignment" class="form-label">Attribution automatique</label>
                            <select class="form-select" id="auto_assignment">
                                <option value="disabled">Désactivée</option>
                                <option value="round_robin" selected>Rotation (Round Robin)</option>
                                <option value="load_balancing">Équilibrage de charge</option>
                                <option value="skills_based">Basée sur les compétences</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ticket_closing" class="form-label">Fermeture automatique des tickets</label>
                            <select class="form-select" id="ticket_closing">
                                <option value="disabled">Désactivée</option>
                                <option value="3_days">Après 3 jours d'inactivité</option>
                                <option value="7_days" selected>Après 7 jours d'inactivité</option>
                                <option value="14_days">Après 14 jours d'inactivité</option>
                                <option value="30_days">Après 30 jours d'inactivité</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="allow_attachments" checked>
                                <label class="form-check-label" for="allow_attachments">Autoriser les pièces jointes</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="max_attachment_size" class="form-label">Taille maximale des pièces jointes (Mo)</label>
                            <input type="number" class="form-control" id="max_attachment_size" value="10">
                        </div>
                        <div class="mb-3">
                            <label for="allowed_file_types" class="form-label">Types de fichiers autorisés</label>
                            <input type="text" class="form-control" id="allowed_file_types" value="jpg,jpeg,png,gif,pdf,doc,docx,xls,xlsx,zip">
                            <div class="form-text">Entrez les extensions séparées par des virgules</div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Paramètres de SLA (Accord de niveau de service)</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enable_sla" checked>
                                <label class="form-check-label" for="enable_sla">Activer le SLA</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Temps de réponse par priorité</label>
                            <div class="row g-3 mb-2">
                                <div class="col-md-3">
                                    <label for="sla_urgent" class="form-label">Urgent</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="sla_urgent" value="1">
                                        <span class="input-group-text">heure(s)</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="sla_high" class="form-label">Haute</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="sla_high" value="4">
                                        <span class="input-group-text">heure(s)</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="sla_medium" class="form-label">Moyenne</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="sla_medium" value="8">
                                        <span class="input-group-text">heure(s)</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="sla_low" class="form-label">Faible</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="sla_low" value="24">
                                        <span class="input-group-text">heure(s)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Temps de résolution par priorité</label>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="resolution_urgent" class="form-label">Urgent</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="resolution_urgent" value="4">
                                        <span class="input-group-text">heure(s)</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="resolution_high" class="form-label">Haute</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="resolution_high" value="8">
                                        <span class="input-group-text">heure(s)</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="resolution_medium" class="form-label">Moyenne</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="resolution_medium" value="24">
                                        <span class="input-group-text">heure(s)</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="resolution_low" class="form-label">Faible</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="resolution_low" value="48">
                                        <span class="input-group-text">heure(s)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="business_hours_only" checked>
                                <label class="form-check-label" for="business_hours_only">Calculer le SLA uniquement pendant les heures ouvrables</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Heures ouvrables</label>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="business_start" class="form-label">Début</label>
                                    <input type="time" class="form-control" id="business_start" value="09:00">
                                </div>
                                <div class="col-md-6">
                                    <label for="business_end" class="form-label">Fin</label>
                                    <input type="time" class="form-control" id="business_end" value="18:00">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jours ouvrables</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="day_monday" checked>
                                    <label class="form-check-label" for="day_monday">Lundi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="day_tuesday" checked>
                                    <label class="form-check-label" for="day_tuesday">Mardi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="day_wednesday" checked>
                                    <label class="form-check-label" for="day_wednesday">Mercredi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="day_thursday" checked>
                                    <label class="form-check-label" for="day_thursday">Jeudi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="day_friday" checked>
                                    <label class="form-check-label" for="day_friday">Vendredi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="day_saturday">
                                    <label class="form-check-label" for="day_saturday">Samedi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="day_sunday">
                                    <label class="form-check-label" for="day_sunday">Dimanche</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
