@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Base de connaissances</h1>
        <div>
            <a href="/knowledge" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-1"></i> Retour à la liste
            </a>
            <a href="/knowledge/1/edit" class="btn btn-warning me-2">
                <i class="fas fa-edit me-1"></i> Modifier
            </a>
            <button type="button" class="btn btn-danger">
                <i class="fas fa-trash me-1"></i> Supprimer
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <!-- Article -->
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Comment réinitialiser votre mot de passe</h5>
                        <span class="badge bg-info">Sécurité</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between text-muted small mb-4">
                            <div>
                                <i class="fas fa-user me-1"></i> Publié par: Admin
                                <span class="mx-2">|</span>
                                <i class="fas fa-calendar me-1"></i> 19/05/2025
                            </div>
                            <div>
                                <i class="fas fa-eye me-1"></i> 145 vues
                            </div>
                        </div>

                        <div class="article-content">
                            <p>Si vous avez oublié votre mot de passe ou si vous devez le réinitialiser pour des raisons de sécurité, suivez ce guide étape par étape pour créer un nouveau mot de passe en toute sécurité.</p>

                            <h5>Étape 1: Accéder à la page de connexion</h5>
                            <p>Rendez-vous sur la page de connexion de l'application. Vous trouverez un lien "Mot de passe oublié" sous le formulaire de connexion. Cliquez sur ce lien pour commencer le processus de réinitialisation.</p>

                            <div class="text-center mb-4">
                                <img src="/placeholder.jpg" alt="Page de connexion" class="img-fluid border rounded" style="max-width: 500px;">
                            </div>

                            <h5>Étape 2: Entrer votre adresse email</h5>
                            <p>Sur la page de réinitialisation du mot de passe, entrez l'adresse email associée à votre compte. Assurez-vous d'utiliser l'email que vous avez fourni lors de la création de votre compte.</p>

                            <div class="text-center mb-4">
                                <img src="/placeholder.jpg" alt="Page de réinitialisation" class="img-fluid border rounded" style="max-width: 500px;">
                            </div>

                            <h5>Étape 3: Vérifier votre boîte de réception</h5>
                            <p>Après avoir soumis votre demande, un email contenant un lien de réinitialisation sera envoyé à votre adresse email. Vérifiez votre boîte de réception (et éventuellement votre dossier spam si vous ne trouvez pas l'email).</p>

                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i> L'email de réinitialisation expire après 30 minutes pour des raisons de sécurité. Si vous ne l'utilisez pas dans ce délai, vous devrez recommencer le processus.
                            </div>

                            <h5>Étape 4: Cliquer sur le lien de réinitialisation</h5>
                            <p>Dans l'email reçu, cliquez sur le lien de réinitialisation. Vous serez redirigé vers une page où vous pourrez créer un nouveau mot de passe.</p>

                            <h5>Étape 5: Créer un nouveau mot de passe</h5>
                            <p>Sur la page de création de nouveau mot de passe, entrez votre nouveau mot de passe dans les deux champs fournis. Assurez-vous que votre mot de passe respecte les critères de sécurité suivants :</p>
                            <ul>
                                <li>Au moins 8 caractères</li>
                                <li>Au moins une lettre majuscule</li>
                                <li>Au moins une lettre minuscule</li>
                                <li>Au moins un chiffre</li>
                                <li>Au moins un caractère spécial (!, @, #, $, etc.)</li>
                            </ul>

                            <div class="text-center mb-4">
                                <img src="/placeholder.jpg" alt="Création de nouveau mot de passe" class="img-fluid border rounded" style="max-width: 500px;">
                            </div>

                            <h5>Étape 6: Confirmation</h5>
                            <p>Après avoir soumis votre nouveau mot de passe, vous recevrez une confirmation que votre mot de passe a été modifié avec succès. Vous pourrez alors vous connecter avec votre nouveau mot de passe.</p>

                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-2"></i> Félicitations ! Votre mot de passe a été réinitialisé avec succès.
                            </div>

                            <h5>Problèmes courants</h5>
                            <p>Si vous rencontrez des difficultés lors de la réinitialisation de votre mot de passe, voici quelques solutions aux problèmes les plus courants :</p>
                            <ul>
                                <li><strong>Je n'ai pas reçu l'email de réinitialisation</strong> - Vérifiez votre dossier spam ou courrier indésirable. Assurez-vous également que vous avez utilisé la bonne adresse email.</li>
                                <li><strong>Le lien de réinitialisation ne fonctionne pas</strong> - Le lien a peut-être expiré. Retournez à la page de connexion et recommencez le processus.</li>
                                <li><strong>Mon nouveau mot de passe est refusé</strong> - Assurez-vous que votre mot de passe respecte tous les critères de sécurité mentionnés ci-dessus.</li>
                            </ul>

                            <p>Si vous continuez à rencontrer des problèmes, n'hésitez pas à contacter le support technique en créant un ticket d'assistance.</p>
                        </div>
                    </div>

                    <!-- Évaluation de l'article -->
                    <div class="border-top pt-3">
                        <h6>Cet article vous a-t-il été utile ?</h6>
                        <div class="d-flex">
                            <button type="button" class="btn btn-outline-success me-2">
                                <i class="fas fa-thumbs-up me-1"></i> Oui
                            </button>
                            <button type="button" class="btn btn-outline-danger">
                                <i class="fas fa-thumbs-down me-1"></i> Non
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Commentaires -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Commentaires (3)</h5>
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
                                    <h6 class="mb-0">Sophie Martin</h6>
                                    <small class="text-muted">20/05/2025 10:15</small>
                                </div>
                                <p>Merci pour ce guide très clair ! J'ai pu réinitialiser mon mot de passe sans problème.</p>
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
                                    <h6 class="mb-0">Jean Petit</h6>
                                    <small class="text-muted">19/05/2025 16:45</small>
                                </div>
                                <p>J'ai eu un problème avec le lien de réinitialisation qui expirait trop rapidement. Peut-être serait-il utile d'augmenter la durée de validité ?</p>
                                <div class="mt-2 border-start border-3 ps-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">Admin</h6>
                                        <small class="text-muted">19/05/2025 17:30</small>
                                    </div>
                                    <p class="mb-0">Merci pour votre retour, Jean. La durée de 30 minutes est une mesure de sécurité standard, mais nous allons étudier la possibilité de l'augmenter légèrement.</p>
                                </div>
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
                                    <h6 class="mb-0">Marie Leroy</h6>
                                    <small class="text-muted">19/05/2025 14:20</small>
                                </div>
                                <p>Serait-il possible d'ajouter des captures d'écran plus détaillées ? Cela aiderait les utilisateurs moins à l'aise avec l'informatique.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Formulaire de commentaire -->
                    <form>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Ajouter un commentaire</label>
                            <textarea class="form-control" id="comment" rows="3" placeholder="Votre commentaire..."></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Articles connexes -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Articles connexes</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="/knowledge/5" class="list-group-item list-group-item-action px-0">
                            <div class="d-flex justify-content-between">
                                <div>Bonnes pratiques pour la sécurité des mots de passe</div>
                                <span class="badge bg-info">Sécurité</span>
                            </div>
                        </a>
                        <a href="/knowledge/6" class="list-group-item list-group-item-action px-0">
                            <div class="d-flex justify-content-between">
                                <div>Comment activer l'authentification à deux facteurs</div>
                                <span class="badge bg-info">Sécurité</span>
                            </div>
                        </a>
                        <a href="/knowledge/7" class="list-group-item list-group-item-action px-0">
                            <div class="d-flex justify-content-between">
                                <div>Protéger votre compte contre le phishing</div>
                                <span class="badge bg-info">Sécurité</span>
                            </div>
                        </a>
                        <a href="/knowledge/8" class="list-group-item list-group-item-action px-0">
                            <div class="d-flex justify-content-between">
                                <div>Guide de connexion pour les nouveaux utilisateurs</div>
                                <span class="badge bg-secondary">FAQ</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Catégories -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Catégories</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="/knowledge?category=technical" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-cogs me-2 text-primary"></i> Technique</span>
                            <span class="badge bg-primary rounded-pill">25</span>
                        </a>
                        <a href="/knowledge?category=software" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-desktop me-2 text-success"></i> Logiciels</span>
                            <span class="badge bg-success rounded-pill">18</span>
                        </a>
                        <a href="/knowledge?category=hardware" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-hdd me-2 text-warning"></i> Matériel</span>
                            <span class="badge bg-warning rounded-pill">12</span>
                        </a>
                        <a href="/knowledge?category=network" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-network-wired me-2 text-danger"></i> Réseau</span>
                            <span class="badge bg-danger rounded-pill">15</span>
                        </a>
                        <a href="/knowledge?category=security" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 active">
                            <span><i class="fas fa-shield-alt me-2"></i> Sécurité</span>
                            <span class="badge bg-light text-dark rounded-pill">10</span>
                        </a>
                        <a href="/knowledge?category=faq" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-question-circle me-2 text-secondary"></i> FAQ</span>
                            <span class="badge bg-secondary rounded-pill">20</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tags -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tags</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="/knowledge?tag=mot-de-passe" class="badge bg-primary text-decoration-none">mot de passe</a>
                        <a href="/knowledge?tag=securite" class="badge bg-primary text-decoration-none">sécurité</a>
                        <a href="/knowledge?tag=compte" class="badge bg-primary text-decoration-none">compte</a>
                        <a href="/knowledge?tag=authentification" class="badge bg-primary text-decoration-none">authentification</a>
                        <a href="/knowledge?tag=connexion" class="badge bg-primary text-decoration-none">connexion</a>
                        <a href="/knowledge?tag=reinitialisation" class="badge bg-primary text-decoration-none">réinitialisation</a>
                        <a href="/knowledge?tag=guide" class="badge bg-primary text-decoration-none">guide</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
