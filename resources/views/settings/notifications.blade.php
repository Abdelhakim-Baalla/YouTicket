@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Paramètres de notifications</h1>
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
                        <a href="/settings/notifications" class="list-group-item list-group-item-action active">
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
                    <h5 class="card-title">Canaux de notification</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enable_email" checked>
                                <label class="form-check-label" for="enable_email">Notifications par email</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enable_sms">
                                <label class="form-check-label" for="enable_sms">Notifications par SMS</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enable_push" checked>
                                <label class="form-check-label" for="enable_push">Notifications push</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enable_slack">
                                <label class="form-check-label" for="enable_slack">Notifications Slack</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enable_teams">
                                <label class="form-check-label" for="enable_teams">Notifications Microsoft Teams</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Notifications pour les agents</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Événement</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">SMS</th>
                                        <th class="text-center">Push</th>
                                        <th class="text-center">Slack</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nouveau ticket assigné</td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>Commentaire sur un ticket assigné</td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
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
                                        <td>Ticket dépassant l'échéance SLA</td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                    </tr>
                                    <tr>
                                        <td>Ticket escaladé</td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
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
                                        <td>Ticket rouvert</td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Notifications pour les utilisateurs</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Événement</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">SMS</th>
                                        <th class="text-center">Push</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ticket créé</td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>Ticket assigné à un agent</td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>Commentaire ajouté au ticket</td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                    </tr>
                                    <tr>
                                        <td>Statut du ticket modifié</td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                    </tr>
                                    <tr>
                                        <td>Ticket résolu</td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                    </tr>
                                    <tr>
                                        <td>Demande de feedback</td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" checked></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Paramètres de notification</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="notification_frequency" class="form-label">Fréquence des notifications</label>
                            <select class="form-select" id="notification_frequency">
                                <option value="immediate" selected>Immédiate</option>
                                <option value="hourly">Toutes les heures</option>
                                <option value="daily">Quotidienne (résumé)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quiet_hours_start" class="form-label">Heures de silence (début)</label>
                            <input type="time" class="form-control" id="quiet_hours_start" value="22:00">
                        </div>
                        <div class="mb-3">
                            <label for="quiet_hours_end" class="form-label">Heures de silence (fin)</label>
                            <input type="time" class="form-control" id="quiet_hours_end" value="07:00">
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="weekend_notifications" checked>
                                <label class="form-check-label" for="weekend_notifications">Notifications le week-end</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="urgent_override" checked>
                                <label class="form-check-label" for="urgent_override">Les tickets urgents ignorent les heures de silence</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
