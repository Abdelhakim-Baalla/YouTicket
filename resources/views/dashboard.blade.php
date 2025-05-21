@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tableau de bord</h1>
        <div>
            <span class="text-muted">Aujourd'hui: 21/05/2025</span>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Tickets ouverts</h6>
                            <h2 class="mb-0">42</h2>
                        </div>
                        <i class="fas fa-ticket-alt fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Tickets résolus</h6>
                            <h2 class="mb-0">128</h2>
                        </div>
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">En attente</h6>
                            <h2 class="mb-0">15</h2>
                        </div>
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Tickets urgents</h6>
                            <h2 class="mb-0">7</h2>
                        </div>
                        <i class="fas fa-exclamation-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphiques -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tickets par jour</h5>
                </div>
                <div class="card-body">
                    <div style="height: 300px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                        <p class="text-muted">Graphique des tickets par jour</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Répartition par priorité</h5>
                </div>
                <div class="card-body">
                    <div style="height: 300px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                        <p class="text-muted">Graphique circulaire des priorités</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tickets récents -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tickets récents</h5>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1234</td>
                                    <td>Problème de connexion</td>
                                    <td><span class="badge bg-danger">Urgent</span></td>
                                    <td><span class="badge bg-warning">En cours</span></td>
                                </tr>
                                <tr>
                                    <td>#1233</td>
                                    <td>Erreur d'impression</td>
                                    <td><span class="badge bg-warning">Moyen</span></td>
                                    <td><span class="badge bg-primary">Nouveau</span></td>
                                </tr>
                                <tr>
                                    <td>#1232</td>
                                    <td>Mise à jour logiciel</td>
                                    <td><span class="badge bg-info">Faible</span></td>
                                    <td><span class="badge bg-success">Résolu</span></td>
                                </tr>
                                <tr>
                                    <td>#1231</td>
                                    <td>Problème de réseau</td>
                                    <td><span class="badge bg-danger">Urgent</span></td>
                                    <td><span class="badge bg-success">Résolu</span></td>
                                </tr>
                                <tr>
                                    <td>#1230</td>
                                    <td>Demande d'accès</td>
                                    <td><span class="badge bg-warning">Moyen</span></td>
                                    <td><span class="badge bg-warning">En cours</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Activité récente</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Martin Dupont</strong> a résolu le ticket <a href="#">#1231</a>
                                </div>
                                <small class="text-muted">Il y a 10 minutes</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Sophie Martin</strong> a créé un nouveau ticket <a href="#">#1234</a>
                                </div>
                                <small class="text-muted">Il y a 30 minutes</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Jean Petit</strong> a commenté sur le ticket <a href="#">#1230</a>
                                </div>
                                <small class="text-muted">Il y a 1 heure</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Admin</strong> a assigné le ticket <a href="#">#1233</a> à <strong>Marie Leroy</strong>
                                </div>
                                <small class="text-muted">Il y a 2 heures</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Pierre Durand</strong> a mis à jour le ticket <a href="#">#1232</a>
                                </div>
                                <small class="text-muted">Il y a 3 heures</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
