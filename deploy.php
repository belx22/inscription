<?php

$zipFile = "deploy.zip"; // Nom du fichier ZIP contenant ton projet Laravel
$projectName = ""; // Nom du dossier où sera extrait Laravel
$projectPath = __DIR__ . "/$projectName";

// Vérifier si le fichier ZIP existe
if (!file_exists($zipFile)) {
    die("❌ Le fichier $zipFile n'existe pas. Téléverse-le sur le serveur.\n");
}

// Étape 1 : Extraire le fichier ZIP
echo "📦 Extraction de $zipFile...\n";
$zip = new ZipArchive;
if ($zip->open($zipFile) === TRUE) {
    $zip->extractTo(__DIR__);
    $zip->close();
    echo "✅ Extraction terminée !\n";
} else {
    die("❌ Échec de l'extraction du fichier ZIP.\n");
}

// Étape 2 : Configurer l'environnement (.env)
echo "🛠 Configuration de l'environnement...\n";
copy("$projectPath/.env.example", "$projectPath/.env");
exec("cd $projectPath && php artisan key:generate");

// Étape 3 : Installer les dépendances
echo "📦 Installation des dépendances...\n";
exec("cd $projectPath && composer install");

// Étape 4 : Configurer les permissions (important sur un mutualisé)
echo "🔑 Configuration des permissions...\n";
exec("chmod -R 775 $projectPath/storage $projectPath/bootstrap/cache");

// Étape 5 : Exécuter les migrations de la base de données
echo "📊 Exécution des migrations...\n";
exec("cd $projectPath && php artisan migrate --force");

// Étape 6 : Démarrer Laravel (uniquement si vous avez un accès SSH et pouvez exécuter PHP)
echo "🚀 Déploiement terminé !\n";
echo "Votre application Laravel est prête.\n";

// Message final
echo "\n🎉 Déploiement réussi ! Accédez à votre site via : https://votre-domaine.com/$projectName/public\n";
?>
