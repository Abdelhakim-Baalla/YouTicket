@extends('layouts.admin')

@section('title', 'Détail de l\'équipe - YouTicket')
@section('page-title', 'Détail de l\'équipe')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <i class="fas fa-people-group"></i> Détail de l'équipe
        </div>
        <a href="{{ route('dashboard.admin.equipes') }}" class="btn btn-secondary">Retour</a>
    </div>
    <div class="card-body">
        <h3>{{ $equipe->nom }}</h3>
        <p><strong>Description :</strong> {{ $equipe->description }}</p>
        <p><strong>Statut :</strong> 
            @if($equipe->active)
                <span class="badge bg-success">Active</span>
            @else
                <span class="badge bg-danger">Inactive</span>
            @endif
        </p>
        <h4>Membres de l'équipe :</h4>
        <ul>
            @forelse($equipe->utilisateurs as $user)
                <li>{{ $user->prenom }} {{ $user->nom }} ({{ $user->email }})</li>
            @empty
                <li>Aucun membre dans cette équipe.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
