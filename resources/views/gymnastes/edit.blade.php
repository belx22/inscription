@extends('layouts.app')

@section('title', 'Modifier le Gymnaste')

@section('content')
<div class="container mt-4">
    <h1>Modifier le Gymnaste</h1>
    <form action="{{ route('gymnastes.update', $gymnaste->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $gymnaste->nom }}" required>
        </div>
        
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $gymnaste->prenom }}" required>
        </div>
        
        <div class="mb-3">
            <label for="date_naissance" class="form-label">Date de Naissance</label>
            <input type="date" name="date_naissance" id="date_naissance" class="form-control" value="{{ $gymnaste->date_naissance }}" required>
        </div>
        
        <div class="mb-3">
            <label for="lieu_naissance" class="form-label">Lieu de Naissance</label>
            <input type="text" name="lieu_naissance" id="lieu_naissance" class="form-control" value="{{ $gymnaste->lieu_naissance }}" required>
        </div>
        
        <div class="mb-3">
            <label for="club" class="form-label">Club</label>
            <input type="text" name="club" id="club" class="form-control" value="{{ $gymnaste->club }}" required>
        </div>
        
        <div class="mb-3">
            <label for="discipline" class="form-label">Discipline</label>
            <select name="discipline" id="discipline" class="form-select" required>
                <option value="">-- Sélectionnez une discipline --</option>
                <option value="GAM" {{ $gymnaste->discipline == 'GAM' ? 'selected' : '' }}>GAM</option>
                <option value="GAF" {{ $gymnaste->discipline == 'GAF' ? 'selected' : '' }}>GAF</option>
                <option value="GR"  {{ $gymnaste->discipline == 'GR' ? 'selected' : '' }}>GR</option>
                <option value="PK"  {{ $gymnaste->discipline == 'PK' ? 'selected' : '' }}>PK</option>
                <option value="AERO" {{ $gymnaste->discipline == 'AERO' ? 'selected' : '' }}>AERO</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="photo_profil" class="form-label">Photo de Profil</label>
            <input type="file" name="photo_profil" id="photo_profil" class="form-control">
            @if($gymnaste->photo_profil)
                <p class="mt-2">
                    Photo actuelle : <br>
                    <img src="{{ asset('storage/' . $gymnaste->photo_profil) }}" alt="Photo de {{ $gymnaste->nom }}" width="100">
                </p>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
    <a href="{{ route('gymnastes.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
