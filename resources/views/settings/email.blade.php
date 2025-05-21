@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Paramètres d'email</h1>
        <button type="button" class="btn btn-primary">
            <i class="fas fa-save me-1"></i> Enregistrer les modifications
        </button>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Navigation</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="/settings" class="list-group-item list-group-item-action">
                            <i class="fas fa-cog me-2"></i> Général
                        </a>
                        <a href="/settings/notifications" class="list-group-item list-group-item-action">
                            <i class="fas fa-bell me-2"></i> Notifications
                        </a>
                        <a href="/settings/integrations" class="list-group-item list-group-item-action">
                            <i class="fas fa-plug me-2"></i> Intégrations
                        </a>
                        <a href="/settings/email" class="list-group-item list-group-item-action active">
                            <i class="fas fa-envelope me-2"></i> Email
                        </a>
                        <a href="/settings/security" class="list-group-item list-group-item-action">
                            <i class="fas fa-user-shield me-2"></i> Sécurité
                        </a>
                        <a href="/settings/appearance" class="list-group-item list-group-item-action">
                            <i class="fas fa-palette me-2"></i> Apparence
                        </a>
                        <a href="/settings/language" class="list-group-item list-group-item-action">
                            <i class="fas fa-language me-2"></i> Langue et région
                        </a>
                        <a href="/settings/backup" class="list-group-item list-group-item-action">
                            <i class="fas fa-database me-2"></i> Sauvegarde et restauration
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Configuration SMTP</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="mail_driver" class="form-label">Pilote de messagerie</label>
                            <select class="form-select" id="mail_driver">
                                <option value="smtp" selected>SMTP</option>
                                <option value="sendmail">Sendmail</option>
                                <option value="mailgun">Mailgun</option>
                                <option value="ses">Amazon SES</option>
                                <option value="postmark">Postmark</option>
                                <option value="log">Log (pour le débogage)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="mail_host" class="form-label">Serveur SMTP</label>
                            <input type="text" class="form-control" id="mail_host" value="smtp.exemple.com">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="mail_port" class="form-label">Port SMTP</label>
                                <input type="number" class="form-control" id="mail_port" value="587">
                            </div>
                            <div class="col-md-6">
                                <label for="mail_encryption" class="form-label">Chiffrement</label>
                                <select class="form-select" id="mail_encryption">
                                    <option value="">Aucun</option>
                                    <option value="tls" selected>TLS</option>
                                    <option value="ssl">SSL</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="mail_username" class="form-label">Nom d'utilisateur SMTP</label>
                            <input type="text" class="form-control" id="mail_username" value="support@exemple.com">
                        </div>

                        <div class="mb-3">
                            <label for="mail_password" class="form-label">Mot de passe SMTP</label>
                            <input type="password" class="form-control" id="mail_password" value="password">
                        </div>

                        <div class="mb-3">
                            <button type="button" class="btn btn-outline-primary">
                                <i class="fas fa-paper-plane me-1"></i> Tester la configuration
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Paramètres d'expédition</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="from_name" class="form-label">Nom de l'expéditeur</label>
                            <input type="text" class="form-control" id="from_name" value="Support Technique">
                        </div>

                        <div class="mb-3">
                            <label for="from_email" class="form-label">Email de l'expéditeur</label>
                            <input type="email" class="form-control" id="from_email" value="support@exemple.com">
                        </div>

                        <div class="mb-3">
                            <label for="reply_to" class="form-label">Adresse de réponse</label>
                            <input type="email" class="form-control" id="reply_to" value="noreply@exemple.com">
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="queue_emails" checked>
                                <label class="form-check-label" for="queue_emails">Mettre les emails en file d'attente</label>
                            </div>
                            <div class="form-text">Améliore les performances en envoyant les emails en arrière-plan</div>
                        </div>

                        <div class="mb-3">
                            <label for="email_batch_size" class="form-label">Taille du lot d'emails</label>
                            <input type="number" class="form-control" id="email_batch_size" value="50">
                            <div class="form-text">Nombre d'emails à envoyer par lot lors du traitement de la file d'attente</div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Modèles d'email</h5>
                </div>
                <div class="card-body">
                    <div class="list-group mb-3">
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Nouveau ticket</h6>
                                <p class="mb-0 text-muted small">Envoyé lorsqu'un nouveau ticket est créé</p>
                            </div>
                            <button class="btn btn-sm btn-outline-primary">Modifier</button>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Ticket assigné</h6>
                                <p class="mb-0 text-muted small">Envoyé lorsqu'un ticket est assigné à un agent</p>
                            </div>
                            <button class="btn btn-sm btn-outline-primary">Modifier</button>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Commentaire sur ticket</h6>
                                <p class="mb-0 text-muted small">Envoyé lorsqu'un commentaire est ajouté à un ticket</p>
                            </div>
                            <button class="btn btn-sm btn-outline-primary">Modifier</button>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Ticket résolu</h6>
                                <p class="mb-0 text-muted small">Envoyé lorsqu'un ticket est marqué comme résolu</p>
                            </div>
                            <button class="btn btn-sm btn-outline-primary">Modifier</button>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Demande de feedback</h6>
                                <p class="mb-0 text-muted small">Envoyé pour demander un feedback après la résolution d'un ticket</p>
                            </div>
                            <button class="btn btn-sm btn-outline-primary">Modifier</button>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Réinitialisation de mot de passe</h6>
                                <p class="mb-0 text-muted small">Envoyé lorsqu'un utilisateur demande une réinitialisation de mot de passe</p>
                            </div>
                            <button class="btn btn-sm btn-outline-primary">Modifier</button>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Bienvenue nouvel utilisateur</h6>
                                <p class="mb-0 text-muted small">Envoyé lorsqu'un nouvel utilisateur est créé</p>
                            </div>
                            <button class="btn btn-sm btn-outline-primary">Modifier</button>
                        </a>
                    </div>

                    <div class="mb-3">
                        <button type="button" class="btn btn-outline-primary">
                            <i class="fas fa-plus me-1"></i> Créer un nouveau modèle
                        </button>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Paramètres avancés</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="email_tracking" checked>
                                <label class="form-check-label" for="email_tracking">Activer le suivi des emails</label>
                            </div>
                            <div class="form-text">Suivre l'ouverture des emails et les clics sur les liens</div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="email_throttling" checked>
                                <label class="form-check-label" for="email_throttling">Activer la limitation d'envoi</label>
                            </div>
                            <div class="form-text">Limite le nombre d'emails envoyés par minute pour éviter d'être marqué comme spam</div>
                        </div>

                        <div class="mb-3">
                            <label for="throttle_rate" class="form-label">Taux de limitation (emails par minute)</label>
                            <input type="number" class="form-control" id="throttle_rate" value="100">
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="email_footer" checked>
                                <label class="form-check-label" for="email_footer">Ajouter un pied de page aux emails</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email_footer_text" class="form-label">Texte du pied de page</label>
                            <textarea class="form-control" id="email_footer_text" rows="3">Ce message est confidentiel. Si vous n'êtes pas le destinataire prévu, veuillez en informer l'expéditeur et supprimer ce message. © 2025 Ma Société. Tous droits réservés.</textarea>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="dkim_signing">
                                <label class="form-check-label" for="dkim_signing">Activer la signature DKIM</label>
                            </div>
                            <div class="form-text">Améliore la délivrabilité des emails en les authentifiant avec une signature numérique</div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="spf_checking" checked>
                                <label class="form-check-label" for="spf_checking">Vérifier les enregistrements SPF</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
