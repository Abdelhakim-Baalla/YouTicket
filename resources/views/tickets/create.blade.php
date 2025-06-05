@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Créer un nouveau ticket</h1>
        <a href="/tickets" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Retour à la liste
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="/tickets" method="GET">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="project" class="form-label">Projet</label>
                        <select class="form-select" id="project" required>
                            <option value="">Sélectionner un projet</option>
                            <option value="crm">CRM</option>
                            <option value="erp">ERP</option>
                            <option value="intranet">Intranet</option>
                            <option value="infrastructure">Infrastructure</option>
                            <option value="security">Sécurité</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" placeholder="Titre du ticket" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="5" placeholder="Description détaillée du problème ou de la demande" required></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" required>
                            <option value="">Sélectionner un type</option>
                            <option value="incident">Incident</option>
                            <option value="request">Demande de service</option>
                            <option value="problem">Problème</option>
                            <option value="change">Demande de changement</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="impact" class="form-label">Impact</label>
                        <select class="form-select" id="impact" required>
                            <option value="">Sélectionner un impact</option>
                            <option value="critical">Bloquant/Critique</option>
                            <option value="major">Majeur/Grave</option>
                            <option value="moderate">Moyen</option>
                            <option value="minor">Mineur/Faible</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="frequency" class="form-label">Fréquence</label>
                        <select class="form-select" id="frequency" required>
                            <option value="">Sélectionner une fréquence</option>
                            <option value="very_high">Très forte/Tout le temps</option>
                            <option value="high">Forte/Souvent</option>
                            <option value="low">Faible/De temps en temps</option>
                            <option value="very_low">Très faible/Rarement</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="priority" class="form-label">Priorité</label>
                        <select class="form-select" id="priority" required>
                            <option value="">Sélectionner une priorité</option>
                            <option value="immediate">Immédiat/Très urgent</option>
                            <option value="urgent">Urgent</option>
                            <option value="standard">Standard</option>
                            <option value="low">Faible</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="assigned_to" class="form-label">Assigné à</label>
                        <select class="form-select" id="assigned_to">
                            <option value="">Non assigné</option>
                            <option value="1">Martin Dupont</option>
                            <option value="2">Sophie Martin</option>
                            <option value="3">Jean Petit</option>
                            <option value="4">Marie Leroy</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="status" class="form-label">État</label>
                        <select class="form-select" id="status" required>
                            <option value="new" selected>Nouveau</option>
                            <option value="in_progress">En cours</option>
                            <option value="waiting">En attente</option>
                            <option value="resolved">Résolu</option>
                            <option value="closed">Fermé</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="attachments" class="form-label">Pièces jointes</label>
                    <input class="form-control" type="file" id="attachments" multiple>
                    <div class="form-text">Vous pouvez joindre des captures d'écran ou des documents explicatifs (max 5 fichiers, 10 Mo par fichier)</div>
                </div>

                <div class="text-end">
                    <button type="reset" class="btn btn-secondary me-2">Annuler</button>
                    <button type="submit" class="btn btn-primary">Créer le ticket</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
