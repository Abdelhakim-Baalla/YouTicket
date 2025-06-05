@extends('layouts.app')
@section('title', 'Erreur 500 - Erreur interne du serveur')
@section('content')
<div class="container text-center mt-5">
    <h1 class="display-1">500</h1>
    <h2>Erreur interne du serveur</h2>
    <p>Une erreur inattendue s'est produite. Veuillez réessayer plus tard.</p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Retour à l'accueil</a>
</div>
@endsection
