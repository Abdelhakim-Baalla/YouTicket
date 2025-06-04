@extends('layouts.admin')

@section('title', 'Modifier Utilisateur - YouTicket')

@section('page-title', 'Modifier Utilisateur')

@section('content')
<div class="container mx-auto px-4 py-6 fade-in">
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-500 px-6 py-4 rounded-t-lg">
        <h3 class="text-lg font-medium text-white flex items-center">
            <i class="fas fa-user-edit mr-2"></i>
            Modifier l'utilisateur
        </h3>
    </div>
    <form id="editUserForm" method="POST" action="{{route('dashboard.admin.utilisateurs.edit.submit')}}" enctype="multipart/form-data" class="px-6 py-4 space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-300 mb-2">Nom</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom', $utilisateur->nom ?? '') }}" required 
                       class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-300 mb-2">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $utilisateur->prenom ?? '') }}" required 
                       class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="poste" class="block text-sm font-medium text-gray-300 mb-2">Poste</label>
                <input type="text" id="poste" name="poste" value="{{ old('poste', $utilisateur->poste ?? '') }}" required 
                       class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="equipe" class="block text-sm font-medium text-gray-300 mb-2">Equipe</label>
                <select name="equipe_id" id="" class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
                    @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}" {{ (old('equipe_id', $utilisateur->equipe_id ?? '') == $equipe->nom) ? 'selected' : '' }}>
                        {{ $equipe->nom }}
                    </option>
                @endforeach
                </select>
                
                
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $utilisateur->email ?? '') }}" required 
                       class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="telephone" class="block text-sm font-medium text-gray-300 mb-2">Téléphone</label>
                <input type="text" id="telephone" name="telephone" value="{{ old('telephone', $utilisateur->telephone ?? '') }}"
                       class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="departement" class="block text-sm font-medium text-gray-300 mb-2">Département</label>
                <select id="departement" name="departement" 
                        class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Sélectionner un département</option>
                    <option value="it" {{ (old('departement', $utilisateur->departement ?? '') == 'it') ? 'selected' : '' }}>IT</option>
                    <option value="accounting" {{ (old('departement', $utilisateur->departement ?? '') == 'accounting') ? 'selected' : '' }}>Comptabilité</option>
                    <option value="hr" {{ (old('departement', $utilisateur->departement ?? '') == 'hr') ? 'selected' : '' }}>Ressources Humaines</option>
                    <option value="marketing" {{ (old('departement', $utilisateur->departement ?? '') == 'marketing') ? 'selected' : '' }}>Marketing</option>
                    <option value="sales" {{ (old('departement', $utilisateur->departement ?? '') == 'sales') ? 'selected' : '' }}>Ventes</option>
                    <option value="management" {{ (old('departement', $utilisateur->departement ?? '') == 'management') ? 'selected' : '' }}>Direction</option>
                </select>
            </div>
            <div>
                <label for="role" class="block text-sm font-medium text-gray-300 mb-2">Rôle</label>
                 
                <select id="role" name="role_id" 
                        class="w-full px-4 py-2 rounded-md border border-gray-700 bg-gray-700 text-white focus:border-indigo-500 focus:ring-indigo-500">
                    @foreach($roles as $role)
                    
                        <option value="{{ $role->id }}" {{ (old('role->nom', $utilisateur->role_id ?? '') == $role->nom) ? 'selected' : '' }}>
                            {{ $role->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-300 mb-3">Photo de profil</label>
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0 h-16 w-16 rounded-full bg-gray-700 flex items-center justify-center text-gray-400 overflow-hidden">
                    @if(!empty($utilisateur->photo))
                        <img src="{{ asset('storage/' . $utilisateur->photo) }}" alt="Photo de profil" class="h-16 w-16 rounded-full object-cover">
                    @else
                        <i class="fas fa-user text-xl"></i>
                    @endif
                </div>
                <div>
                    <label for="photo" class="cursor-pointer inline-block rounded-md border border-gray-700 bg-gray-700 py-2 px-4 text-sm font-medium text-gray-300 hover:bg-gray-600 transition">
                        Changer l'image
                        <input id="photo" name="photo" type="file" class="sr-only">
                    </label>
                    <p class="mt-1 text-xs text-gray-400">PNG, JPG, GIF jusqu'à 2MB</p>
                </div>
            </div>
        </div>
        <div class="flex items-center mt-6">
            <label for="actif" class="block text-sm text-gray-300 mr-4">Compte actif</label>
            <div class="flex items-center space-x-4">
            <label class="inline-flex items-center">
                <input type="radio" id="oui" name="actif" value="1" {{ (old('actif', $utilisateur->actif ?? 1) == 1) ? 'checked' : '' }}
                class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-700 rounded bg-gray-700">
                <span class="ml-2 text-gray-300">Oui</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" id="non" name="actif" value="0" {{ (old('actif', $utilisateur->actif ?? 1) == 0) ? 'checked' : '' }}
                class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-700 rounded bg-gray-700">
                <span class="ml-2 text-gray-300">Non</span>
            </label>
            </div>
        </div>
        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-700 mt-6">
            <a href="{{ route('dashboard.admin.utilisateurs') }}" 
               class="px-5 py-2.5 rounded-lg border border-gray-700 bg-gray-700 text-gray-300 hover:bg-gray-600 transition">
                Annuler
            </a>
            <input type="hidden" name="utilisateur_id" value="{{ $utilisateur->id ?? '' }}">
            <button type="submit" 
                    class="px-5 py-2.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition flex items-center">
                <i class="fas fa-save mr-2"></i>
                Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
