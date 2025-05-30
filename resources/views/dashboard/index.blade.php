@if (Auth::check())

@extends('layouts.app')
    @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Bienvenue sur votre tableau de bord {{ auth()->user()->nom }}</h3>
                    </div>
                    <div class="card-body">
                        <p class="lead">Vous êtes connecté !</p>
                        <ul>
                            <li>Accédez à la gestion des tickets</li>
                            <li>Consultez vos notifications</li>
                            <li>Gérez votre profil</li>
                            <li>Et bien plus encore...</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@else
    <p>You are not logged in.</p>
@endif
