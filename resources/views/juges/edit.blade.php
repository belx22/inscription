@extends('layouts.app')

@section('title', 'Modifier le Juge')

@section('content')
<div class="container mt-4">
    <h1>Modifier le Juge</h1>
    <form action="{{ route('juges.update', $juge->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $juge->nom }}" required>
        </div>
        
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $juge->prenom }}" required>
        </div>
        
        <div class="mb-3">
            <label for="date_naissance" class="form-label">Date de Naissance</label>
            <input type="date" name="date_naissance" id="date_naissance" class="form-control" value="{{ $juge->date_naissance }}" required>
        </div>
        
        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie</label>
            <input type="text" name="categorie" id="categorie" class="form-control" value="{{ $juge->categorie }}" required>
        </div>
        
        <div class="mb-3">
            <label for="discipline" class="form-label">Discipline</label>
            <select name="discipline" id="discipline" class="form-select" required>
                <option value="">-- Sélectionnez une discipline --</option>
                <option value="GAM" {{ $juge->discipline == 'GAM' ? 'selected' : '' }}>GAM</option>
                <option value="GAF" {{ $juge->discipline == 'GAF' ? 'selected' : '' }}>GAF</option>
                <option value="PK" {{ $juge->discipline == 'PK' ? 'selected' : '' }}>PK</option>
                <option value="AERO" {{ $juge->discipline == 'AERO' ? 'selected' : '' }}>AERO</option>
                <option value="GR" {{ $juge->discipline == 'GR' ? 'selected' : '' }}>GR</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="photo_profil" class="form-label">Photo de Profil</label>
            <input type="file" name="photo_profil" id="photo_profil" class="form-control">
            @if($juge->photo_profil)
                <p class="mt-2">
                    Photo actuelle : <br>
                    <img src="{{ asset('storage/' . $juge->photo_profil) }}" alt="Photo de {{ $juge->nom }}" width="100">
                </p>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
    <a href="{{ route('juges.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
