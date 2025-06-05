@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Modifier l'utilisateur</h1>
        <div>
            <a href="/users/1" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-1"></i> Retour au profil
            </a>
            <a href="/users" class="btn btn-secondary">
                <i class="fas fa-list me-1"></i> Liste des utilisateurs
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="/users/1" method="GET">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="first_name" value="Martin" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="last_name" value="Dupont" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="martin.dupont@exemple.com" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="phone" value="+33 1 23 45 67 89">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Laisser vide pour ne pas changer">
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Laisser vide pour ne pas changer">
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
                            <option value="agent_level_1" selected>Agent de support 1er niveau</option>
                            <option value="user">Utilisateur</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="department" class="form-label">Département</label>
                        <select class="form-select" id="department" required>
                            <option value="">Sélectionner un département</option>
                            <option value="it" selected>IT</option>
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
                    <div class="form-text">Laissez vide pour conserver l'image actuelle</div>
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
                                <input class="form-check-input" type="checkbox" id="perm_view_tickets" checked>
                                <label class="form-check-label" for="perm_view_tickets">Voir les tickets</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perm_create_tickets" checked>
                                <label class="form-check-label" for="perm_create_tickets">Créer des tickets</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perm_edit_tickets" checked>
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
                                <input class="form-check-input" type="checkbox" id="perm_view_reports" checked>
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
                    <button type="reset" class="btn btn-secondary me-2">Annuler les modifications</button>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
