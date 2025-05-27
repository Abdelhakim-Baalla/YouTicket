@extends('layouts.auth')

@section('content')
    <h2 class="text-2xl font-bold text-center mb-6">Connexion</h2>
    
    <form>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Adresse Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                </div>
                <input type="email" id="email" name="email" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="votre@email.com">
            </div>
        </div>
        
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Mot de passe</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                </div>
                <input type="password" id="password" name="password" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="••••••••">
            </div>
        </div>
        
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-700">Se souvenir de moi</label>
            </div>
            <a href="/forgot-password" class="text-sm text-blue-600 hover:underline">Mot de passe oublié?</a>
        </div>
        
        <div class="mb-6">
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Se connecter
            </button>
        </div>
        
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Vous n'avez pas de compte? 
                <a href="/register" class="font-medium text-blue-600 hover:underline">S'inscrire</a>
            </p>
        </div>
    </form>
@endsection
