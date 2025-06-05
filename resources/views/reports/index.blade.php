@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Rapports et statistiques</h1>
        <div>
            <button type="button" class="btn btn-outline-primary me-2">
                <i class="fas fa-download me-1"></i> Exporter
            </button>
            <button type="button" class="btn btn-outline-secondary">
                <i class="fas fa-print me-1"></i> Imprimer
            </button>
        </div>
    </div>

    <!-- Filtres -->
    <div class="card mb-4">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-4">
                    <label for="date_range" class="form-label">Période</label>
                    <select class="form-select" id="date_range">
                        <option value="today">Aujourd'hui</option>
                        <option value="yesterday">Hier</option>
                        <option value="this_week">Cette semaine</option>
                        <option value="last_week">Semaine dernière</option>
                        <option value="this_month" selected>Ce mois-ci</option>
                        <option value="last_month">Mois dernier</option>
                        <option value="this_quarter">Ce trimestre</option>
                        <option value="last_quarter">Trimestre dernier</option>
                        <option value="this_year">Cette année</option>
                        <option value="custom">Personnalisé</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="report_type" class="form-label">Type de rapport</label>
                    <select class="form-select" id="report_type">
                        <option value="overview" selected>Vue d'ensemble</option>
                        <option value="tickets">Tickets</option>
                        <option value="agents">Agents</option>
                        <option value="departments">Départements</option>
                        <option value="sla">SLA</option>
                        <option value="satisfaction">Satisfaction client</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="format" class="form-label">Format</label>
                    <select class="form-select" id="format">
                        <option value="chart_table" selected>Graphiques et tableaux</option>
                        <option value="chart">Graphiques uniquement</option>
                        <option value="table">Tableaux uniquement</option>
                    </select>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sync me-1"></i> Actualiser
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Vue d'ensemble -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Total des tickets</h6>
                            <h2 class="mb-0">256</h2>
                        </div>
                        <i class="fas fa-ticket-alt fa-2x"></i>
                    </div>
                    <div class="mt-2 text-white-50">
                        <span><i class="fas fa-arrow-up"></i> 12% par rapport au mois dernier</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Tickets résolus</h6>
                            <h2 class="mb-0">198</h2>
                        </div>
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                    <div class="mt-2 text-white-50">
                        <span><i class="fas fa-arrow-up"></i> 8% par rapport au mois dernier</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Temps moyen de résolution</h6>
                            <h2 class="mb-0">4h 32m</h2>
                        </div>
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                    <div class="mt-2 text-white-50">
                        <span><i class="fas fa-arrow-down"></i> 15% par rapport au mois dernier</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Taux de satisfaction</h6>
                            <h2 class="mb-0">92%</h2>
                        </div>
                        <i class="fas fa-smile fa-2x"></i>
                    </div>
                    <div class="mt-2 text-white-50">
                        <span><i class="fas fa-arrow-up"></i> 3% par rapport au mois dernier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphiques -->
    <div class="row mb-4">
        <div class="col-md-6">
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Répartition par catégorie</h5>
                </div>
                <div class="card-body">
                    <div style="height: 300px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                        <p class="text-muted">Graphique circulaire des catégories</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Temps de résolution par priorité</h5>
                </div>
                <div class="card-body">
                    <div style="height: 300px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                        <p class="text-muted">Graphique à barres du temps de résolution</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Performance des agents</h5>
                </div>
                <div class="card-body">
                    <div style="height: 300px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                        <p class="text-muted">Graphique de performance des agents</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableaux -->
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Top 5 des catégories de tickets</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Catégorie</th>
                                    <th>Tickets</th>
                                    <th>Pourcentage</th>
                                    <th>Évolution</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Problèmes de connexion</td>
                                    <td>45</td>
                                    <td>17.6%</td>
                                    <td><span class="text-danger"><i class="fas fa-arrow-up"></i> 5%</span></td>
                                </tr>
                                <tr>
                                    <td>Erreurs d'application</td>
                                    <td>38</td>
                                    <td>14.8%</td>
                                    <td><span class="text-success"><i class="fas fa-arrow-down"></i> 3%</span></td>
                                </tr>
                                <tr>
                                    <td>Demandes d'accès</td>
                                    <td>32</td>
                                    <td>12.5%</td>
                                    <td><span class="text-danger"><i class="fas fa-arrow-up"></i> 8%</span></td>
                                </tr>
                                <tr>
                                    <td>Problèmes d'impression</td>
                                    <td>28</td>
                                    <td>10.9%</td>
                                    <td><span class="text-success"><i class="fas fa-arrow-down"></i> 2%</span></td>
                                </tr>
                                <tr>
                                    <td>Problèmes de réseau</td>
                                    <td>25</td>
                                    <td>9.8%</td>
                                    <td><span class="text-danger"><i class="fas fa-arrow-up"></i> 4%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Performance des agents</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Agent</th>
                                    <th>Tickets résolus</th>
                                    <th>Temps moyen</th>
                                    <th>Satisfaction</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Martin Dupont</td>
                                    <td>45</td>
                                    <td>3h 45m</td>
                                    <td>95%</td>
                                </tr>
                                <tr>
                                    <td>Jean Petit</td>
                                    <td>38</td>
                                    <td>4h 12m</td>
                                    <td>92%</td>
                                </tr>
                                <tr>
                                    <td>Marie Leroy</td>
                                    <td>35</td>
                                    <td>4h 30m</td>
                                    <td>90%</td>
                                </tr>
                                <tr>
                                    <td>Sophie Martin</td>
                                    <td>32</td>
                                    <td>5h 15m</td>
                                    <td>88%</td>
                                </tr>
                                <tr>
                                    <td>Pierre Durand</td>
                                    <td>28</td>
                                    <td>4h 50m</td>
                                    <td>91%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
