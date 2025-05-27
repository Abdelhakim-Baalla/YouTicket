@extends('layouts.auth')

@section('content')
    <h2 class="text-2xl font-bold text-center mb-6">Réinitialiser le mot de passe</h2>
    
    <p class="text-gray-600 text-center mb-6">
        Entrez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.
    </p>
    
    <form>
        <div class="mb-6">
            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Adresse Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                </div>
                <input type="email" id="email" name="email" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="votre@email.com">
            </div>
        </div>
        
        <div class="mb-6">
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Envoyer le lien de réinitialisation
            </button>
        </div>
        
        <div class="text-center">
            <p class="text-sm text-gray-600">
                <a href="/login" class="font-medium text-blue-600 hover:underline">
                    <i class="fas fa-arrow-left mr-1"></i> Retour à la connexion
                </a>
            </p>
        </div>
    </form>
@endsection
