@extends('layouts.app')

@section('title', 'Détails du Juge')

@section('content')
<div class="container mt-4">
    <h1>Détails du Juge</h1>
    <div class="card">
        <div class="card-header">
            {{ $juge->nom }} {{ $juge->prenom }}
        </div>
        <div class="card-body">
            <p><strong>Date de Naissance :</strong> {{ $juge->date_naissance }}</p>
            <p><strong>Catégorie :</strong> {{ $juge->categorie }}</p>
            <p><strong>Discipline :</strong> {{ $juge->discipline }}</p>
            @if($juge->photo_profil)
                <p>
                    <strong>Photo :</strong><br>
                    <img src="{{ asset('storage/' . $juge->photo_profil) }}" alt="Photo de {{ $juge->nom }}" width="150">
                </p>
            @endif
        </div>
    </div>
    <a href="{{ route('juges.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    <a href="{{ route('juges.edit', $juge->id) }}" class="btn btn-primary mt-3">Modifier</a>
</div>
@endsection
