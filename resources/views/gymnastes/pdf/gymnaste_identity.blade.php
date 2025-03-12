<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Carte d'identité - Gymnaste</title>
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
    <h2>Carte d'identité - Gymnaste</h2>
    <p><strong>Nom :</strong> {{ $gymnaste->nom }}</p>
    <p><strong>Prénom :</strong> {{ $gymnaste->prenom }}</p>
    <p><strong>Date de naissance :</strong> {{ $gymnaste->date_naissance }}</p>
    <p><strong>Lieu de naissance :</strong> {{ $gymnaste->lieu_naissance }}</p>
    <p><strong>Club :</strong> {{ $gymnaste->club }}</p>
    <p><strong>Discipline :</strong> {{ $gymnaste->discipline }}</p>
    <p><strong>Code Unique :</strong> {{ $gymnaste->unique_code }}</p>
    <div class="photo">
      @if($gymnaste->photo_profil)
        <img src="{{ public_path('storage/' . $gymnaste->photo_profil) }}" alt="Photo">
      @else
        <p>Pas de photo</p>
      @endif
    </div>
  </div>
</body>
</html>
