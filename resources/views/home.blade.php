<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CamerGym - Système d'Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#" onclick="showSection('home')">CamerGym</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showSection('home')">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showSection('judges-form')">Inscription Juges</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showSection('gymnasts-form')">Inscription Gymnastes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showSection('admin-panel')">Administration</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                                <img src="https://images.unsplash.com/photo-1566241440091-ec10de8db2e1?w=800&auto=format&fit=crop&q=60" 
                                     alt="Gymnastes" class="feature-image">
                            </div>
                            <h3>Inscription Gymnastes</h3>
                            <p>Inscrivez-vous pour participer aux compétitions officielles</p>
                            <button class="btn btn-primary" onclick="showSection('gymnasts-form')">S'inscrire</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-card">
                            <div class="icon-wrapper mb-3">
                                <img src="https://images.unsplash.com/photo-1599058945522-28d584b6f0ff?w=800&auto=format&fit=crop&q=60" 
                                     alt="Juges" class="feature-image">
                            </div>
                            <h3>Inscription Juges</h3>
                            <p>Rejoignez le corps des juges de gymnastique</p>
                            <button class="btn btn-primary" onclick="showSection('judges-form')">S'inscrire</button>
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

        <!-- Existing sections... -->
        [Previous sections remain exactly the same...]
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>