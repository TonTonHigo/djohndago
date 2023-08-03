<?php
session_start([
    'cookie_lifetime' => 3600, // Durée de vie du cookie sesison en secondes quand la session est inactive
    'cookie_httponly' => true, // Empêche l'accés des cookie par JavaScript
    'cookie_secure' => true, // Cookie en https seulement
    'cookie_samesite' => 'Lax', // Contrôle le comportement du cookie en fonction du site
    'use_strict_mode' => true // Utilisation du mode strict pour les sesisons 
]);
include("Maconnexion.php");


if (isset($_POST['id_articles'], $_POST['id_auteurs'], $_POST['contenu'])) {
    // On récolte les données des input dans des variables avant de les insérer
    $id_articles = $_POST['id_articles'];
    $id_auteurs = $_POST['id_auteurs'];
    $contenu = $_POST['contenu'];
    $url = $_POST['url'];

    $ajout_commentaire = new MaConnexion("blog_jeux","","root","localhost");
    $result = $ajout_commentaire->insertionCommentaire($contenu, $id_articles, $id_auteurs);

    if ($result === "insertion reussie") {
        header("Location: article.php");
        exit();
    } else {
        echo "Error: " . $result;
    }
}
?>
