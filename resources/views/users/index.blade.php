@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestion des utilisateurs</h1>
        <a href="/users/create" class="btn btn-primary">
            <i class="fas fa-user-plus me-1"></i> Nouvel utilisateur
        </a>
    </div>

    <!-- Filtres -->
    <div class="card mb-4">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-3">
                    <label for="role" class="form-label">Rôle</label>
                    <select class="form-select" id="role">
                        <option value="">Tous</option>
                        <option value="admin">Administrateur</option>
                        <option value="agent">Agent de support</option>
                        <option value="supervisor">Superviseur</option>
                        <option value="user">Utilisateur</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="status" class="form-label">Statut</label>
                    <select class="form-select" id="status">
                        <option value="">Tous</option>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="search" class="form-label">Recherche</label>
                    <input type="text" class="form-control" id="search" placeholder="Nom, email, département...">
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

    <!-- Liste des utilisateurs -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Département</th>
                            <th>Statut</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="/users/1">Martin Dupont</a></td>
                            <td>martin.dupont@exemple.com</td>
                            <td>Agent de support</td>
                            <td>IT</td>
                            <td><span class="badge bg-success">Actif</span></td>
                            <td>15/01/2025</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/users/1" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/users/1/edit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a href="/users/2">Sophie Martin</a></td>
                            <td>sophie.martin@exemple.com</td>
                            <td>Utilisateur</td>
                            <td>Comptabilité</td>
                            <td><span class="badge bg-success">Actif</span></td>
                            <td>20/02/2025</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/users/2" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/users/2/edit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="/users/3">Jean Petit</a></td>
                            <td>jean.petit@exemple.com</td>
                            <td>Agent de support</td>
                            <td>IT</td>
                            <td><span class="badge bg-success">Actif</span></td>
                            <td>05/03/2025</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/users/3" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/users/3/edit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a href="/users/4">Marie Leroy</a></td>
                            <td>marie.leroy@exemple.com</td>
                            <td>Superviseur</td>
                            <td>IT</td>
                            <td><span class="badge bg-success">Actif</span></td>
                            <td>10/03/2025</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/users/4" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/users/4/edit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><a href="/users/5">Pierre Durand</a></td>
                            <td>pierre.durand@exemple.com</td>
                            <td>Administrateur</td>
                            <td>Direction</td>
                            <td><span class="badge bg-success">Actif</span></td>
                            <td>01/01/2025</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/users/5" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/users/5/edit" class="btn btn-sm btn-warning">
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
