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
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        :root {
            /* Palette de couleurs utilisateur - Bleu/Turquoise */
            --primary: #0891b2;
            --primary-light: #22d3ee;
            --primary-dark: #0e7490;
            --accent: #0ea5e9;
            --accent-light: #38bdf8;
            --accent-dark: #0284c7;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
            
            /* Couleurs de fond et texte */
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --bg-tertiary: #334155;
            --text-primary: #f8fafc;
            --text-secondary: #cbd5e1;
            --text-muted: #64748b;
            --border: rgba(148, 163, 184, 0.2);
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            
            /* Gradients */
            --gradient-primary: linear-gradient(135deg, #0891b2 0%, #22d3ee 100%);
            --gradient-accent: linear-gradient(135deg, #0ea5e9 0%, #38bdf8 100%);
            --gradient-success: linear-gradient(135deg, #059669 0%, #10b981 100%);
            --gradient-warning: linear-gradient(135deg, #d97706 0%, #f59e0b 100%);
            --gradient-danger: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-image: 
                radial-gradient(circle at 15% 50%, rgba(8, 145, 178, 0.1) 0%, transparent 25%),
                radial-gradient(circle at 85% 30%, rgba(14, 165, 233, 0.1) 0%, transparent 25%);
            background-attachment: fixed;
        }
        
        /* Layout */
        .app-container {
            display: flex;
            flex: 1;
        }
        
        .sidebar {
            width: 260px;
            background: rgba(15, 23, 42, 0.95);
            border-right: 1px solid var(--border);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-header {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border);
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: var(--text-primary);
        }
        
        .logo-icon {
            width: 40px;
            height: 40px;
            background: var(--gradient-primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
        
        .logo-text {
            font-size: 1.25rem;
            font-weight: 700;
        }
        
        .sidebar-content {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem 0;
        }
        
        .sidebar-section {
            margin-bottom: 1.5rem;
            padding: 0 1.5rem;
        }
        
        .sidebar-section-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            margin-bottom: 0.75rem;
            padding-left: 0.5rem;
        }
        
        .nav-list {
            list-style: none;
        }
        
        .nav-item {
            margin-bottom: 0.25rem;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            color: var(--text-secondary);
            transition: all 0.2s ease;
        }
        
        .nav-link:hover {
            background: rgba(30, 41, 59, 0.7);
            color: var(--text-primary);
        }
        
        .nav-link.active {
            background: rgba(8, 145, 178, 0.15);
            color: var(--primary-light);
            font-weight: 500;
        }
        
        .nav-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .nav-badge {
            margin-left: auto;
            background: rgba(8, 145, 178, 0.2);
            color: var(--primary-light);
            padding: 0.25rem 0.5rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--border);
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .user-menu:hover {
            background: rgba(30, 41, 59, 0.7);
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1rem;
        }
        
        .user-info {
            flex: 1;
            min-width: 0;
        }
        
        .user-name {
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .user-role {
            font-size: 0.75rem;
            color: var(--text-muted);
        }
        
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 2rem;
            transition: all 0.3s ease;
        }
        
        .page-header {
            margin-bottom: 2rem;
        }
        
        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .page-subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }
        
        /* Responsive */
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-primary);
            cursor: pointer;
            font-size: 1.25rem;
        }
        
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar-toggle {
                display: block;
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 101;
                background: var(--bg-secondary);
                width: 40px;
                height: 40px;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }
        
        /* Utilitaires */
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Notifications */
        .notification-dropdown {
            position: relative;
        }
        
        .notification-icon {
            position: relative;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        
        .notification-icon:hover {
            background: rgba(30, 41, 59, 0.7);
        }
        
        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: var(--danger);
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
        
        .notification-menu {
            position: absolute;
            top: 100%;
            right: 0;
            width: 320px;
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: var(--shadow);
            z-index: 100;
            display: none;
        }
        
        .notification-menu.show {
            display: block;
        }
        
        .notification-header {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .notification-title {
            font-weight: 600;
        }
        
        .notification-list {
            max-height: 320px;
            overflow-y: auto;
        }
        
        .notification-item {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            gap: 0.75rem;
            transition: all 0.2s ease;
        }
        
        .notification-item:hover {
            background: rgba(30, 41, 59, 0.7);
        }
        
        .notification-item.unread {
            background: rgba(8, 145, 178, 0.1);
        }
        
        .notification-icon-wrapper {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }
        
        .notification-content {
            flex: 1;
            min-width: 0;
        }
        
        .notification-text {
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }
        
        .notification-time {
            font-size: 0.75rem;
            color: var(--text-muted);
        }
        
        .notification-footer {
            padding: 0.75rem;
            text-align: center;
            border-top: 1px solid var(--border);
        }
        
        .notification-footer a {
            color: var(--primary-light);
            text-decoration: none;
            font-size: 0.875rem;
        }
        
        .notification-footer a:hover {
            text-decoration: underline;
        }
    </style>
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
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="logo-text">YouTicket</div>
                </a>
                <div class="notification-dropdown">
                    <div class="notification-icon" id="notificationToggle">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
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
                                <span class="nav-badge">5</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->routeIs('user.tickets.create') ? 'active' : '' }}">
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
                        JD
                    </div>
                    <div class="user-info">
                        <div class="user-name">Jean Dupont</div>
                        <div class="user-role">Utilisateur</div>
                    </div>
                    <div>
                        <i class="fas fa-chevron-down text-text-muted"></i>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Contenu principal -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title">@yield('page-title', 'Tableau de bord')</h1>
                <p class="page-subtitle">@yield('page-subtitle', 'Bienvenue sur votre espace personnel')</p>
            </div>
            
            @yield('content')
        </main>
    </div>

    <script>
        // Gestion du sidebar sur mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });
        
        // Fermer le sidebar en cliquant à l'extérieur (sur mobile)
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            if (window.innerWidth <= 1024 && 
                !sidebar.contains(e.target) && 
                e.target !== sidebarToggle && 
                !sidebarToggle.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        });
        
        // Gestion des notifications
        document.getElementById('notificationToggle').addEventListener('click', function(e) {
            e.stopPropagation();
            document.getElementById('notificationMenu').classList.toggle('show');
        });
        
        // Fermer le menu de notifications en cliquant à l'extérieur
        document.addEventListener('click', function(e) {
            const notificationMenu = document.getElementById('notificationMenu');
            const notificationToggle = document.getElementById('notificationToggle');
            
            if (!notificationMenu.contains(e.target) && 
                e.target !== notificationToggle && 
                !notificationToggle.contains(e.target)) {
                notificationMenu.classList.remove('show');
            }
        });
        
        // Menu utilisateur (à implémenter si nécessaire)
        document.getElementById('userMenu').addEventListener('click', function() {
            // Afficher un menu déroulant ou rediriger vers la page de profil
            window.location.href = '{{ route("profile") }}';
        });
    </script>
    
    @yield('scripts')
</body>
</html>
@else
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endif
