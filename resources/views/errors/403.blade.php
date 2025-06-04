@extends('layouts.app')
@section('title', 'Erreur 403 - Accès refusé')
@section('content')
<div class="container text-center mt-5">
    <h1 class="display-1">403</h1>
    <h2>Accès refusé</h2>
    <p>Vous n'avez pas la permission d'accéder à cette page.</p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Retour à l'accueil</a>
</div>
@endsection
