<?php
    session_start([
        'cookie_lifetime' => 3600, // Durée de vie du cookie sesison en secondes quand la session est inactive
        'cookie_httponly' => true, // Empêche l'accés des cookie par JavaScript
        'cookie_secure' => true, // Cookie en https seulement
        'cookie_samesite' => 'Lax', // Contrôle le comportement du cookie en fonction du site
        'use_strict_mode' => true // Utilisation du mode strict pour les sesisons 
    ]);

    include "Maconnexion.php";

    // MISE A JOUR ARTICLE
    $id_update = $_POST['id_update'];
    $image_update = $_POST['image_update'];
    $titre_update = $_POST['titre_update'];
    $contenu_update = $_POST['contenu_update'];
    $categorie_update = $_POST['categorie_update'];

    $update_article = new MaConnexion("blog_jeux","","root","localhost");
    $requete = $update_article -> miseAJourArticle_Secure($id_update, $image_update, $titre_update, $contenu_update, $categorie_update);
    header("Location: blog.php");
    exit();
?>