@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Créer un nouvel article</h1>
        <a href="/knowledge" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Retour à la base de connaissances
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="/knowledge" method="GET">
                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="title" placeholder="Titre de l'article" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="category" class="form-label">Catégorie</label>
                        <select class="form-select" id="category" required>
                            <option value="">Sélectionner une catégorie</option>
                            <option value="technical">Technique</option>
                            <option value="software">Logiciels</option>
                            <option value="hardware">Matériel</option>
                            <option value="network">Réseau</option>
                            <option value="security">Sécurité</option>
                            <option value="faq">FAQ</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">Statut</label>
                        <select class="form-select" id="status" required>
                            <option value="draft">Brouillon</option>
                            <option value="published">Publié</option>
                            <option value="archived">Archivé</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="summary" class="form-label">Résumé</label>
                    <textarea class="form-control" id="summary" rows="2" placeholder="Bref résumé de l'article" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Contenu</label>
                    <div class="card mb-2">
                        <div class="card-header py-1">
                            <div class="btn-toolbar" role="toolbar">
                                <div class="btn-group me-2" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-bold"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-italic"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-underline"></i></button>
                                </div>
                                <div class="btn-group me-2" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-heading"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-list-ul"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-list-ol"></i></button>
                                </div>
                                <div class="btn-group me-2" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-link"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-image"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-code"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <textarea class="form-control" id="content" rows="15" placeholder="Contenu détaillé de l'article" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <input type="text" class="form-control" id="tags" placeholder="Entrez les tags séparés par des virgules">
                    <div class="form-text">Exemple: mot de passe, sécurité, guide</div>
                </div>

                <div class="mb-3">
                    <label for="attachments" class="form-label">Images et pièces jointes</label>
                    <input class="form-control" type="file" id="attachments" multiple>
                    <div class="form-text">Vous pouvez joindre des images, des PDF ou d'autres documents pertinents</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Options de publication</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="featured">
                        <label class="form-check-label" for="featured">Article en vedette</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="comments_enabled" checked>
                        <label class="form-check-label" for="comments_enabled">Autoriser les commentaires</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="notify_users">
                        <label class="form-check-label" for="notify_users">Notifier les utilisateurs de la publication</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="related_articles" class="form-label">Articles connexes</label>
                    <select class="form-select" id="related_articles" multiple>
                        <option value="5">Bonnes pratiques pour la sécurité des mots de passe</option>
                        <option value="6">Comment activer l'authentification à deux facteurs</option>
                        <option value="7">Protéger votre compte contre le phishing</option>
                        <option value="8">Guide de connexion pour les nouveaux utilisateurs</option>
                        <option value="9">Résoudre les problèmes d'accès au compte</option>
                    </select>
                    <div class="form-text">Maintenez la touche Ctrl (ou Cmd sur Mac) pour sélectionner plusieurs articles</div>
                </div>

                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2">Enregistrer comme brouillon</button>
                    <button type="submit" class="btn btn-primary">Publier l'article</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
