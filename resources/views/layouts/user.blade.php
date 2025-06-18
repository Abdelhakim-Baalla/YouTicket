@if(Auth::check())
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'YouTicket - Support')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/YouTicketLogo.png') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{asset('css/userLayout.css')}}">
    @yield('styles')
</head>
<body>
    <!-- Bouton de basculement du sidebar (mobile) -->
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('dashboard.utilisateur') }}" class="logo">
                    <div class="logo-icon">
                        {{-- <i class="fas fa-ticket-alt"></i> --}}
                        <img src="{{asset('images/YouTicketLogo.jpg')}}" class="rounded-lg" alt="YouTicket Logo">
                    </div>
                    <div class="logo-text">YouTicket</div>
                </a>
                <div class="notification-dropdown">
                    <div class="notification-icon" id="notificationToggle">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">{{auth::user()->notifications->where('lu', 0)->count()}}</span>
                    </div>
                    <div class="notification-menu" id="notificationMenu">
                        <div class="notification-header">
                            <div class="notification-title">Notifications</div>
                            <a href="#" class="text-sm text-primary-light">Marquer tout comme lu</a>
                        </div>
                        <div class="notification-list">
                            <div class="notification-item unread">
                                <div class="notification-icon-wrapper" style="background: var(--gradient-success);">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-text">Votre ticket <strong>#1234</strong> a été résolu.</div>
                                    <div class="notification-time">Il y a 10 minutes</div>
                                </div>
                            </div>
                            <div class="notification-item unread">
                                <div class="notification-icon-wrapper" style="background: var(--gradient-primary);">
                                    <i class="fas fa-comment"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-text">Nouveau commentaire sur votre ticket <strong>#1235</strong>.</div>
                                    <div class="notification-time">Il y a 30 minutes</div>
                                </div>
                            </div>
                            <div class="notification-item unread">
                                <div class="notification-icon-wrapper" style="background: var(--gradient-warning);">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-text">Le statut de votre ticket <strong>#1236</strong> a été mis à jour.</div>
                                    <div class="notification-time">Il y a 1 heure</div>
                                </div>
                            </div>
                            <div class="notification-item">
                                <div class="notification-icon-wrapper" style="background: var(--gradient-info);">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-text">Maintenance planifiée ce weekend.</div>
                                    <div class="notification-time">Il y a 1 jour</div>
                                </div>
                            </div>
                        </div>
                        <div class="notification-footer">
                            <a href="#">Voir toutes les notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="sidebar-content">
                <div class="sidebar-section">
                    <h3 class="sidebar-section-title">Menu principal</h3>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="/client" class="nav-link {{ request()->routeIs('dashboard.utilisateur') ? 'active' : '' }}">
                                <div class="nav-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <span>Tableau de bord</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.utilisateur.tickets')}}" class="nav-link {{ request()->routeIs('dashboard.utilisateur.tickets*') ? 'active' : '' }}">
                                <div class="nav-icon">
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                                <span>Mes tickets</span>
                                <span class="nav-badge">{{auth::user()->ticketsDemandes->count()}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.utilisateur.tickets.create')}}" class="nav-link">
                                <div class="nav-icon">
                                    <i class="fas fa-plus-circle"></i>
                                </div>
                                <span>Nouveau ticket</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="sidebar-section">
                    <h3 class="sidebar-section-title">Support</h3>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->routeIs('knowledge.*') ? 'active' : '' }}">
                                <div class="nav-icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <span>Base de connaissances</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->routeIs('faq') ? 'active' : '' }}">
                                <div class="nav-icon">
                                    <i class="fas fa-question-circle"></i>
                                </div>
                                <span>FAQ</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                                <div class="nav-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <span>Contact</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="sidebar-footer">
                <div class="user-menu" id="userMenu">
                    <div class="user-avatar">
                         @if(auth()->user()->photo)
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Photo de profil" style="height:40px; width:40px; object-fit:cover;">
                        @else
                            <div style="height:40px; width:40px; border-radius:50%; background:#444; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.1rem; border:2px solid var(--primary);">
                                {{ substr(auth()->user()->prenom ?? 'U', 0, 1) }}{{ substr(auth()->user()->nom ?? 'U', 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{auth::user()->prenom}} {{auth::user()->nom}}</div>
                        <div class="user-role">{{auth::user()->role->nom}}</div>
                    </div>
                    <div>
                        <i class="fas fa-chevron-down text-text-muted"></i>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Contenu principal -->
        <main class="main-content">
            <div class="fixed top-20 right-4 z-50 w-96 max-w-full">
        @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg mb-4 flex justify-between items-center fade-in">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="ml-4">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="bg-red-500 text-white px-4 py-3 rounded-lg shadow-lg mb-4 flex justify-between items-center fade-in">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span>{{ session('error') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="ml-4">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
        
        @if($errors->any())
            <div class="bg-yellow-500 text-white px-4 py-3 rounded-lg shadow-lg mb-4 fade-in">
                <div class="flex items-center mb-2">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <span>Veuillez corriger les erreurs suivantes :</span>
                </div>
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
            <div class="page-header">
                <h1 class="page-title">@yield('page-title', 'Tableau de bord')</h1>
                <p class="page-subtitle">@yield('page-subtitle', 'Bienvenue sur votre espace personnel')</p>
            </div>
            
            @yield('content')
        </main>
    </div>

    <script src="{{asset('js/userLayout.js')}}"></script>
    
    @yield('scripts')
</body>
</html>
@else
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endif
