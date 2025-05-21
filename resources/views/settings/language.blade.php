@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Langue et région</h1>
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
                        <a href="/settings/appearance" class="list-group-item list-group-item-action">
                            <i class="fas fa-palette me-2"></i> Apparence
                        </a>
                        <a href="/settings/language" class="list-group-item list-group-item-action active">
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
                    <h5 class="card-title">Paramètres de langue</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="default_language" class="form-label">Langue par défaut</label>
                            <select class="form-select" id="default_language">
                                <option value="fr" selected>Français</option>
                                <option value="en">English</option>
                                <option value="es">Español</option>
                                <option value="de">Deutsch</option>
                                <option value="it">Italiano</option>
                                <option value="pt">Português</option>
                                <option value="nl">Nederlands</option>
                                <option value="ru">Русский</option>
                                <option value="zh">中文</option>
                                <option value="ja">日本語</option>
                                <option value="ar">العربية</option>
                            </select>
                            <div class="form-text">Langue utilisée par défaut pour tous les utilisateurs</div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="allow_user_language" checked>
                                <label class="form-check-label" for="allow_user_language">Permettre aux utilisateurs de choisir leur langue</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Langues disponibles</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lang_fr" checked>
                                        <label class="form-check-label" for="lang_fr">Français</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lang_en" checked>
                                        <label class="form-check-label" for="lang_en">English</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lang_es" checked>
                                        <label class="form-check-label" for="lang_es">Español</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lang_de" checked>
                                        <label class="form-check-label" for="lang_de">Deutsch</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lang_it" checked>
                                        <label class="form-check-label" for="lang_it">Italiano</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lang_pt" checked>
                                        <label class="form-check-label" for="lang_pt">Português</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lang_nl">
                                        <label class="form-check-label" for="lang_nl">Nederlands</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lang_ru">
                                        <label class="form-check-label" for="lang_ru">Русский</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lang_zh">
                                        <label class="form-check-label" for="lang_zh">中文</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lang_ja">
                                        <label class="form-check-label" for="lang_ja">日本語</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lang_ar">
                                        <label class="form-check-label" for="lang_ar">العربية</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lang_ko">
                                        <label class="form-check-label" for="lang_ko">한국어</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="auto_detect_language" checked>
                                <label class="form-check-label" for="auto_detect_language">Détecter automatiquement la langue du navigateur</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="show_language_selector" checked>
                                <label class="form-check-label" for="show_language_selector">Afficher le sélecteur de langue dans l'interface</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Paramètres régionaux</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="default_timezone" class="form-label">Fuseau horaire par défaut</label>
                            <select class="form-select" id="default_timezone">
                                <option value="UTC">UTC</option>
                                <option value="Europe/Paris" selected>Europe/Paris</option>
                                <option value="Europe/London">Europe/London</option>
                                <option value="America/New_York">America/New_York</option>
                                <option value="America/Los_Angeles">America/Los_Angeles</option>
                                <option value="Asia/Tokyo">Asia/Tokyo</option>
                                <option value="Asia/Shanghai">Asia/Shanghai</option>
                                <option value="Australia/Sydney">Australia/Sydney</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="allow_user_timezone" checked>
                                <label class="form-check-label" for="allow_user_timezone">Permettre aux utilisateurs de choisir leur fuseau horaire</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="date_format" class="form-label">Format de date</label>
                            <select class="form-select" id="date_format">
                                <option value="d/m/Y" selected>DD/MM/YYYY (31/12/2025)</option>
                                <option value="m/d/Y">MM/DD/YYYY (12/31/2025)</option>
                                <option value="Y-m-d">YYYY-MM-DD (2025-12-31)</option>
                                <option value="d F Y">DD Month YYYY (31 Décembre 2025)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="time_format" class="form-label">Format d'heure</label>
                            <select class="form-select" id="time_format">
                                <option value="H:i" selected>24 heures (14:30)</option>
                                <option value="h:i A">12 heures (02:30 PM)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="first_day_of_week" class="form-label">Premier jour de la semaine</label>
                            <select class="form-select" id="first_day_of_week">
                                <option value="1" selected>Lundi</option>
                                <option value="0">Dimanche</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="currency" class="form-label">Devise</label>
                            <select class="form-select" id="currency">
                                <option value="EUR" selected>Euro (€)</option>
                                <option value="USD">Dollar américain ($)</option>
                                <option value="GBP">Livre sterling (£)</option>
                                <option value="JPY">Yen japonais (¥)</option>
                                <option value="CAD">Dollar canadien (C$)</option>
                                <option value="AUD">Dollar australien (A$)</option>
                                <option value="CHF">Franc suisse (CHF)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="number_format" class="form-label">Format des nombres</label>
                            <select class="form-select" id="number_format">
                                <option value="fr" selected>1 234,56 (espace comme séparateur de milliers, virgule comme séparateur décimal)</option>
                                <option value="en">1,234.56 (virgule comme séparateur de milliers, point comme séparateur décimal)</option>
                                <option value="de">1.234,56 (point comme séparateur de milliers, virgule comme séparateur décimal)</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Traduction</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <p>Gérez les traductions personnalisées pour les termes spécifiques à votre organisation.</p>
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-language me-1"></i> Gérer les traductions
                        </a>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Termes personnalisés</label>
                        <div class="table-responsive">
                            <table class="table table-bordered">
