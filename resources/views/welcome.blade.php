<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fédération Camerounaise de Gymnastique</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            
            color: white;
            padding: 20px 0;
        }
        header img {
            width: 150px;
            height: auto;
        }
        .gallery {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 20px 0;
        }
        .gallery img {
            margin: 10px;
            width: 200px;
            height: auto;
            border-radius: 10px;
        }
        .buttons {
            margin: 20px 0;
        }
        .buttons a {
            display: inline-block;
            margin: 10px;
            padding: 15px 25px;
            background-color: #008000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .buttons a:hover {
            background-color: #005700;
        }
        footer {
            background-color: #333;
            color: white;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="{{ asset('styles/style.css') }}" rel="stylesheet">
</head>
<body>

<header>
    <img src="{{ asset('img/ent0.png') }}" alt="Logo de la Fédération Camerounaise de Gymnastique">
</header>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<div class="container mt-4">
    <!-- Page d'accueil -->
    <section id="home" class="section-content">
        <div class="hero-section text-center py-5">
            <h1 class="display-4 mb-4">Bienvenue sur CamerGym</h1>
            <p class="lead mb-5">Plateforme officielle d'inscription pour les juges et gymnastes de la fédération camerounaise de gymnastique</p>
            
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="feature-card">
                        <div class="icon-wrapper mb-3">
                            <img src="{{ asset('img/gymnastes.jpeg') }}" 
                                 alt="Gymnastes" class="feature-image">
                        </div>
                        <h3>Inscription Gymnastes</h3>
                        <p>Inscrivez-vous pour participer aux compétitions officielles</p>
                        <a href="/gymnastes/create"> <button class="btn btn-primary" >S'inscrire</button></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-card">
                        <div class="icon-wrapper mb-3">
                            <img src="{{ asset('img/juges.jpeg') }}" 
                                 alt="Juges" class="feature-image">
                        </div>
                        <h3>Inscription Juges</h3>
                        <p>Rejoignez le corps des juges de gymnastique</p>
                        <a href="juges/create"><button class="btn btn-primary" >S'inscrire</button></a>
                    </div>
                </div>
            </div>

            <div class="disciplines-section py-5">
                <h2 class="mb-4">Nos Disciplines</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="discipline-card">
                            <h4>GAM/GAF</h4>
                            <p>Gymnastique Artistique Masculine et Féminine</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="discipline-card">
                            <h4>GR</h4>
                            <p>Gymnastique Rythmique</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="discipline-card">
                            <h4>AERO/PK</h4>
                            <p>Aérobic et Parkour</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

<footer>
    <p>&copy; 2025 Fédération Camerounaise de Gymnastique. Tous droits réservés.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
