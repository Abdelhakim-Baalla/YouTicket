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
    <link rel="stylesheet" href="{{asset('css/authLayout.css')}}">
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
                        <form method="GET" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class=" text-red-400 btn btn-primary text-sm">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Déconnexion</span>
                                </button>
                        </form>
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

    <script src="{{asset('js/authLayout.js')}}"></script>

    @yield('scripts')
</body>
</html>