@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Foire aux questions</h1>
        <div>
            <a href="/knowledge" class="btn btn-outline-primary me-2">
                <i class="fas fa-book me-1"></i> Base de connaissances
            </a>
            <a href="/tickets/create" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Créer un ticket
            </a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg" placeholder="Rechercher dans la FAQ...">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="text-center text-muted">
                        <small>Questions populaires : <a href="#" class="text-decoration-none">Réinitialiser mot de passe</a> • <a href="#" class="text-decoration-none">Créer un ticket</a> • <a href="#" class="text-decoration-none">Problèmes de connexion</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Catégories</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="#general" class="list-group-item list-group-item-action active">
                            <i class="fas fa-info-circle me-2"></i> Questions générales
                        </a>
                        <a href="#account" class="list-group-item list-group-item-action">
                            <i class="fas fa-user me-2"></i> Compte et profil
                        </a>
                        <a href="#tickets" class="list-group-item list-group-item-action">
                            <i class="fas fa-ticket-alt me-2"></i> Tickets et support
                        </a>
                        <a href="#kb" class="list-group-item list-group-item-action">
                            <i class="fas fa-book me-2"></i> Base de connaissances
                        </a>
                        <a href="#security" class="list-group-item list-group-item-action">
                            <i class="fas fa-shield-alt me-2"></i> Sécurité
                        </a>
                        <a href="#billing" class="list-group-item list-group-item-action">
                            <i class="fas fa-credit-card me-2"></i> Facturation
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card mb-4" id="general">
                <div class="card-header">
                    <h5 class="card-title">Questions générales</h5>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionGeneral">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Qu'est-ce que le système de ticketing ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionGeneral">
                                <div class="accordion-body">
                                    <p>Le système de ticketing est une plateforme qui permet de gérer les demandes de support, les incidents et les problèmes de manière organisée. Il permet aux utilisateurs de soumettre des tickets, aux agents de support de les traiter, et aux administrateurs de suivre et d'analyser les performances du service d'assistance.</p>
                                    <p>Grâce à ce système, vous pouvez :</p>
                                    <ul>
                                        <li>Créer et suivre des tickets de support</li>
                                        <li>Communiquer avec l'équipe de support</li>
                                        <li>Consulter l'historique de vos demandes</li>
                                        <li>Accéder à la base de connaissances pour résoudre des problèmes courants</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Comment puis-je contacter le support technique ?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionGeneral">
                                <div class="accordion-body">
                                    <p>Vous pouvez contacter notre équipe de support technique de plusieurs façons :</p>
                                    <ul>
                                        <li><strong>Créer un ticket</strong> : La méthode recommandée est de créer un ticket directement dans le système en cliquant sur le bouton "Nouveau ticket" dans la section Tickets.</li>
                                        <li><strong>Email</strong> : Vous pouvez envoyer un email à support@exemple.com. Un ticket sera automatiquement créé dans le système.</li>
                                        <li><strong>Téléphone</strong> : Pour les problèmes urgents, vous pouvez appeler notre ligne d'assistance au +33 1 23 45 67 89 (du lundi au vendredi, de 9h à 18h).</li>
                                    </ul>
                                    <p>Notre équipe de support s'engage à répondre à toutes les demandes dans les meilleurs délais, conformément à nos accords de niveau de service (SLA).</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Quels sont les horaires du support technique ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionGeneral">
                                <div class="accordion-body">
                                    <p>Notre équipe de support technique est disponible selon les horaires suivants :</p>
                                    <ul>
                                        <li><strong>Support standard</strong> : Du lundi au vendredi, de 9h à 18h (heure de Paris)</li>
                                        <li><strong>Support étendu</strong> : Pour les clients avec un contrat premium, le support est disponible de 8h à 20h (heure de Paris)</li>
                                        <li><strong>Support d'urgence</strong> : Pour les incidents critiques, un support 24/7 est disponible pour les clients avec un contrat entreprise</li>
                                    </ul>
                                    <p>En dehors des heures de support, vous pouvez toujours créer des tickets qui seront traités dès la reprise du service. Pour les problèmes urgents en dehors des heures de bureau, les clients avec un contrat approprié peuvent utiliser le numéro d'urgence fourni dans leur documentation.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Comment puis-je donner mon avis sur le service de support ?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionGeneral">
                                <div class="accordion-body">
                                    <p>Votre avis est important pour nous aider à améliorer continuellement notre service. Vous pouvez donner votre feedback de plusieurs façons :</p>
                                    <ul>
                                        <li><strong>Évaluation après résolution</strong> : Après la résolution d'un ticket, vous recevrez automatiquement une demande d'évaluation par email.</li>
                                        <li><strong>Formulaire de feedback</strong> : Vous pouvez accéder à notre formulaire de feedback complet en cliquant sur le lien "Donner votre avis" dans le pied de page.</li>
                                        <li><strong>Enquêtes de satisfaction</strong> : Nous envoyons périodiquement des enquêtes de satisfaction pour recueillir des commentaires plus détaillés.</li>
                                    </ul>
                                    <p>Tous les commentaires sont examinés par notre équipe de gestion de la qualité et contribuent directement à l'amélioration de nos services.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4" id="account">
                <div class="card-header">
                    <h5 class="card-title">Compte et profil</h5>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionAccount">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Comment puis-je modifier mes informations personnelles ?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionAccount">
                                <div class="accordion-body">
                                    <p>Pour modifier vos informations personnelles :</p>
                                    <ol>
                                        <li>Cliquez sur votre nom d'utilisateur dans le coin supérieur droit de l'écran</li>
                                        <li>Sélectionnez "Profil" dans le menu déroulant</li>
                                        <li>Dans la section "Informations personnelles", vous pouvez modifier votre nom, adresse email, numéro de téléphone et autres détails</li>
                                        <li>Après avoir effectué vos modifications, cliquez sur le bouton "Enregistrer les modifications"</li>
                                    </ol>
                                    <p>Notez que certaines informations peuvent nécessiter une validation par un administrateur avant d'être mises à jour dans le système.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Comment puis-je réinitialiser mon mot de passe ?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionAccount">
                                <div class="accordion-body">
                                    <p>Si vous avez oublié votre mot de passe, vous pouvez le réinitialiser en suivant ces étapes :</p>
                                    <ol>
                                        <li>Sur la page de connexion, cliquez sur le lien "Mot de passe oublié"</li>
                                        <li>Entrez l'adresse email associée à votre compte</li>
                                        <li>Cliquez sur "Envoyer le lien de réinitialisation"</li>
                                        <li>Vérifiez votre boîte de réception et cliquez sur le lien de réinitialisation dans l'email reçu</li>
                                        <li>Créez un nouveau mot de passe en suivant les critères de sécurité indiqués</li>
                                        <li>Confirmez votre nouveau mot de passe</li>
                                        <li>Cliquez sur "Enregistrer" pour finaliser la réinitialisation</li>
                                    </ol>
                                    <p>Si vous ne recevez pas l'email de réinitialisation, vérifiez votre dossier de spam ou contactez le support technique.</p>
                                    <p>Si vous êtes déjà connecté et souhaitez changer votre mot de passe, accédez à votre profil et utilisez l'option "Changer le mot de passe" dans la section Sécurité.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Comment puis-je configurer mes préférences de notification ?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionAccount">
                                <div class="accordion-body">
                                    <p>Pour configurer vos préférences de notification :</p>
                                    <ol>
                                        <li>Accédez à votre profil en cliquant sur votre nom d'utilisateur dans le coin supérieur droit</li>
                                        <li>Sélectionnez l'onglet "Préférences de notification"</li>
                                        <li>Vous pouvez personnaliser les types de notifications que vous souhaitez recevoir (email, navigateur, SMS, etc.)</li>
                                        <li>Pour chaque type d'événement (nouveau ticket, commentaire, résolution, etc.), cochez ou décochez les canaux de notification souhaités</li>
                                        <li>Vous pouvez également configurer la fréquence des notifications (immédiate, résumé horaire, résumé quotidien)</li>
                                        <li>N'oubliez pas de cliquer sur "Enregistrer les modifications" pour appliquer vos préférences</li>
                                    </ol>
                                    <p>Vous pouvez également configurer des "heures de silence" pendant lesquelles vous ne recevrez pas de notifications, sauf pour les tickets urgents si vous avez activé cette option.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    Comment puis-je activer l'authentification à deux facteurs ?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionAccount">
                                <div class="accordion-body">
                                    <p>L'authentification à deux facteurs (2FA) ajoute une couche de sécurité supplémentaire à votre compte. Pour l'activer :</p>
                                    <ol>
                                        <li>Accédez à votre profil en cliquant sur votre nom d'utilisateur</li>
                                        <li>Sélectionnez l'onglet "Sécurité"</li>
                                        <li>Dans la section "Authentification à deux facteurs", activez l'option en basculant l'interrupteur</li>
                                        <li>Choisissez votre méthode préférée :
                                            <ul>
                                                <li>Application d'authentification (recommandé) : Scannez le code QR avec une application comme Google Authenticator ou Authy</li>
                                                <li>SMS : Recevez un code par message texte sur votre téléphone mobile</li>
                                                <li>Email : Recevez un code par email (moins sécurisé)</li>
                                            </ul>
                                        </li>
                                        <li>Suivez les instructions à l'écran pour terminer la configuration</li>
                                        <li>Notez ou téléchargez vos codes de récupération et conservez-les en lieu sûr</li>
                                    </ol>
                                    <p>Une fois activée, vous devrez fournir un code supplémentaire lors de la connexion, en plus de votre mot de passe. Si vous perdez l'accès à votre méthode d'authentification, vous pourrez utiliser les codes de récupération pour vous connecter.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4" id="tickets">
                <div class="card-header">
                    <h5 class="card-title">Tickets et support</h5>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionTickets">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    Comment créer un nouveau ticket ?
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionTickets">
                                <div class="accordion-body">
                                    <p>Pour créer un nouveau ticket de support :</p>
                                    <ol>
                                        <li>Cliquez sur le bouton "Nouveau ticket" dans la section Tickets</li>
                                        <li>Sélectionnez le projet ou le service concerné</li>
                                        <li>Donnez un titre clair et concis qui résume votre problème</li>
                                        <li>Dans la description, fournissez autant de détails que possible :
                                            <ul>
                                                <li>Ce que vous essayiez de faire</li>
                                                <li>Ce qui s'est passé</li>
                                                <li>Messages d'erreur éventuels</li>
                                                <li>Étapes pour reproduire le problème</li>
                                            </ul>
                                        </li>
                                        <li>Sélectionnez le type de ticket (incident, demande de service, problème, etc.)</li>
                                        <li>Indiquez l'impact et la fréquence du problème</li>
                                        <li>Définissez la priorité en fonction de l'urgence</li>
                                        <li>Ajoutez des pièces jointes si nécessaire (captures d'écran, journaux, etc.)</li>
                                        <li>Cliquez sur "Créer le ticket" pour soumettre votre demande</li>
                                    </ol>
                                    <p>Une fois créé, votre ticket sera assigné à un agent de support en fonction de sa nature et de sa priorité. Vous recevrez une notification par email avec le numéro de référence du ticket.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    Comment suivre l'état de mes tickets ?
                                </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionTickets">
                                <div class="accordion-body">
                                    <p>Pour suivre l'état de vos tickets :</p>
                                    <ol>
                                        <li>Accédez à la section "Tickets" dans le menu principal</li>
                                        <li>Par défaut, vous verrez tous vos tickets actifs</li>
                                        <li>Utilisez les filtres pour affiner votre recherche :
                                            <ul>
                                                <li>État (nouveau, en cours, en attente, résolu, fermé)</li>
                                                <li>Priorité (faible, moyenne, haute, urgente)</li>
                                                <li>Date de création</li>
                                                <li>Assigné à (si vous êtes un agent ou un administrateur)</li>
                                            </ul>
                                        </li>
                                        <li>Cliquez sur l'ID ou le titre d'un ticket pour voir les détails complets</li>
                                    </ol>
                                    <p>Dans la vue détaillée du ticket, vous pouvez :</p>
                                    <ul>
                                        <li>Voir l'historique complet des communications</li>
                                        <li>Ajouter des commentaires ou des pièces jointes supplémentaires</li>
                                        <li>Voir qui est assigné à votre ticket</li>
                                        <li>Consulter les délais de résolution prévus selon les SLA</li>
                                    </ul>
                                    <p>Vous recevrez également des notifications par email lorsque le statut de votre ticket change ou lorsqu'un agent y ajoute un commentaire.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEleven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                    Que signifient les différents statuts de ticket ?
                                </button>
                            </h2>
                            <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionTickets">
                                <div class="accordion-body">
                                    <p>Les tickets peuvent avoir différents statuts qui indiquent leur progression dans le processus de support :</p>
                                    <ul>
                                        <li><strong>Nouveau</strong> : Le ticket vient d'être créé et n'a pas encore été traité par un agent.</li>
                                        <li><strong>En cours</strong> : Un agent a pris en charge le ticket et travaille activement à sa résolution.</li>
                                        <li><strong>En attente</strong> : Le traitement du ticket est temporairement suspendu, généralement en attente d'informations supplémentaires de votre part ou d'une action d'un tiers.</li>
                                        <li><strong>Résolu</strong> : L'agent a fourni une solution au problème. Le ticket reste dans cet état pendant une période définie (généralement 3-7 jours) pour vous permettre de vérifier que la solution fonctionne.</li>
                                        <li><strong>Fermé</strong> : Le ticket est considéré comme complètement traité. Cela se produit automatiquement après un certain temps dans l'état "Résolu" sans réponse de votre part, ou lorsque vous confirmez que le problème est résolu.</li>
                                        <li><strong>Rouvert</strong> : Un ticket précédemment résolu ou fermé a été réactivé, généralement parce que le problème persiste ou est réapparu.</li>
                                    </ul>
                                    <p>Si votre ticket est en attente depuis longtemps ou si vous n'êtes pas d'accord avec son statut actuel, vous pouvez ajouter un commentaire pour demander une mise à jour ou une escalade.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwelve">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                    Comment déterminer la priorité d'un ticket ?
                                </button>
                            </h2>
                            <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordionTickets">
                                <div class="accordion-body">
                                    <p>La priorité d'un ticket détermine son niveau d'urgence et influence le délai de réponse et de résolution. Voici comment choisir la priorité appropriée :</p>
                                    <ul>
                                        <li><strong>Faible</strong> : 
                                            <ul>
                                                <li>Le problème a un impact minimal sur les opérations</li>
                                                <li>Il existe des solutions de contournement acceptables</li>
                                                <li>La résolution peut attendre sans conséquences significatives</li>
                                                <li>Exemple : demande de fonctionnalité, question générale, problème cosmétique</li>
                                            </ul>
                                        </li>
                                        <li><strong>Moyenne</strong> : 
                                            <ul>
                                                <li>Le problème affecte un nombre limité d'utilisateurs</li>
                                                <li>Il existe des solutions de contournement, mais elles sont imparfaites</li>
                                                <li>Le problème cause des désagréments mais n'empêche pas le travail</li>
                                                <li>Exemple : fonctionnalité qui ne fonctionne pas comme prévu, problème de performance</li>
                                            </ul>
                                        </li>
                                        <li><strong>Haute</strong> : 
                                            <ul>
                                                <li>Le problème affecte un département entier ou une fonction importante</li>
                                                <li>Les solutions de contournement sont limitées ou inefficaces</li>
                                                <li>Le problème entrave significativement la productivité</li>
                                                <li>Exemple : perte d'accès à une application critique pour un groupe d'utilisateurs</li>
                                            </ul>
                                        </li>
                                        <li><strong>Urgente</strong> : 
                                            <ul>
                                                <li>Le problème affecte l'ensemble de l'organisation</li>
                                                <li>Aucune solution de contournement n'est disponible</li>
                                                <li>Le problème empêche complètement le travail ou présente un risque de sécurité</li>
                                                <li>Exemple : panne totale du système, violation de données, problème de sécurité critique</li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <p>Notez que la priorité peut être ajustée par les agents de support en fonction de leur évaluation de la situation. Si vous pensez que la priorité de votre ticket doit être modifiée, vous pouvez en faire la demande en ajoutant un commentaire avec justification.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
