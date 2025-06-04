@extends('layouts.admin')

@section('title', 'Gestion des Utilisateurs - YouTicket')

@section('page-title', 'Crée Utilisateurs')

@section('content')

<div class="container mx-auto px-4 py-6 fade-in">
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-500 px-6 py-4 rounded-t-lg">
        <h3 class="text-lg font-medium text-white flex items-center">
            <i class="fas fa-user-plus mr-2"></i>
            Créer un nouvel utilisateur
        </h3>
    </div>
    <form id="createUserForm" method="POST" action="{{route('dashboard.admin.utilisateurs.create.submit')}}" enctype="multipart/form-data" class="px-6 py-4 space-y-6">
        @csrf
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-300 mb-2">Nom</label>
                <input type="text" id="nom" name="nom" required 
                       class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-300 mb-2">Prénom</label>
                <input type="text" id="prenom" name="prenom" required 
                       class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                <input type="email" id="email" name="email" required 
                       class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="telephone" class="block text-sm font-medium text-gray-300 mb-2">Téléphone</label>
                <input type="text" id="telephone" name="telephone" 
                       class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Mot de passe</label>
                <input type="password" id="password" name="password" required 
                       class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirmation</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required 
                       class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="poste" class="block text-sm font-medium text-gray-300 mb-2">Poste</label>
                <input type="text" id="poste" name="poste" 
                       class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="departement" class="block text-sm font-medium text-gray-300 mb-2">Département</label>
                <select id="departement" name="departement" 
                        class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Sélectionner un département</option>
                    <option value="it">IT</option>
                    <option value="accounting">Comptabilité</option>
                    <option value="hr">Ressources Humaines</option>
                    <option value="marketing">Marketing</option>
                    <option value="sales">Ventes</option>
                    <option value="management">Direction</option>
                </select>
            </div>
            <div>
                <label for="role" class="block text-sm font-medium text-gray-300 mb-2">Rôle</label>
                <select id="role" name="role" 
                        class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="admin">Administrateur</option>
                    <option value="agent">Agent</option>
                    <option value="utilisateur" selected>Utilisateur</option>
                </select>
            </div>
        </div>
        <div class="mt-4">
            <div class="flex items-center space-x-4 gap-4 ">
                <label class="block text-sm font-medium text-gray-300 mb-3">Photo de profil</label>
                <div>
                    <label for="photo" class="cursor-pointer inline-block rounded-md border border-gray-700 bg-gray-700 py-2 px-4 text-sm font-medium text-gray-300 hover:bg-gray-600 transition">
                        Choisir une image
                        <input id="photo" name="photo" type="file" class="sr-only">
                    </label>
                </div>
            </div>
        </div>
        <div class="flex items-center mt-6">
            <label for="actif" class="block text-sm text-gray-300 mr-4">Compte actif</label>
            <div class="flex items-center space-x-4">
            <label class="inline-flex items-center">
                <input type="radio" id="oui" name="actif" value="1" checked
                class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-700 rounded bg-gray-700">
                <span class="ml-2 text-gray-300">Oui</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" id="non" name="actif" value="0" 
                class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-700 rounded bg-gray-700">
                <span class="ml-2 text-gray-300">Non</span>
            </label>
            </div>
        </div>
        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-700 mt-6">
            <button type="reset" 
                    class="px-5 py-2.5 rounded-lg border border-gray-700 bg-gray-700 text-gray-300 hover:bg-gray-600 transition">
                Annuler
            </button>
            <button type="submit" 
                    class="px-5 py-2.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition flex items-center">
                <i class="fas fa-save mr-2"></i>
                Enregistrer
            </button>
        </div>
    </form>
</div>

@endsection