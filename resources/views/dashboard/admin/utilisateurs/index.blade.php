@extends('layouts.admin')

@section('title', 'Gestion des Utilisateurs - YouTicket')

@section('page-title', 'Gestion des Utilisateurs')

@section('content')
<div class="container mx-auto px-4 py-6 fade-in">
    <!-- Search Form -->
    <div class="mb-6 flex justify-end">
        <form method="GET" action="{{route('dashboard.admin.utilisateurs')}}" class="flex space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Rechercher un utilisateur..." 
                class="px-4 py-2 rounded-lg bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
            <button 
                type="submit" 
                class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition"
            >
                <i class="fas fa-search mr-1"></i> Rechercher
            </button>
        </form>
    </div>
    <!-- Users Table Card -->
    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 overflow-hidden">
        <!-- Card Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-indigo-500 px-6 py-4 border-b border-gray-700 flex items-center justify-between">
            <h2 class="text-xl font-bold text-white flex items-center">
                <div class="w-8 h-8 rounded-lg bg-indigo-500 flex items-center justify-center mr-3">
                    <i class="fas fa-users text-white"></i>
                </div>
                Liste des Utilisateurs
            </h2>
            <a href="/admin/utilisateurs/cree" class="bg-white text-indigo-600 hover:bg-gray-100 px-4 py-2 rounded-lg font-medium transition duration-200 flex items-center">
                <i class="fas fa-user-plus mr-2"></i>
                Nouvel Utilisateur
            </a>
        </div>

        <!-- Card Body -->
        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-300 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-300 uppercase tracking-wider">Nom Complet</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-300 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-300 uppercase tracking-wider">telephone</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-300 uppercase tracking-wider">Département</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-300 uppercase tracking-wider">Poste</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-300 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-300 uppercase tracking-wider">Equipe</th>
                            <th class="px-6 py-4 text-right text-sm font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @if($utilisateurs->isEmpty())
                        <tr>
                            <td colspan="9" class="px-6 py-5 text-center text-gray-400">
                                Aucun utilisateur trouvé.
                            </td>
                        </tr>
                        @else
                        @foreach($utilisateurs as $utilisateur)
                        <tr class="hover:bg-gray-750 transition-colors duration-150">
                            <td class="px-6 py-5 whitespace-nowrap text-sm font-medium text-gray-300">{{$utilisateur->id}}</td>
                            <td class="px-6 py-5 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-medium">
                                        @if($utilisateur->photo)
                                        <img src="{{asset('storage/' . $utilisateur->photo)}}" alt="Photo de {{ $utilisateur->prenom }} {{$utilisateur->nom}}" class="rounded-full w-10 h-10 object-cover">
                                        @else
                                        {{ substr($utilisateur->prenom, 0, 1) . substr($utilisateur->nom, 0, 1) }}
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-white ml-2">{{ $utilisateur->prenom }} {{$utilisateur->nom}}</div>
                                        <div class="text-sm text-gray-400">{{ $utilisateur->role_id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-300">{{$utilisateur->email}}</td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-300">{{$utilisateur->telephone}}</td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-300">{{$utilisateur->poste}}</td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-300">{{ strtoupper($utilisateur->departement) }}</td>
                            <td class="px-6 py-5 whitespace-nowrap">
                                @if($utilisateur->actif)
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200">
                                    Actif
                                </span>
                                @else
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900 text-red-200">
                                    Inactif
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-300">{{$utilisateur->equipe_id}}</td>
                            <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-3">
                                    <a href="/admin/utilisateurs/modifier" class="text-indigo-400 hover:text-indigo-300 p-2 rounded-full hover:bg-gray-700 transition" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="openDeleteUserModal(1)" class="text-red-400 hover:text-red-300 p-2 rounded-full hover:bg-gray-700 transition" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table> 
            </div>
            
        </div>

        <!-- Card Footer -->
        <div class="bg-gray-900 px-6 py-4 border-t border-gray-700">
            <div class="flex items-center justify-between">
            <div></div>
            <div class="flex-1 flex justify-end">
                {{ $utilisateurs->appends(['search' => request('search')])->links() }}
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete User Modal -->
<div id="deleteUserModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        
        <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-gradient-to-r from-red-600 to-red-500 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-white">
                        <i class="fas fa-trash mr-2"></i>
                        Supprimer l'utilisateur
                    </h3>
                    <button type="button" class="text-white hover:text-gray-200" onclick="closeModal('deleteUserModal')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <form id="deleteUserForm" method="POST" action="" class="px-6 py-4">
                @csrf
                @method('DELETE')
                <div class="space-y-4">
                    <p class="text-gray-300">Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.</p>
                    <div class="bg-gray-750 p-4 rounded-lg">
                        <p class="font-medium text-white">Nom: <span id="userToDeleteName" class="text-gray-300">Hassan Bolab</span></p>
                        <p class="font-medium text-white mt-2">Email: <span id="userToDeleteEmail" class="text-gray-300">ahassan.bolab@gmail.com</span></p>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-700 mt-6">
                    <button type="button" onclick="closeModal('deleteUserModal')" 
                            class="px-5 py-2.5 rounded-lg border border-gray-700 bg-gray-700 text-gray-300 hover:bg-gray-600 transition">
                        Annuler
                    </button>
                    <button type="submit" 
                            class="px-5 py-2.5 rounded-lg bg-red-600 text-white hover:bg-red-700 transition flex items-center">
                        <i class="fas fa-trash mr-2"></i>
                        Confirmer la suppression
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .fade-in {
        animation: fadeIn 0.3s ease-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }
    
    th, td {
        padding: 1rem 1.5rem;
        text-align: left;
        border-bottom: 1px solid #2d3748;
    }
    
    th {
        background-color: #1a202c;
        color: #a0aec0;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    tr:hover {
        background-color: rgba(255, 255, 255, 0.03);
    }
    
</style>
@endsection