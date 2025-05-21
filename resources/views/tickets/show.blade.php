@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Ticket #1234</h1>
        <div>
            <a href="/tickets" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-1"></i> Retour à la liste
            </a>
            <a href="/tickets/1234/edit" class="btn btn-warning me-2">
                <i class="fas fa-edit me-1"></i> Modifier
            </a>
            <button type="button" class="btn btn-danger">
                <i class="fas fa-trash me-1"></i> Supprimer
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <!-- Détails du ticket -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Problème de connexion à l'application</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="fw-bold">Description</h6>
                        <p>Les utilisateurs du département comptabilité signalent qu'ils ne peuvent pas se connecter à l'application CRM depuis ce matin. L'erreur affichée est "Connexion refusée". Les autres départements ne semblent pas affectés par ce problème.</p>
                        <p>Nous avons déjà vérifié que les serveurs sont opérationnels et que les utilisateurs utilisent les bons identifiants.</p>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="fw-bold">Informations</h6>
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th style="width: 40%">Projet</th>
                                        <td>CRM</td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>Incident</td>
                                    </tr>
                                    <tr>
                                        <th>Impact</th>
                                        <td>Bloquant/Critique</td>
                                    </tr>
                                    <tr>
                                        <th>Fréquence</th>
                                        <td>Très forte/Tout le temps</td>
                                    </tr>
                                    <tr>
                                        <th>Priorité</th>
                                        <td><span class="badge bg-danger">Urgent</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold">Suivi</h6>
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th style="width: 40%">État</th>
                                        <td><span class="badge bg-warning">En cours</span></td>
                                    </tr>
                                    <tr>
                                        <th>Assigné à</th>
                                        <td>Martin Dupont</td>
                                    </tr>
                                    <tr>
                                        <th>Créé par</th>
                                        <td>Sophie Martin</td>
                                    </tr>
                                    <tr>
                                        <th>Date de création</th>
                                        <td>20/05/2025 14:30</td>
                                    </tr>
                                    <tr>
                                        <th>Dernière mise à jour</th>
                                        <td>21/05/2025 09:15</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold">Pièces jointes</h6>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-file-image me-2"></i> capture_erreur.png
                                </div>
                                <span class="badge bg-primary rounded-pill">2.3 Mo</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-file-pdf me-2"></i> rapport_incident.pdf
                                </div>
                                <span class="badge bg-primary rounded-pill">1.5 Mo</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Commentaires -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Commentaires</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Martin Dupont</h6>
                                    <small class="text-muted">21/05/2025 09:15</small>
                                </div>
                                <p>J'ai commencé à investiguer le problème. Il semble que ce soit lié aux droits d'accès qui ont été modifiés lors de la dernière mise à jour. Je travaille sur une solution.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Sophie Martin</h6>
                                    <small class="text-muted">20/05/2025 16:45</small>
                                </div>
                                <p>J'ai contacté le département informatique. Ils sont au courant du problème et travaillent dessus. Plusieurs utilisateurs sont affectés.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Système</h6>
                                    <small class="text-muted">20/05/2025 14:30</small>
                                </div>
                                <p>Ticket créé et assigné à Martin Dupont.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Formulaire de commentaire -->
                    <form>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Ajouter un commentaire</label>
                            <textarea class="form-control" id="comment" rows="3" placeholder="Votre commentaire..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="comment_attachments" class="form-label">Pièces jointes (optionnel)</label>
                            <input class="form-control" type="file" id="comment_attachments" multiple>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Actions -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-outline-primary">
                            <i class="fas fa-user-plus me-1"></i> Réassigner
                        </button>
                        <button type="button" class="btn btn-outline-success">
                            <i class="fas fa-check-circle me-1"></i> Marquer comme résolu
                        </button>
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="fas fa-clock me-1"></i> Mettre en attente
                        </button>
                        <button type="button" class="btn btn-outline-danger">
                            <i class="fas fa-times-circle me-1"></i> Fermer le ticket
                        </button>
                        <button type="button" class="btn btn-outline-warning">
                            <i class="fas fa-arrow-up me-1"></i> Escalader
                        </button>
                        <button type="button" class="btn btn-outline-info">
                            <i class="fas fa-envelope me-1"></i> Envoyer une notification
                        </button>
                    </div>
                </div>
            </div>

            <!-- Historique -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Historique</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Martin Dupont</strong> a mis à jour le statut
                                </div>
                                <small class="text-muted">21/05/2025 09:15</small>
                            </div>
                            <small class="text-muted">De "Nouveau" à "En cours"</small>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Sophie Martin</strong> a ajouté un commentaire
                                </div>
                                <small class="text-muted">20/05/2025 16:45</small>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Admin</strong> a assigné le ticket
                                </div>
                                <small class="text-muted">20/05/2025 15:00</small>
                            </div>
                            <small class="text-muted">Assigné à Martin Dupont</small>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Sophie Martin</strong> a créé le ticket
                                </div>
                                <small class="text-muted">20/05/2025 14:30</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tickets liés -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tickets liés</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">#1220 - Problème d'accès au CRM</h6>
                                <small class="text-muted">Résolu</small>
                            </div>
                            <small class="text-muted">Créé il y a 2 semaines</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">#1198 - Mise à jour des droits d'accès</h6>
                                <small class="text-muted">Fermé</small>
                            </div>
                            <small class="text-muted">Créé il y a 3 semaines</small>
                        </a>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-link me-1"></i> Lier un ticket
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
