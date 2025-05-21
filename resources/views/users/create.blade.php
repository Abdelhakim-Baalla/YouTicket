@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Créer un nouvel utilisateur</h1>
        <a href="/users" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Retour à la liste
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="/users" method="GET">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="first_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="last_name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="nom@exemple.com" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="phone" placeholder="+33 1 23 45 67 89">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="role" class="form-label">Rôle</label>
                        <select class="form-select" id="role" required>
                            <option value="">Sélectionner un rôle</option>
                            <option value="admin">Administrateur</option>
                            <option value="supervisor">Superviseur</option>
                            <option value="agent_level_2">Agent de support 2ème niveau</option>
                            <option value="agent_level_1">Agent de support 1er niveau</option>
                            <option value="user">Utilisateur</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="department" class="form-label">Département</label>
                        <select class="form-select" id="department" required>
                            <option value="">Sélectionner un département</option>
                            <option value="it">IT</option>
                            <option value="accounting">Comptabilité</option>
                            <option value="hr">Ressources Humaines</option>
                            <option value="marketing">Marketing</option>
                            <option value="sales">Ventes</option>
                            <option value="management">Direction</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="avatar" class="form-label">Photo de profil</label>
                    <input class="form-control" type="file" id="avatar">
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="active" checked>
                        <label class="form-check-label" for="active">Compte actif</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Permissions</label>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perm_view_tickets">
                                <label class="form-check-label" for="perm_view_tickets">Voir les tickets</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perm_create_tickets">
                                <label class="form-check-label" for="perm_create_tickets">Créer des tickets</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perm_edit_tickets">
                                <label class="form-check-label" for="perm_edit_tickets">Modifier des tickets</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perm_view_users">
                                <label class="form-check-label" for="perm_view_users">Voir les utilisateurs</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perm_create_users">
                                <label class="form-check-label" for="perm_create_users">Créer des utilisateurs</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perm_edit_users">
                                <label class="form-check-label" for="perm_edit_users">Modifier des utilisateurs</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perm_view_reports">
                                <label class="form-check-label" for="perm_view_reports">Voir les rapports</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perm_manage_settings">
                                <label class="form-check-label" for="perm_manage_settings">Gérer les paramètres</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perm_manage_kb">
                                <label class="form-check-label" for="perm_manage_kb">Gérer la base de connaissances</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="reset" class="btn btn-secondary me-2">Annuler</button>
                    <button type="submit" class="btn btn-primary">Créer l'utilisateur</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
