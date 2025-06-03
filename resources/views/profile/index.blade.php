@extends('layouts.app')

@section('title', 'Mon Profil - YouTicket')

@section('content')
<div class="auth-container">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12 fade-in">
            <h1 class="brand-tagline">Mon Profil</h1>
            <p class="brand-description">Gérez vos informations personnelles et préférences de compte</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Profile Card -->
                <div class="auth-card mb-6">
                    <div class="text-center">
                        <div class="relative inline-block mb-6">
                            <div class="w-20 h-20 rounded-full bg-gray-700 flex items-center justify-center text-2xl font-bold text-white mx-auto overflow-hidden">
                                @if(auth()->user()->photo)
                                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Photo de profil" class="w-full h-full object-cover">
                                @else
                                    {{ substr(auth()->user()->prenom ?? 'U', 0, 1) }}{{ substr(auth()->user()->nom ?? 'U', 0, 1) }}
                                @endif
                            </div>
                        </div>
                        <h3 class="auth-title mb-2">
                            {{ auth()->user()->prenom ?? 'Prénom' }} {{ auth()->user()->nom ?? 'Nom' }}
                        </h3>
                        <p class="auth-subtitle mb-6">{{ auth()->user()->poste ?? 'Poste non défini' }}</p>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="auth-card mb-6">
                    <h3 class="text-white font-semibold mb-4 flex items-center">
                        <i class="fas fa-list mr-2 text-primary-light"></i>
                        Navigation
                    </h3>
                    <nav class="space-y-2">
                        <a href="#personal_info" class="nav-link active flex items-center gap-3 px-3 py-3 text-sm rounded-lg transition-colors">
                            <i class="fas fa-user text-primary-light"></i>
                            Informations personnelles
                        </a>
                        <a href="#account_settings" class="nav-link flex items-center gap-3 px-3 py-3 text-sm rounded-lg transition-colors">
                            <i class="fas fa-cog text-gray-400"></i>
                            Paramètres du compte
                        </a>
                        <a href="#notifications" class="nav-link flex items-center gap-3 px-3 py-3 text-sm rounded-lg transition-colors">
                            <i class="fas fa-bell text-gray-400"></i>
                            Notifications
                        </a>
                        <a href="#security" class="nav-link flex items-center gap-3 px-3 py-3 text-sm rounded-lg transition-colors">
                            <i class="fas fa-shield-alt text-gray-400"></i>
                            Sécurité
                        </a>
                    </nav>
                </div>

                <!-- Statistics -->
                <div class="auth-card">
                    <h3 class="text-white font-semibold mb-4 flex items-center">
                        <i class="fas fa-chart-bar mr-2 text-primary-light"></i>
                        Statistiques
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 text-sm">Tickets créés</span>
                            <span class="feature-icon">24</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 text-sm">Tickets résolus</span>
                            <span class="px-2 py-1 bg-green-900 bg-opacity-30 text-green-400 rounded-full text-xs font-medium">18</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 text-sm">Commentaires</span>
                            <span class="px-2 py-1 bg-blue-900 bg-opacity-30 text-blue-400 rounded-full text-xs font-medium">42</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 text-sm">Membre depuis</span>
                            <span class="text-gray-400 text-xs">
                                {{ auth()->user()->created_at ? auth()->user()->created_at->format('d/m/Y') : 'N/A' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Personal Information -->
                <div class="auth-card fade-in" id="personal_info">
                    <div class="auth-header">
                        <h2 class="auth-title flex items-center justify-center">
                            <i class="fas fa-user mr-3 text-primary-light"></i>
                            Informations personnelles
                        </h2>
                    </div>
                    <form action="{{route('profile.update')}}" method="POST" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="prenom" class="form-label">Prénom</label>
                                <div class="input-wrapper">
                                    <i class="input-icon fas fa-user"></i>
                                    <input type="text" id="prenom" name="prenom" class="form-control" value="{{ auth()->user()->prenom ?? '' }}" placeholder="Votre prénom">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nom" class="form-label">Nom</label>
                                <div class="input-wrapper">
                                    <i class="input-icon fas fa-user"></i>
                                    <input type="text" id="nom" name="nom" class="form-control" value="{{ auth()->user()->nom ?? '' }}" placeholder="Votre nom">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-wrapper">
                                    <i class="input-icon fas fa-envelope"></i>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email ?? '' }}" placeholder="votre@email.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <div class="input-wrapper">
                                    <i class="input-icon fas fa-phone"></i>
                                    <input type="tel" id="telephone" name="telephone" class="form-control" value="{{ auth()->user()->telephone ?? '' }}" placeholder="+33 1 23 45 67 89">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group" style="display: flex; align-items: center; gap: 1rem;">
                                @if(auth()->user()->photo)
                                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Photo de profil" style="height:40px; width:40px; border-radius:50%; object-fit:cover; border:2px solid var(--primary);">
                                @else
                                    <div style="height:40px; width:40px; border-radius:50%; background:#444; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.1rem; border:2px solid var(--primary);">
                                        {{ substr(auth()->user()->prenom ?? 'U', 0, 1) }}{{ substr(auth()->user()->nom ?? 'U', 0, 1) }}
                                    </div>
                                @endif
                                <div style="flex:1;">
                                    <label for="photo" class="form-label" style="margin-bottom:0.5rem;">Photo de profil</label>
                                    <input type="file" name="photo" id="photo" class="form-control" style="padding-left:1rem; background:var(--surface); border:1px solid var(--primary); border-radius:0.5rem; color:var(--text-primary); font-size:0.95rem;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="equipe" class="form-label">Equipe</label>
                                <div class="input-wrapper">
                                    <i class="input-icon fas fa-users"></i>
                                    <input type="text" id="equipe" name="equipe" class="form-control" value="{{ auth()->user()->equipe_id ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="poste" class="form-label">Poste</label>
                                <div class="input-wrapper">
                                    <i class="input-icon fas fa-briefcase"></i>
                                    <input type="text" id="poste" name="poste" class="form-control" value="{{ auth()->user()->poste ?? '' }}" placeholder="Votre poste">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="departement" class="form-label">Département</label>
                                <div class="input-wrapper">
                                    <i class="input-icon fas fa-building"></i>
                                    <select id="departement" name="departement" class="form-control">
                                        <option value="">Sélectionner un département</option>
                                        <option value="it" {{ (auth()->user()->departement ?? '') == 'it' ? 'selected' : '' }}>IT</option>
                                        <option value="accounting" {{ (auth()->user()->departement ?? '') == 'accounting' ? 'selected' : '' }}>Comptabilité</option>
                                        <option value="hr" {{ (auth()->user()->departement ?? '') == 'hr' ? 'selected' : '' }}>Ressources Humaines</option>
                                        <option value="marketing" {{ (auth()->user()->departement ?? '') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                                        <option value="sales" {{ (auth()->user()->departement ?? '') == 'sales' ? 'selected' : '' }}>Ventes</option>
                                        <option value="management" {{ (auth()->user()->departement ?? '') == 'management' ? 'selected' : '' }}>Direction</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Account Settings -->
                <div class="auth-card fade-in" id="account_settings">
                    <div class="auth-header">
                        <h2 class="auth-title flex items-center justify-center">
                            <i class="fas fa-cog mr-3 text-primary-light"></i>
                            Paramètres du compte
                        </h2>
                    </div>
                    <form class="space-y-6">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="language" class="form-label">Langue</label>
                                <div class="input-wrapper">
                                    <i class="input-icon fas fa-globe"></i>
                                    <select id="language" class="form-control">
                                        <option value="fr" selected>Français</option>
                                        <option value="en">English</option>
                                        <option value="es">Español</option>
                                        <option value="de">Deutsch</option>
                                        <option value="it">Italiano</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="timezone" class="form-label">Fuseau horaire</label>
                                <div class="input-wrapper">
                                    <i class="input-icon fas fa-clock"></i>
                                    <select id="timezone" class="form-control">
                                        <option value="UTC">UTC</option>
                                        <option value="Europe/Paris" selected>Europe/Paris</option>
                                        <option value="Europe/London">Europe/London</option>
                                        <option value="America/New_York">America/New_York</option>
                                        <option value="America/Los_Angeles">America/Los_Angeles</option>
                                        <option value="Asia/Tokyo">Asia/Tokyo</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="email_notifications" class="checkbox" checked>
                                <label for="email_notifications" class="checkbox-label">
                                    <strong>Notifications par email</strong><br>
                                    <small>Recevoir les notifications importantes par email</small>
                                </label>
                            </div>

                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="browser_notifications" class="checkbox" checked>
                                <label for="browser_notifications" class="checkbox-label">
                                    <strong>Notifications navigateur</strong><br>
                                    <small>Afficher les notifications dans le navigateur</small>
                                </label>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                Enregistrer les préférences
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Notifications -->
                <div class="auth-card fade-in" id="notifications">
                    <div class="auth-header">
                        <h2 class="auth-title flex items-center justify-center">
                            <i class="fas fa-bell mr-3 text-primary-light"></i>
                            Préférences de notification
                        </h2>
                    </div>
                    <div class="space-y-6">
                        <div>
                            <label class="form-label">Types de notifications</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                    <div class="flex-1">
                                        <span>Nouveaux tickets</span>
                                        <input type="checkbox" checked class="checkbox ml-auto">
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="flex-1">
                                        <span>Commentaires</span>
                                        <input type="checkbox" checked class="checkbox ml-auto">
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div class="flex-1">
                                        <span>Assignations</span>
                                        <input type="checkbox" checked class="checkbox ml-auto">
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="flex-1">
                                        <span>Échéances SLA</span>
                                        <input type="checkbox" class="checkbox ml-auto">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="notification_frequency" class="form-label">Fréquence des notifications</label>
                            <div class="input-wrapper">
                                <i class="input-icon fas fa-clock"></i>
                                <select id="notification_frequency" class="form-control">
                                    <option value="immediate" selected>Immédiate</option>
                                    <option value="hourly">Toutes les heures</option>
                                    <option value="daily">Quotidienne (résumé)</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                Enregistrer les notifications
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Security -->
                <div class="auth-card fade-in" id="security">
                    <div class="auth-header">
                        <h2 class="auth-title flex items-center justify-center">
                            <i class="fas fa-shield-alt mr-3 text-primary-light"></i>
                            Sécurité
                        </h2>
                    </div>
                    <div class="space-y-8">
                        <!-- Change Password -->
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-4 text-center">Changer le mot de passe</h3>
                            <form class="space-y-4">
                                <div class="form-group">
                                    <label for="current_password" class="form-label">Mot de passe actuel</label>
                                    <div class="input-wrapper">
                                        <i class="input-icon fas fa-lock"></i>
                                        <input type="password" id="current_password" class="form-control" placeholder="Mot de passe actuel">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="new_password" class="form-label">Nouveau mot de passe</label>
                                        <div class="input-wrapper">
                                            <i class="input-icon fas fa-lock"></i>
                                            <input type="password" id="new_password" class="form-control" placeholder="Nouveau mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                                        <div class="input-wrapper">
                                            <i class="input-icon fas fa-lock"></i>
                                            <input type="password" id="confirm_password" class="form-control" placeholder="Confirmer le mot de passe">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-key"></i>
                                        Changer le mot de passe
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <style>
        /* Profile Image Styles */
        .w-20.h-20.rounded-full {
            border: 3px solid rgba(99, 102, 241, 0.3);
        }

        /* Navigation Styles */
        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--text-secondary);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            margin-bottom: 0.5rem;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-primary);
        }

        .nav-link.active {
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary-light);
            border-left: 3px solid var(--primary);
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            margin-right: 0.75rem;
        }

        /* Form Styles */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 0;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        .form-control {
            padding-left: 3rem;
            width: 100%;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 0.5rem;
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        /* Feature Items */
        .feature-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: var(--primary);
        }

        .feature-item .flex-1 {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .feature-icon {
            width: 36px;
            height: 36px;
            background: rgba(99, 102, 241, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-light);
        }

        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -10px rgba(99, 102, 241, 0.5);
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .lg\:grid-cols-4 {
                grid-template-columns: 1fr;
            }

            .lg\:col-span-1, .lg\:col-span-3 {
                grid-column: auto;
            }
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .auth-container {
                padding: 1rem;
            }

            .brand-tagline {
                font-size: 2rem;
            }
        }

        /* Animation Styles */
        .fade-in {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

<script>
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                
                // Update active navigation
                document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });
    
    // Update active navigation on scroll
    window.addEventListener('scroll', () => {
        const sections = document.querySelectorAll('[id]');
        const navLinks = document.querySelectorAll('.nav-link');
        
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (scrollY >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });
    
    // Form validation and submission
    document.addEventListener('DOMContentLoaded', function() {
        // Password strength indicator
        const newPasswordInput = document.getElementById('new_password');
        if (newPasswordInput) {
            newPasswordInput.addEventListener('input', function() {
                // Add password strength logic here
            });
        }
        
        // Save buttons functionality
        document.querySelectorAll('.btn.btn-primary').forEach(button => {
            button.addEventListener('click', function() {
                // Add save functionality here
                console.log('Saving changes...');
                
                // Show success message
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check mr-2"></i>Enregistré !';
                this.style.background = 'var(--gradient-accent)';
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.style.background = 'var(--gradient-primary)';
                }, 2000);
            });
        });
    });
</script>
@endsection