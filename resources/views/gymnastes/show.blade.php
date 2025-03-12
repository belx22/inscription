@extends('layouts.app')

@section('title', 'Détails du Gymnaste')

@section('content')
<div class="container mt-4">
    <h1>Détails du Gymnaste</h1>
    <div class="card">
        <div class="card-header">
            {{ $gymnaste->nom }} {{ $gymnaste->prenom }}
        </div>
        <div class="card-body">
            <p><strong>Date de Naissance :</strong> {{ $gymnaste->date_naissance }}</p>
            <p><strong>Lieu de Naissance :</strong> {{ $gymnaste->lieu_naissance }}</p>
            <p><strong>Club :</strong> {{ $gymnaste->club }}</p>
            <p><strong>Discipline :</strong> {{ $gymnaste->discipline }}</p>
            @if($gymnaste->photo_profil)
                <p>
                    <strong>Photo :</strong><br>
                    <img src="{{ asset('storage/' . $gymnaste->photo_profil) }}" alt="Photo de {{ $gymnaste->nom }}" width="150">
                </p>
            @endif
        </div>
    </div>
    <a href="{{ route('gymnastes.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    <a href="{{ route('gymnastes.edit', $gymnaste->id) }}" class="btn btn-primary mt-3">Modifier</a>
</div>
@endsection
