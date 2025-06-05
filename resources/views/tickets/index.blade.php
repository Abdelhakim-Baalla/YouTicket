@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestion des tickets</h1>
        <a href="/tickets/create" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Nouveau ticket
        </a>
    </div>

    <!-- Filtres -->
    <div class="card mb-4">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-3">
                    <label for="status" class="form-label">État</label>
                    <select class="form-select" id="status">
                        <option value="">Tous</option>
                        <option value="new">Nouveau</option>
                        <option value="in_progress">En cours</option>
                        <option value="waiting">En attente</option>
                        <option value="resolved">Résolu</option>
                        <option value="closed">Fermé</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="priority" class="form-label">Priorité</label>
                    <select class="form-select" id="priority">
                        <option value="">Toutes</option>
                        <option value="low">Faible</option>
                        <option value="medium">Moyenne</option>
                        <option value="high">Haute</option>
                        <option value="urgent">Urgente</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="assigned_to" class="form-label">Assigné à</label>
                    <select class="form-select" id="assigned_to">
                        <option value="">Tous</option>
                        <option value="1">Martin Dupont</option>
                        <option value="2">Sophie Martin</option>
                        <option value="3">Jean Petit</option>
                        <option value="4">Marie Leroy</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="search" class="form-label">Recherche</label>
                    <input type="text" class="form-control" id="search" placeholder="ID, titre, description...">
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter me-1"></i> Filtrer
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-redo me-1"></i> Réinitialiser
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Liste des tickets -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Projet</th>
                            <th>Priorité</th>
                            <th>État</th>
                            <th>Assigné à</th>
                            <th>Date de création</th>
                            <th>Dernière mise à jour</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1234</td>
                            <td><a href="/tickets/1234">Problème de connexion à l'application</a></td>
                            <td>CRM</td>
                            <td><span class="badge bg-danger">Urgent</span></td>
                            <td><span class="badge bg-warning">En cours</span></td>
                            <td>Martin Dupont</td>
                            <td>20/05/2025 14:30</td>
                            <td>21/05/2025 09:15</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/tickets/1234" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/tickets/1234/edit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#1233</td>
                            <td><a href="/tickets/1233">Erreur d'impression des rapports</a></td>
                            <td>ERP</td>
                            <td><span class="badge bg-warning">Moyen</span></td>
                            <td><span class="badge bg-primary">Nouveau</span></td>
                            <td>Non assigné</td>
                            <td>20/05/2025 11:45</td>
                            <td>20/05/2025 11:45</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/tickets/1233" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/tickets/1233/edit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#1232</td>
                            <td><a href="/tickets/1232">Mise à jour logiciel nécessaire</a></td>
                            <td>Intranet</td>
                            <td><span class="badge bg-info">Faible</span></td>
                            <td><span class="badge bg-success">Résolu</span></td>
                            <td>Sophie Martin</td>
                            <td>19/05/2025 09:30</td>
                            <td>20/05/2025 16:20</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/tickets/1232" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/tickets/1232/edit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#1231</td>
                            <td><a href="/tickets/1231">Problème de réseau dans le département marketing</a></td>
                            <td>Infrastructure</td>
                            <td><span class="badge bg-danger">Urgent</span></td>
                            <td><span class="badge bg-success">Résolu</span></td>
                            <td>Jean Petit</td>
                            <td>18/05/2025 16:15</td>
                            <td>19/05/2025 10:30</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/tickets/1231" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/tickets/1231/edit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#1230</td>
                            <td><a href="/tickets/1230">Demande d'accès aux serveurs de production</a></td>
                            <td>Sécurité</td>
                            <td><span class="badge bg-warning">Moyen</span></td>
                            <td><span class="badge bg-warning">En attente</span></td>
                            <td>Marie Leroy</td>
                            <td>18/05/2025 14:00</td>
                            <td>20/05/2025 11:15</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/tickets/1230" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/tickets/1230/edit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
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
@endsection
