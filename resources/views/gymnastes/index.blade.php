@extends('layouts.app')

@section('title', 'Liste des Gymnastes')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h1>Liste des Gymnastes</h1>
        <a href="{{ route('gymnastes.create') }}" class="btn btn-success">Ajouter un Gymnaste</a>
    </div>
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un gymnaste...">
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="gymnastesTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Lieu de Naissance</th>
                    <th>Club</th>
                    <th>Discipline</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gymnastes as $gymnaste)
                <tr>
                    <td>{{ $gymnaste->id }}</td>
                    <td>{{ $gymnaste->nom }}</td>
                    <td>{{ $gymnaste->prenom }}</td>
                    <td>{{ $gymnaste->date_naissance }}</td>
                    <td>{{ $gymnaste->lieu_naissance }}</td>
                    <td>{{ $gymnaste->club }}</td>
                    <td>{{ $gymnaste->discipline }}</td>
                    <td>
                        @if($gymnaste->photo_profil)
                            <img src="{{ asset('storage/' . $gymnaste->photo_profil) }}" alt="Photo de {{ $gymnaste->nom }}" width="50">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('gymnastes.edit', $gymnaste->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('gymnastes.destroy', $gymnaste->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Êtes-vous sûr ?');" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Barre de recherche avec JavaScript -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#gymnastesTable tbody tr');
    rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        row.style.display = text.indexOf(filter) > -1 ? '' : 'none';
    });
});
</script>
@endsection
