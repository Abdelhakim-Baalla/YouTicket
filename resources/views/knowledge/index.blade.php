@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Base de connaissances</h1>
        <a href="/knowledge/create" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Nouvel article
        </a>
    </div>

    <!-- Recherche et filtres -->
    <div class="card mb-4">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Rechercher dans la base de connaissances...">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-select" id="category">
                        <option value="">Toutes les catégories</option>
                        <option value="general">Général</option>
                        <option value="technical">Technique</option>
                        <option value="software">Logiciels</option>
                        <option value="hardware">Matériel</option>
                        <option value="network">Réseau</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <!-- Catégories -->
    <div class="row mb-4">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-cogs me-2 text-primary"></i> Technique
                    </h5>
                    <p class="card-text">Solutions aux problèmes techniques courants et guides de dépannage.</p>
                    <p class="text-muted">25 articles</p>
                    <a href="/knowledge?category=technical" class="btn btn-outline-primary">Voir les articles</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-desktop me-2 text-success"></i> Logiciels
                    </h5>
                    <p class="card-text">Guides d'utilisation et résolution des problèmes liés aux logiciels.</p>
                    <p class="text-muted">18 articles</p>
                    <a href="/knowledge?category=software" class="btn btn-outline-primary">Voir les articles</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-hdd me-2 text-warning"></i> Matériel
                    </h5>
                    <p class="card-text">Informations sur le matériel, les périphériques et leur maintenance.</p>
                    <p class="text-muted">12 articles</p>
                    <a href="/knowledge?category=hardware" class="btn btn-outline-primary">Voir les articles</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-network-wired me-2 text-danger"></i> Réseau
                    </h5>
                    <p class="card-text">Guides sur la connectivité, la configuration réseau et le dépannage.</p>
                    <p class="text-muted">15 articles</p>
                    <a href="/knowledge?category=network" class="btn btn-outline-primary">Voir les articles</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-shield-alt me-2 text-info"></i> Sécurité
                    </h5>
                    <p class="card-text">Bonnes pratiques de sécurité, gestion des mots de passe et protection des données.</p>
                    <p class="text-muted">10 articles</p>
                    <a href="/knowledge?category=security" class="btn btn-outline-primary">Voir les articles</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-question-circle me-2 text-secondary"></i> FAQ
                    </h5>
                    <p class="card-text">Questions fréquemment posées et leurs réponses.</p>
                    <p class="text-muted">20 articles</p>
                    <a href="/knowledge?category=faq" class="btn btn-outline-primary">Voir les articles</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Articles récents -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Articles récents</h5>
        </div>
        <div class="card-body">
            <div class="list-group">
                <a href="/knowledge/1" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Comment réinitialiser votre mot de passe</h5>
                        <small class="text-muted">Il y a 2 jours</small>
                    </div>
                    <p class="mb-1">Guide étape par étape pour réinitialiser votre mot de passe en cas d'oubli.</p>
                    <small class="text-muted">Catégorie: Sécurité | Vues: 145</small>
                </a>
                <a href="/knowledge/2" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Résoudre les problèmes de connexion au CRM</h5>
                        <small class="text-muted">Il y a 5 jours</small>
                    </div>
                    <p class="mb-1">Solutions aux problèmes courants de connexion à l'application CRM.</p>
                    <small class="text-muted">Catégorie: Logiciels | Vues: 230</small>
                </a>
                <a href="/knowledge/3" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Guide de dépannage des imprimantes</h5>
                        <small class="text-muted">Il y a 1 semaine</small>
                    </div>
                    <p class="mb-1">Comment résoudre les problèmes d'impression les plus courants.</p>
                    <small class="text-muted">Catégorie: Matériel | Vues: 312</small>
                </a>
                <a href="/knowledge/4" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Configuration de l'accès VPN</h5>
                        <small class="text-muted">Il y a 2 semaines</small>
                    </div>
                    <p class="mb-1">Instructions détaillées pour configurer et utiliser le VPN de l'entreprise.</p>
                    <small class="text-muted">Catégorie: Réseau | Vues: 189</small>
                </a>
                <a href="/knowledge/5" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Bonnes pratiques pour la sécurité des mots de passe</h5>
                        <small class="text-muted">Il y a 3 semaines</small>
                    </div>
                    <p class="mb-1">Comment créer et gérer des mots de passe sécurisés pour protéger vos comptes.</p>
                    <small class="text-muted">Catégorie: Sécurité | Vues: 275</small>
                </a>
            </div>
            
            <!-- Pagination -->
            <nav aria-label="Page navigation" class="mt-4">
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
