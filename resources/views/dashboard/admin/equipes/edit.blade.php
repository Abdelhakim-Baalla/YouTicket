@extends('layouts.admin')

@section('title', 'Modifier l\'équipe - YouTicket')
@section('page-title', 'Modifier l\'équipe')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <i class="fas fa-people-group"></i> Modifier l'équipe
        </div>
        <a href="{{ route('dashboard.admin.equipes') }}" class="btn btn-secondary">Retour</a>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard.admin.equipes.update', $equipe->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de l'équipe</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $equipe->nom) }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $equipe->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="active" class="form-label">Statut</label>
                <select name="active" id="active" class="form-control">
                    <option value="1" @if($equipe->active) selected @endif>Active</option>
                    <option value="0" @if(!$equipe->active) selected @endif>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
@endsection
