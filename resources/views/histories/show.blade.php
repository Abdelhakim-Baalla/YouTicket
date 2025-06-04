@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de l'action</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $history->description }}</h5>
            <p class="card-text">
                <strong>Utilisateur:</strong> {{ $history->user->nom ?? 'System' }}<br>
                <strong>Date:</strong> {{ $history->created_at->format('d/m/Y H:i') }}<br>
                <strong>IP:</strong> {{ $history->ip_address }}<br>
                <strong>User Agent:</strong> {{ $history->user_agent }}
            </p>
        </div>
    </div>

    @if($history->old_values || $history->new_values)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Changements</h5>
            
            @if($history->old_values)
            <div class="mb-4">
                <h6>Anciennes valeurs</h6>
                <pre>{{ json_encode($history->old_values, JSON_PRETTY_PRINT) }}</pre>
            </div>
            @endif
            
            @if($history->new_values)
            <div>
                <h6>Nouvelles valeurs</h6>
                <pre>{{ json_encode($history->new_values, JSON_PRETTY_PRINT) }}</pre>
            </div>
            @endif
        </div>
    </div>
    @endif
</div>
@endsection