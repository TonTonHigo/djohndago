<?php
    session_start([
        'cookie_lifetime' => 3600, // Durée de vie du cookie sesison en secondes quand la session est inactive
        'cookie_httponly' => true, // Empêche l'accés des cookie par JavaScript
        'cookie_secure' => true, // Cookie en https seulement
        'cookie_samesite' => 'Lax', // Contrôle le comportement du cookie en fonction du site
        'use_strict_mode' => true // Utilisation du mode strict pour les sesisons 
    ]);

    include "Maconnexion.php";

    // AJOUT ARTICLE
    $image = $_POST['image'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $categorie= $_POST['categorie'];
    $auteur = $_POST['id_auteur'];

    $ajout_article = new MaConnexion("blog_jeux","","root","localhost");
    $requete = $ajout_article -> insertionArticle_Secure($image,$titre,$contenu,$categorie,$auteur);
    header("Location: blog.php");
    exit();

?>