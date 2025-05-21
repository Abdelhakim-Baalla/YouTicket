@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Modifier le ticket #1234</h1>
        <div>
            <a href="/tickets/1234" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-1"></i> Retour au ticket
            </a>
            <a href="/tickets" class="btn btn-secondary">
                <i class="fas fa-list me-1"></i> Liste des tickets
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="/tickets/1234" method="GET">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="project" class="form-label">Projet</label>
                        <select class="form-select" id="project" required>
                            <option value="">Sélectionner un projet</option>
                            <option value="crm" selected>CRM</option>
                            <option value="erp">ERP</option>
                            <option value="intranet">Intranet</option>
                            <option value="infrastructure">Infrastructure</option>
                            <option value="security">Sécurité</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" value="Problème de connexion à l'application" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="5" required>Les utilisateurs du département comptabilité signalent qu'ils ne peuvent pas se connecter à l'application CRM depuis ce matin. L'erreur affichée est "Connexion refusée". Les autres départements ne semblent pas affectés par ce problème.

Nous avons déjà vérifié que les serveurs sont opérationnels et que les utilisateurs utilisent les bons identifiants.</textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" required>
                            <option value="">Sélectionner un type</option>
                            <option value="incident" selected>Incident</option>
                            <option value="request">Demande de service</option>
                            <option value="problem">Problème</option>
                            <option value="change">Demande de changement</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="impact" class="form-label">Impact</label>
                        <select class="form-select" id="impact" required>
                            <option value="">Sélectionner un impact</option>
                            <option value="critical" selected>Bloquant/Critique</option>
                            <option value="major">Majeur/Grave</option>
                            <option value="moderate">Moyen</option>
                            <option value="minor">Mineur/Faible</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="frequency" class="form-label">Fréquence</label>
                        <select class="form-select" id="frequency" required>
                            <option value="">Sélectionner une fréquence</option>
                            <option value="very_high" selected>Très forte/Tout le temps</option>
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
                            <option value="urgent" selected>Urgent</option>
                            <option value="standard">Standard</option>
                            <option value="low">Faible</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="assigned_to" class="form-label">Assigné à</label>
                        <select class="form-select" id="assigned_to">
                            <option value="">Non assigné</option>
                            <option value="1" selected>Martin Dupont</option>
                            <option value="2">Sophie Martin</option>
                            <option value="3">Jean Petit</option>
                            <option value="4">Marie Leroy</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="status" class="form-label">État</label>
                        <select class="form-select" id="status" required>
                            <option value="new">Nouveau</option>
                            <option value="in_progress" selected>En cours</option>
                            <option value="waiting">En attente</option>
                            <option value="resolved">Résolu</option>
                            <option value="closed">Fermé</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pièces jointes actuelles</label>
                    <div class="list-group mb-3">
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-file-image me-2"></i> capture_erreur.png
                            </div>
                            <button type="button" class="btn btn-sm btn-danger">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-file-pdf me-2"></i> rapport_incident.pdf
                            </div>
                            <button type="button" class="btn btn-sm btn-danger">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    
                    <label for="attachments" class="form-label">Ajouter des pièces jointes</label>
                    <input class="form-control" type="file" id="attachments" multiple>
                    <div class="form-text">Vous pouvez joindre des captures d'écran ou des documents explicatifs (max 5 fichiers, 10 Mo par fichier)</div>
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
