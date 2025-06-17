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
    
    <link rel="stylesheet" href="{{asset('css/adminLayout.css')}}">
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