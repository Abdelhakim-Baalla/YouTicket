@extends('layouts.auth')

@section('content')
    <h2 class="text-2xl font-bold text-center mb-6">Créer un compte</h2>
    
    <form>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Nom complet</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-user text-gray-400"></i>
                </div>
                <input type="text" id="name" name="name" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="John Doe">
            </div>
        </div>
        
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Adresse Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                </div>
                <input type="email" id="email" name="email" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="votre@email.com">
            </div>
        </div>
        
        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Mot de passe</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                </div>
                <input type="password" id="password" name="password" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="••••••••">
            </div>
        </div>
        
        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Confirmer le mot de passe</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                </div>
                <input type="password" id="password_confirmation" name="password_confirmation" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="••••••••">
            </div>
        </div>
        
        <div class="mb-6">
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                S'inscrire
            </button>
        </div>
        
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Vous avez déjà un compte? 
                <a href="/login" class="font-medium text-blue-600 hover:underline">Se connecter</a>
            </p>
        </div>
    </form>
@endsection
