@extends('layouts.app')

@section('title', 'Inscription d\'un Juge')

@section('content')
<div class="container mt-5">
    <h2>Inscription d'un Juge</h2>
    <form action="{{ route('juges.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="mb-3">
            <label for="date_naissance" class="form-label">Date de Naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
        </div>
        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie</label>
            <input type="text" class="form-control" id="categorie" name="categorie" required>
        </div>
        <div class="mb-3">
            <label for="discipline" class="form-label">Discipline</label>
            <select class="form-select" id="discipline" name="discipline" required>
                <option value="GAM">GAM</option>
                <option value="GAF">GAF</option>
                <option value="PK">PK</option>
                <option value="AERO">AERO</option>
                <option value="GR">GR</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="photo_profil" class="form-label">Photo de Profil</label>
            <input class="form-control" type="file" id="photo_profil" name="photo_profil" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
