@if(Auth::check())
@php
    $user = Auth::user();
    $role = $user->role->nom ?? null; 
@endphp
@if($role == 'admin' || $role == 'super-admin')

@if(auth()->user()->actif == 1)
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/YouTicketLogo.png') }}" type="image/x-icon">
    <title>@yield('title', 'Dashboard - YouTicket')</title>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Couleurs */
            --primary: #6366f1;
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --accent: #f59e0b;
            --accent-light: #fbbf24;
            --success: #059669;
            --warning: #dc2626;
            --dark: #0f0f23;
            --dark-light: #1a1a2e;
            --dark-lighter: #16213e;
            --text-primary: #e2e8f0;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --border: #334155;
            
            /* Dégradés */
            --gradient-primary: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            --gradient-accent: linear-gradient(135deg, #f59e0b 0%, #ef4444 100%);
            --gradient-success: linear-gradient(135deg, #059669 0%, #10b981 100%);
            --gradient-warning: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
            
            /* Effets */
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
            --shadow-lg: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            --glow: 0 0 20px rgba(99, 102, 241, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: var(--dark);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Effet de fond */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 20%, rgba(99, 102, 241, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(245, 158, 11, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(139, 92, 246, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        /* Structure principale */
        .dashboard-container {
            display: flex;
            gap: 7px;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            background: rgba(15, 15, 35, 0.9);
            backdrop-filter: blur(20px);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
            transition: transform 0.3s ease;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-logo {
            width: 40px;
            height: 40px;
            background: var(--gradient-primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .sidebar-title {
            font-size: 1.5rem;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar-nav {
            flex: 1;
            padding: 1.5rem 1rem;
            overflow-y: auto;
        }

        .nav-section {
            margin-bottom: 2rem;
        }

        .nav-section-title {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
            padding-left: 1rem;
            font-family: 'JetBrains Mono', monospace;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary-light);
        }

        .nav-link.active {
            border-left: 3px solid var(--primary);
        }

        .nav-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .nav-badge {
            margin-left: auto;
            background: rgba(99, 102, 241, 0.2);
            color: var(--primary-light);
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            font-weight: 600;
        }

        /* Contenu principal */
        .main-content {
            flex: 1;
            margin-left: 280px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Topbar */
        .topbar {
            background: rgba(15, 15, 35, 0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-wrapper {
            position: relative;
            width: 300px;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--text-primary);
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: var(--glow);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .notification-btn {
            position: relative;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.05);
            border: none;
            border-radius: 10px;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-primary);
        }

        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 18px;
            height: 18px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
        }

        /* Zone de contenu */
        .content-area {
            flex: 1;
            /* padding: 1rem; */
            overflow-y: auto;
            overflow-x: auto;
        }

        /* Cartes */
        .card {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: 16px;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .card-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-icon {
            width: 32px;
            height: 32px;
            background: var(--gradient-primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Statistiques */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gradient-primary);
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .stat-primary {
            background: var(--gradient-primary);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        /* Menu mobile */
        .mobile-menu-toggle {
            display: none;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.05);
            border: none;
            border-radius: 10px;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s ease;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .mobile-menu-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-primary);
        }

        /* Dropdown */
        .dropdown-menu {
            position: absolute;
            background: rgba(30, 41, 59, 0.95);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transition: all 0.2s ease;
            min-width: 200px;
            right: 0;
            margin-top: 0.5rem;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
        }

        .dropdown-item {
            padding: 0.75rem 1rem;
            color: var(--text-primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: rgba(99, 102, 241, 0.1);
        }

        .dropdown-item i {
            width: 20px;
            text-align: center;
        }

        .dropdown-divider {
            height: 1px;
            background-color: var(--border);
            margin: 0.5rem 0;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .mobile-menu-toggle {
                display: flex;
            }
        }

        @media (max-width: 768px) {
            .search-wrapper {
                width: 200px;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .topbar {
                padding: 1rem;
            }
            .search-wrapper {
                display: none;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.3s ease-out;
        }

        /* User profile in topbar */
        .user-avatar {
            width: 40px;
            height: 40px;
            background: var(--gradient-primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }
        /* Assure que la table est responsive */
        .min-w-full {
            min-width: 100%;
        }

        /* Correction pour le conteneur principal */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Correction pour le contenu principal */
        .main-content {
            flex: 1;
            margin-left: 230px; /* Doit correspondre à la largeur de la sidebar */
            width: calc(100% - 230px);
            overflow-x: hidden;
        }

        /* Ajustements pour les petits écrans */
        @media (max-width: 1024px) {
            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
            }

            .sidebar.open {
                transform: translateX(0);
            }
        }

        /* Assure que le contenu de la table reste lisible */
        table {
            width: 100%;
            white-space: nowrap;
        }

        /* Padding pour le contenu */
        .content-area {
            padding: 1rem;
        }
    </style>
    @yield('styles')
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-brand">
                    <div class="sidebar-logo">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <span class="sidebar-title">YouTicket</span>
                </div>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section">
                    <h3 class="nav-section-title">Principal</h3>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.admin') }}" class="nav-link {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">
                                <span class="nav-icon"><i class="fas fa-home"></i></span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.admin.utilisateurs') }}" class="nav-link {{ request()->routeIs('dashboard.admin.utilisateurs') ? 'active' : '' }}">
                                <span class="nav-icon"><i class="fas fa-users"></i></span>
                                <span>Utilisateurs</span>
                                <span class="nav-badge">{{ auth()->user()->count() }}</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{ route('histories.index') }}" class="nav-link {{ request()->routeIs('histories.*') ? 'active' : '' }}">
                                <span class="nav-icon"><i class="fas fa-history"></i></span>
                                <span>Histoire des Actions</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.admin.equipes') }}" class="nav-link {{ request()->routeIs('dashboard.admin.equipes') ? 'active' : '' }}">
                                <span class="nav-icon"><i class="fas fa-people-group"></i></span>
                                <span>Equipes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tickets.create') }}" class="nav-link {{ request()->routeIs('tickets.*') ? 'active' : '' }}">
                                <span class="nav-icon"><i class="fas fa-plus-circle"></i></span>
                                <span>Nouveau Ticket</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="nav-section">
                    <h3 class="nav-section-title">Gestion</h3>
                    <ul class="nav-menu">
                        @can('view-team')
                        <li class="nav-item">
                            <a href="{{ route('team.index') }}" class="nav-link {{ request()->routeIs('team.*') ? 'active' : '' }}">
                                <span class="nav-icon"><i class="fas fa-users"></i></span>
                                <span>Équipe</span>
                            </a>
                        </li>
                        @endcan
                        
                        <li class="nav-item">
                            <a href="{{ route('reports.index') }}" class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                                <span class="nav-icon"><i class="fas fa-chart-bar"></i></span>
                                <span>Analytics</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                                <span class="nav-icon"><i class="fas fa-user"></i></span>
                                <span>Mon Profil</span>
                            </a>
                        </li>
                        @can('view-settings')
                        <li class="nav-item">
                            <a href="{{ route('settings') }}" class="nav-link {{ request()->routeIs('settings.*') ? 'active' : '' }}">
                                <span class="nav-icon"><i class="fas fa-cog"></i></span>
                                <span>Paramètres</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </nav>
        </aside>

        <!-- Contenu principal -->
        <div class="main-content">
            <header class="topbar">
                <div class="flex items-center">
                    <button class="mobile-menu-toggle" id="mobileMenuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
                </div>

                <div class="topbar-actions">
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Rechercher...">
                    </div>
                    
                    <button class="notification-btn" id="notificationBtn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    
                    <div class="relative">
                        <button class="user-avatar" id="topbarProfileBtn">
                             @if(auth()->user()->photo)
                                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Photo de profil" class="w-full h-full rounded-full object-cover">
                                @else
                                    {{ substr(auth()->user()->prenom ?? 'U', 0, 1) }}{{ substr(auth()->user()->nom ?? 'U', 0, 1) }}
                                @endif
                        </button>
                        
                        <div class="dropdown-menu" id="topbarDropdown">
                            <div class="px-4 py-3 border-b border-gray-700">
                                <div class="font-medium">{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</div>
                                <div class="text-sm text-gray-400">{{ auth()->user()->email }}</div>
                            </div>
                            <a href="{{ route('profile') }}" class="dropdown-item">
                                <i class="fas fa-user"></i>
                                <span>Mon Profil</span>
                            </a>
                            @can('view-settings')
                            <a href="{{ route('settings') }}" class="dropdown-item">
                                <i class="fas fa-cog"></i>
                                <span>Paramètres</span>
                            </a>
                            @endcan
                            <div class="dropdown-divider"></div>
                            <form method="GET" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class=" text-red-400 bg- w-full text-left">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Déconnexion</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <main class="content-area">
                <!-- Flash Messages -->
    <div class="flash-messages">
        @foreach (['error', 'success', 'warning', 'info'] as $msg)
            @if(Session::has($msg))
                <div class="flash-message {{ $msg }}">
                    <i class="fas @if($msg == 'error') fa-exclamation-circle @elseif($msg == 'success') fa-check-circle @elseif($msg == 'warning') fa-exclamation-triangle @else fa-info-circle @endif"></i>
                    <span>{{ Session::get($msg) }}</span>
                    <span class="close-flash">&times;</span>
                </div>
            @endif
        @endforeach
    </div>
                
    @if ($errors->any())
        <div class="flash-messages">
            @foreach ($errors->all() as $error)
                <div class="flash-message error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $error }}</span>
                    <span class="close-flash">&times;</span>
                </div>
            @endforeach
        </div>
    @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{asset('js/adminLayout.js')}}"></script>

    @yield('scripts')
</body>
</html>
@else
    <script>
        window.location.href = "{{ route('valider.compte') }}";
    </script>
@endif
@elseif(auth()->user()->role == 'utilisateur')
    <script>
        window.location.href = "{{ route('dashboard.utilisateur') }}";
    </script>
@elseif(auth()->user()->role == 'agent')
    <script>
        window.location.href = "{{ route('dashboard.agent') }}";
    </script>
@else
    <script>
        window.location.href = "{{ route('error.403') }}";
    </script>
@endif
@else
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endif