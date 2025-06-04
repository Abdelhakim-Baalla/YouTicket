@extends('layouts.app')
@section('title', 'Erreur 404 - Page non trouvée')
@section('content')
<div class="container text-center mt-5">
    <h1 class="display-1">404</h1>
    <h2>Page non trouvée</h2>
    <p>Désolé, la page que vous recherchez n'existe pas ou a été déplacée.</p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Retour à l'accueil</a>
</div>
@endsection
