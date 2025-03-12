@extends('layouts.app')

@section('title', 'Liste des Juges')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h1>Liste des Juges</h1>
        <a href="{{ route('juges.create') }}" class="btn btn-success">Ajouter un Juge</a>
    </div>
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un juge...">
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="jugesTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Catégorie</th>
                    <th>Discipline</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($juges as $juge)
                <tr>
                    <td>{{ $juge->id }}</td>
                    <td>{{ $juge->nom }}</td>
                    <td>{{ $juge->prenom }}</td>
                    <td>{{ $juge->date_naissance }}</td>
                    <td>{{ $juge->categorie }}</td>
                    <td>{{ $juge->discipline }}</td>
                    <td>
                        @if($juge->photo_profil)
                            <img src="{{ asset('storage/' . $juge->photo_profil) }}" alt="Photo de {{ $juge->nom }}" width="50">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('juges.edit', $juge->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('juges.destroy', $juge->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Êtes-vous sûr ?');" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                        <a href="{{ route('juges.pdf', $juge->id) }}" class="btn btn-info btn-sm" target="_blank">
                            Télécharger PDF
                        </a>
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
    let rows = document.querySelectorAll('#jugesTable tbody tr');
    rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        row.style.display = text.indexOf(filter) > -1 ? '' : 'none';
    });
});
</script>
@endsection
