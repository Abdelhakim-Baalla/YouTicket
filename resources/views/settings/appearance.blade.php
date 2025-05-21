@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Paramètres d'apparence</h1>
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
                        <a href="/settings/email" class="list-group-item list-group-item-action">
                            <i class="fas fa-envelope me-2"></i> Email
                        </a>
                        <a href="/settings/security" class="list-group-item list-group-item-action">
                            <i class="fas fa-user-shield me-2"></i> Sécurité
                        </a>
                        <a href="/settings/appearance" class="list-group-item list-group-item-action active">
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
                    <h5 class="card-title">Thème</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Mode d'affichage</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="theme_mode" id="light_mode" checked>
                                    <label class="form-check-label" for="light_mode">
                                        <i class="fas fa-sun me-1"></i> Clair
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="theme_mode" id="dark_mode">
                                    <label class="form-check-label" for="dark_mode">
                                        <i class="fas fa-moon me-1"></i> Sombre
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="theme_mode" id="auto_mode">
                                    <label class="form-check-label" for="auto_mode">
                                        <i class="fas fa-adjust me-1"></i> Automatique (selon les préférences du système)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Couleur principale</label>
                            <div class="d-flex gap-3 flex-wrap">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primary_color" id="color_blue" checked>
                                    <label class="form-check-label" for="color_blue">
                                        <span class="d-inline-block rounded-circle me-1" style="width: 20px; height: 20px; background-color: #0d6efd;"></span> Bleu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primary_color" id="color_indigo">
                                    <label class="form-check-label" for="color_indigo">
                                        <span class="d-inline-block rounded-circle me-1" style="width: 20px; height: 20px; background-color: #6610f2;"></span> Indigo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primary_color" id="color_purple">
                                    <label class="form-check-label" for="color_purple">
                                        <span class="d-inline-block rounded-circle me-1" style="width: 20px; height: 20px; background-color: #6f42c1;"></span> Violet
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primary_color" id="color_pink">
                                    <label class="form-check-label" for="color_pink">
                                        <span class="d-inline-block rounded-circle me-1" style="width: 20px; height: 20px; background-color: #d63384;"></span> Rose
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primary_color" id="color_red">
                                    <label class="form-check-label" for="color_red">
                                        <span class="d-inline-block rounded-circle me-1" style="width: 20px; height: 20px; background-color: #dc3545;"></span> Rouge
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primary_color" id="color_orange">
                                    <label class="form-check-label" for="color_orange">
                                        <span class="d-inline-block rounded-circle me-1" style="width: 20px; height: 20px; background-color: #fd7e14;"></span> Orange
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primary_color" id="color_yellow">
                                    <label class="form-check-label" for="color_yellow">
                                        <span class="d-inline-block rounded-circle me-1" style="width: 20px; height: 20px; background-color: #ffc107;"></span> Jaune
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primary_color" id="color_green">
                                    <label class="form-check-label" for="color_green">
                                        <span class="d-inline-block rounded-circle me-1" style="width: 20px; height: 20px; background-color: #198754;"></span> Vert
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primary_color" id="color_teal">
                                    <label class="form-check-label" for="color_teal">
                                        <span class="d-inline-block rounded-circle me-1" style="width: 20px; height: 20px; background-color: #20c997;"></span> Turquoise
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primary_color" id="color_cyan">
                                    <label class="form-check-label" for="color_cyan">
                                        <span class="d-inline-block rounded-circle me-1" style="width: 20px; height: 20px; background-color: #0dcaf0;"></span> Cyan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primary_color" id="color_custom">
                                    <label class="form-check-label" for="color_custom">
                                        Personnalisé
                                    </label>
                                    <input type="color" class="form-control form-control-color ms-2" id="custom_color" value="#0d6efd">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Aperçu</label>
                            <div class="border p-3 rounded">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary me-2">Bouton primaire</button>
                                    <button type="button" class="btn btn-secondary me-2">Bouton secondaire</button>
                                    <button type="button" class="btn btn-success me-2">Bouton succès</button>
                                    <button type="button" class="btn btn-danger">Bouton danger</button>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="preview_switch" checked>
                                        <label class="form-check-label" for="preview_switch">Interrupteur</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge bg-primary me-1">Badge primaire</span>
                                    <span class="badge bg-secondary me-1">Badge secondaire</span>
                                    <span class="badge bg-success me-1">Badge succès</span>
                                    <span class="badge bg-danger">Badge danger</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Logo et favicon</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-4">
                            <label class="form-label">Logo du système</label>
                            <div class="d-flex align-items-center mb-3">
                                <div class="border rounded p-2 me-3" style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-ticket-alt fa-3x text-primary"></i>
                                </div>
                                <div>
                                    <input class="form-control mb-2" type="file" id="logo_upload">
                                    <div class="form-text">Format recommandé : PNG ou SVG, 200x50 pixels minimum</div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="show_logo_text" checked>
                                <label class="form-check-label" for="show_logo_text">
                                    Afficher le texte à côté du logo
                                </label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Favicon</label>
                            <div class="d-flex align-items-center mb-3">
                                <div class="border rounded p-2 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-ticket-alt text-primary"></i>
                                </div>
                                <div>
                                    <input class="form-control mb-2" type="file" id="favicon_upload">
                                    <div class="form-text">Format recommandé : ICO, PNG ou SVG, 32x32 pixels</div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image de connexion</label>
                            <div class="d-flex align-items-center mb-3">
                                <div class="border rounded p-2 me-3" style="width: 150px; height: 100px; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;">
                                    <span class="text-muted">Image de connexion</span>
                                </div>
                                <div>
                                    <input class="form-control mb-2" type="file" id="login_image_upload">
                                    <div class="form-text">Format recommandé : JPG ou PNG, 1200x800 pixels minimum</div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Mise en page</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Disposition de la barre latérale</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sidebar_position" id="sidebar_left" checked>
                                    <label class="form-check-label" for="sidebar_left">
                                        Gauche
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sidebar_position" id="sidebar_right">
                                    <label class="form-check-label" for="sidebar_right">
                                        Droite
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="sidebar_collapse" checked>
                                <label class="form-check-label" for="sidebar_collapse">Permettre de réduire la barre latérale</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fixed_header" checked>
                                <label class="form-check-label" for="fixed_header">En-tête fixe</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="fixed_footer">
                                <label class="form-check-label" for="fixed_footer">Pied de page fixe</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="container_width" class="form-label">Largeur du conteneur</label>
                            <select class="form-select" id="container_width">
                                <option value="fluid" selected>Fluide (pleine largeur)</option>
                                <option value="fixed">Fixe (largeur maximale)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="content_density" class="form-label">Densité du contenu</label>
                            <select class="form-select" id="content_density">
                                <option value="comfortable" selected>Confortable (espacement standard)</option>
                                <option value="compact">Compact (espacement réduit)</option>
                                <option value="spacious">Spacieux (espacement augmenté)</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Personnalisation avancée</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="custom_css" class="form-label">CSS personnalisé</label>
                            <textarea class="form-control font-monospace" id="custom_css" rows="5" placeholder="/* Ajoutez votre CSS personnalisé ici */"></textarea>
                            <div class="form-text">Le CSS personnalisé sera appliqué à toutes les pages du système</div>
                        </div>

                        <div class="mb-3">
                            <label for="custom_js" class="form-label">JavaScript personnalisé</label>
                            <textarea class="form-control font-monospace" id="custom_js" rows="5" placeholder="// Ajoutez votre JavaScript personnalisé ici"></textarea>
                            <div class="form-text">Le JavaScript personnalisé sera exécuté sur toutes les pages du système</div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="custom_font">
                                <label class="form-check-label" for="custom_font">Utiliser une police personnalisée</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="font_family" class="form-label">Famille de police</label>
                            <select class="form-select" id="font_family" disabled>
                                <option value="system">Police système par défaut</option>
                                <option value="roboto">Roboto</option>
                                <option value="open_sans">Open Sans</option>
                                <option value="lato">Lato</option>
                                <option value="montserrat">Montserrat</option>
                                <option value="custom">Personnalisée</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="custom_font_url" class="form-label">URL de la police personnalisée</label>
                            <input type="text" class="form-control" id="custom_font_url" placeholder="https://fonts.googleapis.com/css2?family=..." disabled>
                            <div class="form-text">URL de la police Google Fonts ou autre service de polices</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
