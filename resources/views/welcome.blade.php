@extends('layouts.app')

@section('title', 'YouTicket - Système de Gestion de Tickets Moderne')

@section('content')
<!-- Hero Section -->
<section class="min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="fade-in">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                <span class="bg-gradient-to-r from-primary-400 to-secondary-400 bg-clip-text text-transparent">
                    Révolutionnez
                </span>
                <br>
                votre support client
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
                Une plateforme moderne et intuitive pour optimiser votre support client et transformer chaque interaction en opportunité de croissance.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="btn btn-primary text-lg px-8 py-4">
                    <i class="fas fa-rocket"></i>
                    Commencer gratuitement
                </a>
                <a href="#features" class="btn btn-secondary text-lg px-8 py-4">
                    <i class="fas fa-play"></i>
                    Voir la démo
                </a>
            </div>
        </div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-primary bg-opacity-20 rounded-full animate-float"></div>
    <div class="absolute top-40 right-20 w-16 h-16 bg-secondary bg-opacity-20 rounded-full animate-float" style="animation-delay: -2s;"></div>
    <div class="absolute bottom-40 left-20 w-12 h-12 bg-accent bg-opacity-20 rounded-full animate-float" style="animation-delay: -4s;"></div>
</section>

<!-- Features Section -->
<section id="features" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-4">Fonctionnalités puissantes</h2>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                Découvrez tous les outils dont vous avez besoin pour offrir un support client exceptionnel
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="card hover:transform hover:scale-105 transition-all duration-300">
                <div class="card-body text-center">
                    <div class="w-16 h-16 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bolt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Rapide et efficace</h3>
                    <p class="text-gray-400">
                        Interface intuitive et réactive pour une gestion optimale de vos tickets de support
                    </p>
                </div>
            </div>
            
            <div class="card hover:transform hover:scale-105 transition-all duration-300">
                <div class="card-body text-center">
                    <div class="w-16 h-16 bg-gradient-accent rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Analytics avancées</h3>
                    <p class="text-gray-400">
                        Tableaux de bord détaillés et rapports en temps réel pour optimiser vos performances
                    </p>
                </div>
            </div>
            
            <div class="card hover:transform hover:scale-105 transition-all duration-300">
                <div class="card-body text-center">
                    <div class="w-16 h-16 bg-gradient-success rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Collaboration d'équipe</h3>
                    <p class="text-gray-400">
                        Travaillez ensemble efficacement avec des outils de collaboration intégrés
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-primary-600 to-secondary-600">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-white mb-4">
            Prêt à transformer votre support client ?
        </h2>
        <p class="text-xl text-white text-opacity-90 mb-8">
            Rejoignez des milliers d'entreprises qui font confiance à YouTicket
        </p>
        <a href="{{ route('register') }}" class="btn btn-secondary text-lg px-8 py-4">
            <i class="fas fa-arrow-right"></i>
            Commencer maintenant
        </a>
    </div>
</section>
@endsection

@section('styles')
<style>
.animate-float {
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

.bg-gradient-primary {
    background: var(--gradient-primary);
}

.bg-gradient-accent {
    background: var(--gradient-accent);
}

.bg-gradient-success {
    background: var(--gradient-success);
}
</style>
@endsection
