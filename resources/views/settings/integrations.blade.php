@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Intégrations</h1>
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
                        <a href="/settings/integrations" class="list-group-item list-group-item-action active">
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
                    <h5 class="card-title">Intégrations disponibles</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <i class="fab fa-slack fa-2x text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title mb-0">Slack</h5>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="slack_enabled">
                                        </div>
                                    </div>
                                    <p class="card-text">Intégrez votre système de ticketing avec Slack pour recevoir des notifications et gérer les tickets directement depuis vos canaux Slack.</p>
                                    <button type="button" class="btn btn-outline-primary">Configurer</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <i class="fab fa-microsoft fa-2x text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title mb-0">Microsoft Teams</h5>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="teams_enabled">
                                        </div>
                                    </div>
                                    <p class="card-text">Connectez votre système de ticketing à Microsoft Teams pour une collaboration améliorée et des notifications en temps réel.</p>
                                    <button type="button" class="btn btn-outline-primary">Configurer</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <i class="fab fa-google fa-2x text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title mb-0">Google Workspace</h5>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="google_enabled" checked>
                                        </div>
                                    </div>
                                    <p class="card-text">Intégrez avec Google Workspace pour la gestion des utilisateurs, le calendrier et les notifications par email.</p>
                                    <button type="button" class="btn btn-outline-primary">Configurer</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <i class="fab fa-github fa-2x text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title mb-0">GitHub</h5>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="github_enabled">
                                        </div>
                                    </div>
                                    <p class="card-text">Liez les tickets aux problèmes GitHub pour une meilleure traçabilité des bugs et des demandes de fonctionnalités.</p>
                                    <button type="button" class="btn btn-outline-primary">Configurer</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <i class="fab fa-jira fa-2x text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title mb-0">Jira</h5>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="jira_enabled">
                                        </div>
                                    </div>
                                    <p class="card-text">Synchronisez les tickets avec Jira pour une gestion de projet et de développement intégrée.</p>
                                    <button type="button" class="btn btn-outline-primary">Configurer</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <i class="fab fa-salesforce fa-2x text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title mb-0">Salesforce</h5>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="salesforce_enabled">
                                        </div>
                                    </div>
                                    <p class="card-text">Intégrez avec Salesforce pour synchroniser les données clients et les tickets entre les deux systèmes.</p>
                                    <button type="button" class="btn btn-outline-primary">Configurer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">API et Webhooks</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h6>Clés API</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Clé</th>
                                        <th>Créée le</th>
                                        <th>Dernière utilisation</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Clé principale</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="password" class="form-control" value="api_key_123456789" readonly>
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>15/01/2025</td>
                                        <td>21/05/2025</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Intégration mobile</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="password" class="form-control" value="api_key_987654321" readonly>
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>10/03/2025</td>
                                        <td>20/05/2025</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i> Créer une nouvelle clé API
                        </button>
                    </div>

                    <div>
                        <h6>Webhooks</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>URL</th>
                                        <th>Événements</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Notification de tickets</td>
                                        <td>https://exemple.com/webhook/tickets</td>
                                        <td>Création, Mise à jour, Résolution</td>
                                        <td><span class="badge bg-success">Actif</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Intégration CRM</td>
                                        <td>https://crm.exemple.com/api/tickets</td>
                                        <td>Création, Résolution</td>
                                        <td><span class="badge bg-success">Actif</span></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i> Ajouter un webhook
                        </button>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Documentation API</h5>
                </div>
                <div class="card-body">
                    <p>Notre API RESTful vous permet d'intégrer notre système de ticketing avec vos applications et services existants.</p>
                    <div class="list-group mb-3">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Guide de démarrage rapide</h6>
                                <small><i class="fas fa-external-link-alt"></i></small>
                            </div>
                            <p class="mb-1">Apprenez à utiliser notre API en quelques minutes</p>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Référence complète de l'API</h6>
                                <small><i class="fas fa-external-link-alt"></i></small>
                            </div>
                            <p class="mb-1">Documentation détaillée de tous les endpoints disponibles</p>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Exemples de code</h6>
                                <small><i class="fas fa-external-link-alt"></i></small>
                            </div>
                            <p class="mb-1">Exemples d'intégration dans différents langages de programmation</p>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Guide des webhooks</h6>
                                <small><i class="fas fa-external-link-alt"></i></small>
                            </div>
                            <p class="mb-1">Comment configurer et utiliser les webhooks pour les notifications en temps réel</p>
                        </a>
                    </div>
                    <button type="button" class="btn btn-outline-primary">
                        <i class="fas fa-book me-1"></i> Accéder à la documentation complète
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
