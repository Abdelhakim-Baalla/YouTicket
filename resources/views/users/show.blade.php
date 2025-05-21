@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Profil utilisateur</h1>
        <div>
            <a href="/users" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-1"></i> Retour à la liste
            </a>
            <a href="/users/1/edit" class="btn btn-warning me-2">
                <i class="fas fa-edit me-1"></i> Modifier
            </a>
            <button type="button" class="btn btn-danger">
                <i class="fas fa-trash me-1"></i> Supprimer
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <!-- Informations de base -->
            <div class="card mb-4">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto" style="width: 100px; height: 100px; font-size: 40px;">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <h5 class="card-title">Martin Dupont</h5>
                    <p class="text-muted">Agent de support</p>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-outline-primary">
                            <i class="fas fa-envelope me-1"></i> Envoyer un email
                        </button>
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="fas fa-key me-1"></i> Réinitialiser le mot de passe
                        </button>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fas fa-ticket-alt me-1"></i> 45 tickets
                        </div>
                        <div>
                            <span class="badge bg-success">Actif</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coordonnées -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Coordonnées</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted">Email:</span>
                            <span>martin.dupont@exemple.com</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted">Téléphone:</span>
                            <span>+33 1 23 45 67 89</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted">Département:</span>
                            <span>IT</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted">Date d'inscription:</span>
                            <span>15/01/2025</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted">Dernière connexion:</span>
                            <span>21/05/2025 08:45</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Permissions -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Permissions</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <span>Voir les tickets</span>
                                <i class="fas fa-check text-success"></i>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <span>Créer des tickets</span>
                                <i class="fas fa-check text-success"></i>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <span>Modifier des tickets</span>
                                <i class="fas fa-check text-success"></i>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <span>Voir les utilisateurs</span>
                                <i class="fas fa-times text-danger"></i>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <span>Créer des utilisateurs</span>
                                <i class="fas fa-times text-danger"></i>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <span>Voir les rapports</span>
                                <i class="fas fa-check text-success"></i>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <span>Gérer les paramètres</span>
                                <i class="fas fa-times text-danger"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <!-- Tickets assignés -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Tickets assignés</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th>Priorité</th>
                                    <th>État</th>
                                    <th>Date de création</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1234</td>
                                    <td><a href="/tickets/1234">Problème de connexion à l'application</a></td>
                                    <td><span class="badge bg-danger">Urgent</span></td>
                                    <td><span class="badge bg-warning">En cours</span></td>
                                    <td>20/05/2025 14:30</td>
                                    <td>
                                        <a href="/tickets/1234" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#1220</td>
                                    <td><a href="/tickets/1220">Problème d'accès au CRM</a></td>
                                    <td><span class="badge bg-warning">Moyen</span></td>
                                    <td><span class="badge bg-success">Résolu</span></td>
                                    <td>10/05/2025 09:15</td>
                                    <td>
                                        <a href="/tickets/1220" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#1198</td>
                                    <td><a href="/tickets/1198">Mise à jour des droits d'accès</a></td>
                                    <td><span class="badge bg-info">Faible</span></td>
                                    <td><span class="badge bg-secondary">Fermé</span></td>
                                    <td>01/05/2025 11:30</td>
                                    <td>
                                        <a href="/tickets/1198" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="/tickets?assigned_to=1" class="btn btn-outline-primary">Voir tous les tickets</a>
                    </div>
                </div>
            </div>

            <!-- Activité récente -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Activité récente</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    A résolu le ticket <a href="/tickets/1231">#1231</a>
                                </div>
                                <small class="text-muted">21/05/2025 09:30</small>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    A commenté sur le ticket <a href="/tickets/1234">#1234</a>
                                </div>
                                <small class="text-muted">21/05/2025 09:15</small>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    A mis à jour le statut du ticket <a href="/tickets/1234">#1234</a>
                                </div>
                                <small class="text-muted">21/05/2025 09:10</small>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    S'est connecté au système
                                </div>
                                <small class="text-muted">21/05/2025 08:45</small>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    A été assigné au ticket <a href="/tickets/1234">#1234</a>
                                </div>
                                <small class="text-muted">20/05/2025 15:00</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Statistiques -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Statistiques</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <h6 class="card-title">Tickets résolus ce mois-ci</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="mb-0">28</h2>
                                        <span class="text-success"><i class="fas fa-arrow-up"></i> 15%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <h6 class="card-title">Temps de résolution moyen</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="mb-0">4h 12m</h2>
                                        <span class="text-success"><i class="fas fa-arrow-down"></i> 8%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <h6 class="card-title">Taux de satisfaction</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="mb-0">92%</h2>
                                        <span class="text-success"><i class="fas fa-arrow-up"></i> 3%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <h6 class="card-title">Tickets en cours</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="mb-0">5</h2>
                                        <span class="text-danger"><i class="fas fa-arrow-up"></i> 2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
