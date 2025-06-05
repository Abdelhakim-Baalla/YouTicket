@if(Auth::check())
@if(auth()->user()->actif == 1)
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('images/YouTicketLogo.png')}}" type="image/x-icon">
    <title>@yield('title', 'YouTicket - Système de Gestion de Tickets')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        :root {
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
            --surface: #1e293b;
            --surface-light: #334155;
            --gradient-primary: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            --gradient-accent: linear-gradient(135deg, #f59e0b 0%, #ef4444 100%);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
            --shadow-lg: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            --glow: 0 0 20px rgba(99, 102, 241, 0.3);
        }

        /* Flash Messages */
        .flash-messages {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1000;
            max-width: 400px;
            width: 100%;
        }

        .flash-message {
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: var(--shadow-lg);
            animation: slideIn 0.3s ease-out forwards;
            transform: translateX(120%);
            opacity: 0;
            position: relative;
            overflow: hidden;
        }

        .flash-message::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
        }

        .flash-message.success {
            background: rgba(5, 150, 105, 0.2);
            border: 1px solid rgba(5, 150, 105, 0.3);
            color: #d1fae5;
        }

        .flash-message.success::after {
            background: var(--success);
        }

        .flash-message.error {
            background: rgba(220, 38, 38, 0.2);
            border: 1px solid rgba(220, 38, 38, 0.3);
            color: #fee2e2;
        }

        .flash-message.error::after {
            background: var(--warning);
        }

        .flash-message.warning {
            background: rgba(245, 158, 11, 0.2);
            border: 1px solid rgba(245, 158, 11, 0.3);
            color: #fef3c7;
        }

        .flash-message.warning::after {
            background: var(--accent);
        }

        .flash-message.info {
            background: rgba(59, 130, 246, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.3);
            color: #dbeafe;
        }

        .flash-message.info::after {
            background: #3b82f6;
        }

        .flash-message i {
            font-size: 1.25rem;
        }

        .flash-message .close-flash {
            margin-left: auto;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        .flash-message .close-flash:hover {
            opacity: 1;
        }

        @keyframes slideIn {
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            to {
                transform: translateX(120%);
                opacity: 0;
            }
        }

        .flash-message.slide-out {
            animation: slideOut 0.3s ease-in forwards;
        }

        @media (max-width: 768px) {
            .flash-messages {
                top: 70px;
                left: 20px;
                right: 20px;
                max-width: none;
            }
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
            padding-top: 0;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

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

        /* Header Styles */
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-left: 15px;
        }

        .navbar-logo {
            width: 24px;
            height: 24px;
            object-fit: contain;
            border-radius: 6px;
        }

        .navbar-brand-name {
            font-size: 1rem;
            font-weight: 600;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-right: 15px;
        }

        .auth-buttons .btn {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        /* Mobile Menu */
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        #mobile-menu.show {
            max-height: 500px;
            padding: 0.5rem 0;
        }

        .mobile-auth-buttons {
            display: none;
            /* flex-direction: column;
             */
             flex-wrap: wrap;
            gap: 0.5rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .mobile-auth-buttons .btn {
            width: 350px;
            text-align: center;
        }

        /* Auth Container */
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        .auth-wrapper {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 4rem;
            max-width: 1200px;
            width: 100%;
            align-items: center;
        }

        .auth-brand {
            text-align: left;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-primary);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            position: relative;
        }

        .logo-icon::after {
            content: '';
            position: absolute;
            inset: -2px;
            background: var(--gradient-primary);
            border-radius: 18px;
            z-index: -1;
            opacity: 0.3;
            filter: blur(8px);
        }

        .brand-name {
            font-size: 2rem;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-tagline {
            font-size: 3rem;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--text-primary) 0%, var(--text-secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-description {
            font-size: 1.1rem;
            color: var(--text-secondary);
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        .brand-features {
            display: flex;
            gap: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .feature-icon {
            width: 20px;
            height: 20px;
            background: var(--gradient-accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            color: white;
        }

        .auth-card {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.5rem;
            position: relative;
            box-shadow: var(--shadow-lg);
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--gradient-primary);
            border-radius: 24px 24px 0 0;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-title {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .auth-subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.9rem;
        }

        .input-wrapper {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--text-primary);
            font-size: 0.95rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: var(--glow);
            background: var(--dark-lighter);
        }

        .form-control.error {
            border-color: var(--warning);
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.3);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.9rem;
            z-index: 1;
        }

        .error-message {
            color: var(--warning);
            font-size: 0.8rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            gap: 0.75rem;
            position: relative;
            overflow: hidden;
            font-family: inherit;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
            box-shadow: var(--shadow);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg), var(--glow);
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.5rem 0;
        }

        .checkbox {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .checkbox-label {
            color: var(--text-secondary);
            font-size: 0.9rem;
            cursor: pointer;
        }

        .auth-link {
            color: var(--primary-light);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .auth-link:hover {
            color: var(--primary);
            text-decoration: underline;
        }

        .auth-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border);
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: var(--gradient-primary);
            opacity: 0.1;
            animation: float 20s infinite linear;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 15%;
            animation-delay: -7s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: -14s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            33% {
                transform: translateY(-30px) rotate(120deg);
            }
            66% {
                transform: translateY(30px) rotate(240deg);
            }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Footer */
        footer {
            background: rgba(15, 15, 35, 0.95);
            backdrop-filter: blur(20px);
            border-top: 1px solid var(--border);
            margin-top: 5rem;
            position: relative;
            z-index: 10;
        }

        .footer-container {
            max-width: 80rem;
            margin-left: auto;
            margin-right: auto;
            padding: 3rem 1rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 2rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .footer-logo-img {
            width: 32px;
            height: 32px;
            object-fit: contain;
            border-radius: 8px;
        }

        .footer-logo-text {
            font-size: 1.25rem;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-description {
            color: var(--text-secondary);
            margin-bottom: 1rem;
            font-size: 0.875rem;
            max-width: 28rem;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
        }

        .footer-social-link {
            color: var(--text-secondary);
            transition: color 0.3s ease;
        }

        .footer-social-link:hover {
            color: var(--text-primary);
        }

        .footer-title {
            color: var(--text-primary);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .footer-link {
            color: var(--text-secondary);
            font-size: 0.75rem;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--text-primary);
        }

        .footer-bottom {
            border-top: 1px solid var(--border);
            padding-top: 2rem;
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            gap: 0.5rem;
        }

        .footer-copyright {
            color: var(--text-secondary);
            font-size: 0.75rem;
        }

        .footer-made-with {
            color: var(--text-secondary);
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .footer-heart {
            color: #ef4444;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .auth-wrapper {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
                padding-top: 2rem;
            }
            
            .auth-brand {
                text-align: center;
            }
            
            .brand-tagline {
                font-size: 2rem;
            }
            
            .brand-features {
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .auth-card {
                padding: 1.5rem;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }

            .brand-description {
                font-size: 1rem;
            }

            .mobile-auth-buttons {
                display: flex;
            }

            .auth-buttons {
                display: none;
            }
        }

        @media (min-width: 768px) {
            .footer-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .footer-col-wide {
                grid-column: span 2 / span 2;
            }

            .footer-bottom {
                flex-direction: row;
            }
        }

        @media (min-width: 1024px) {
            .footer-container {
                padding: 3rem 2rem;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
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
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Navigation -->
    <nav class="top-0 left-0 right-0 z-50 bg-dark-900 bg-opacity-90 backdrop-filter backdrop-blur-lg border-b border-gray-800">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="navbar-brand ">
                    <img src="{{asset('images/YouTicketLogo.jpg')}}" alt="Logo YouTicket" class="navbar-logo">
                    <span class="navbar-brand-name">YouTicket</span>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-6 gap-4">
                    <a href="#features" class="text-gray-300 hover:text-white transition-colors text-sm">Fonctionnalités</a>
                    <a href="#pricing" class="text-gray-300 hover:text-white transition-colors text-sm">Tarifs</a>
                    <a href="#about" class="text-gray-300 hover:text-white transition-colors text-sm">À propos</a>
                    <a href="#contact" class="text-gray-300 hover:text-white transition-colors text-sm">Contact</a>
                </div>

                <!-- Auth Links -->
                <div class="auth-buttons">
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors text-sm">
                            Se connecter
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-primary text-sm">
                            S'inscrire
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn btn-primary text-sm">
                            <i class="fas fa-tachometer-alt mr-2"></i>
                            Dashboard
                        </a>
                    @endguest
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="mobile-menu-btn" id="mobile-menu-btn">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden" id="mobile-menu">
            <div class="px-2 pb-3 space-y-2 bg-dark-900 border-t border-gray-800">
                <a href="#features" class="block px-3 py-2 text-gray-300 hover:text-white transition-colors">Fonctionnalités</a>
                <a href="#pricing" class="block px-3 py-2 text-gray-300 hover:text-white transition-colors">Tarifs</a>
                <a href="#about" class="block px-3 py-2 text-gray-300 hover:text-white transition-colors">À propos</a>
                <a href="#contact" class="block px-3 py-2 text-gray-300 hover:text-white transition-colors">Contact</a>
                
                <div class="mobile-auth-buttons">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary text-sm">
                            Se connecter
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-primary text-sm">
                            S'inscrire
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn btn-primary text-sm">
                            <i class="fas fa-tachometer-alt mr-2"></i>
                            Dashboard
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16 min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Company Info -->
                <div class="footer-col-wide">
                    <div class="footer-logo">
                        <img src="{{asset('images/YouTicketLogo.jpg')}}" alt="Logo YouTicket" class="footer-logo-img">
                        <span class="footer-logo-text">YouTicket</span>
                    </div>
                    <p class="footer-description">
                        La solution moderne et intuitive pour optimiser votre support client et transformer chaque interaction en opportunité de croissance.
                    </p>
                    <div class="footer-social">
                        <a href="#" class="footer-social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="footer-social-link">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="footer-social-link">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="footer-social-link">
                            <i class="fab fa-discord"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="footer-title">Liens rapides</h3>
                    <div class="footer-links">
                        <a href="#features" class="footer-link">Fonctionnalités</a>
                        <a href="#pricing" class="footer-link">Tarifs</a>
                        <a href="#" class="footer-link">Documentation</a>
                        <a href="#" class="footer-link">API</a>
                        <a href="#" class="footer-link">Support</a>
                    </div>
                </div>

                <!-- Legal -->
                <div>
                    <h3 class="footer-title">Légal</h3>
                    <div class="footer-links">
                        <a href="#" class="footer-link">Conditions d'utilisation</a>
                        <a href="#" class="footer-link">Politique de confidentialité</a>
                        <a href="#" class="footer-link">Cookies</a>
                        <a href="#" class="footer-link">RGPD</a>
                        <a href="#contact" class="footer-link">Contact</a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="footer-copyright">
                    © {{ date('Y') }} YouTicket. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('show');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Flash messages handling
    document.addEventListener('DOMContentLoaded', function() {
        const flashMessages = document.querySelectorAll('.flash-message');

        flashMessages.forEach(message => {
            // Auto-remove after 5 seconds
            setTimeout(() => {
                message.classList.add('slide-out');
                setTimeout(() => message.remove(), 300);
            }, 5000);

            // Close button functionality
            const closeBtn = message.querySelector('.close-flash');
            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    message.classList.add('slide-out');
                    setTimeout(() => message.remove(), 300);
                });
            }
        });
    });
    </script>

    @yield('scripts')
</body>
</html>
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