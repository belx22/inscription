<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Carte d'identité - Juge</title>
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      margin: 0;
      padding: 0;
    }
    .card {
      border: 1px solid #333;
      padding: 20px;
      width: 400px;
      height: 250px;
      position: relative;
      margin: 20px auto;
    }
    .photo {
      position: absolute;
      top: 20px;
      right: 20px;
    }
    .photo img {
      width: 100px;
      height: auto;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>Carte d'identité - Juge</h2>
    <p><strong>Nom :</strong> {{ $juge->nom }}</p>
    <p><strong>Prénom :</strong> {{ $juge->prenom }}</p>
    <p><strong>Date de naissance :</strong> {{ $juge->date_naissance }}</p>
    <p><strong>Catégorie :</strong> {{ $juge->categorie }}</p>
    <p><strong>Discipline :</strong> {{ $juge->discipline }}</p>
    <p><strong>Code Unique :</strong> {{ $juge->unique_code }}</p>
    <div class="photo">
      @if($juge->photo_profil)
        <img src="{{ public_path('storage/' . $juge->photo_profil) }}" alt="Photo">
      @else
        <p>Pas de photo</p>
      @endif
    </div>
  </div>
</body>
</html>
