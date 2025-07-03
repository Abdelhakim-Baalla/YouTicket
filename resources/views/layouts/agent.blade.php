@if(auth()->check())
@if(auth()->user()->actif == 1)
@if(auth()->user()->role->nom === 'agent' || auth()->user()->role->nom === 'admin')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | YouTicket - Support</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/agentLayout.css') }}">
    @stack('styles')
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('dashboard') }}" class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <span class="logo-text">YouTicket</span>
                </a>
                <button class="sidebar-toggle-mobile" id="mobileMenuToggle">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="sidebar-content">
                <nav class="sidebar-nav">
                    <div class="nav-section">
                        <h3 class="nav-section-title">Support</h3>
                        <ul class="nav-menu">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link @if(Request::routeIs('agent.dashboard')) active @endif">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <span>Tableau de bord</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link @if(Request::routeIs('agent.tickets*')) active @endif">
                                    <i class="nav-icon fas fa-ticket-alt"></i>
                                    <span>Mes tickets</span>
                                    {{-- @if($unassignedTicketsCount > 0)
                                        <span class="nav-badge">{{ $unassignedTicketsCount }}</span>
                                    @endif --}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-clock"></i>
                                    <span>En attente</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-check-circle"></i>
                                    <span>Résolus</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="nav-section">
                        <h3 class="nav-section-title">Ressources</h3>
                        <ul class="nav-menu">
                            <li class="nav-item">
                                <a href="" class="nav-link @if(Request::routeIs('agent.knowledgebase*')) active @endif">
                                    <i class="nav-icon fas fa-book"></i>
                                    <span>Base de connaissances</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link @if(Request::routeIs('agent.reports')) active @endif">
                                    <i class="nav-icon fas fa-chart-bar"></i>
                                    <span>Mes statistiques</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            
            <div class="sidebar-footer">
                <div class="user-menu" id="userMenu">
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->prenom, 0, 1)) }}{{ strtoupper(substr(auth()->user()->nom, 0, 1)) }}
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</div>
                        <div class="user-role">Agent Support</div>
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Topbar -->
            <header class="topbar">
                <div class="topbar-left">
                    <button class="mobile-menu-toggle" id="mobileMenuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="page-title">@yield('page-title', 'Tableau de Bord')</h1>
                    @hasSection('page-subtitle')
                        <p class="page-subtitle">@yield('page-subtitle')</p>
                    @endif
                </div>
                
                <div class="topbar-right">
                    <div class="notification-dropdown">
                        <button class="notification-btn" id="notificationBtn">
                            <i class="fas fa-bell"></i>
                            {{-- @if($unreadNotificationsCount > 0)
                                <span class="notification-badge">{{ $unreadNotificationsCount }}</span>
                            @endif --}}
                        </button>
                        <div class="notification-menu" id="notificationDropdown">
                            <div class="notification-header">
                                <h4 class="notification-title">Notifications</h4>
                                <a href="" class="mark-all-read">Tout marquer comme lu</a>
                            </div>
                            <div class="notification-list">
                                
                                <a href="{{ $notification->data['url'] ?? '#' }}" class="notification-item unread">
                                    <div class="notification-icon-wrapper">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="notification-content">
                                        <p class="notification-text">message</p>
                                        <span class="notification-time">date</span>
                                    </div>
                                </a>
                                <div class="notification-empty">
                                    <i class="fas fa-bell-slash"></i>
                                    <p>Aucune notification</p>
                                </div>
                            </div>
                            <div class="notification-footer">
                                <a href="">Voir toutes les notifications</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="user-dropdown">
                        <button class="user-btn" id="topbarProfileBtn">
                            <div class="user-avatar-sm">
                                {{ strtoupper(substr(auth()->user()->prenom, 0, 1)) }}{{ strtoupper(substr(auth()->user()->nom, 0, 1)) }}
                            </div>
                            <span class="user-name-sm">{{ auth()->user()->prenom }}</span>
                        </button>
                        <div class="dropdown-menu" id="topbarDropdown">
                            <a href="{{ route('profile') }}" class="dropdown-item">
                                <i class="fas fa-user"></i> Mon profil
                            </a>
                            <a href="" class="dropdown-item">
                                <i class="fas fa-cog"></i> Paramètres
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="GET" action="{{ route('logout') }}" class="dropdown-item">
                                @csrf
                                <button type="submit" class="btn-logout">
                                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="content-area">
                <!-- Flash Messages -->
                @if(session()->has('success'))
                    <div class="flash-message success">
                        <div class="flash-content">
                            <i class="fas fa-check-circle"></i>
                            <span>{{ session('success') }}</span>
                            <button class="flash-close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endif
                
                @if(session()->has('error'))
                    <div class="flash-message error">
                        <div class="flash-content">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>{{ session('error') }}</span>
                            <button class="flash-close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endif
                
                @if(session()->has('warning'))
                    <div class="flash-message warning">
                        <div class="flash-content">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span>{{ session('warning') }}</span>
                            <button class="flash-close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endif

                <!-- Main Content -->
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/agentLayout.js') }}"></script>
    @stack('scripts')
</body>
</html>
@else
    <script>
        window.location.href = "{{ route('dashboard') }}";
        alert('Vous n\'avez pas les droits pour accéder à cette page.');
    </script>
@endif

@else
    <script>
        window.location.href = "{{ route('valider.compte') }}";
    </script>
@endif

@else
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endif