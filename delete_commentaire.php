<?php
    session_start([
        'cookie_lifetime' => 3600, // Durée de vie du cookie sesison en secondes quand la session est inactive
        'cookie_httponly' => true, // Empêche l'accés des cookie par JavaScript
        'cookie_secure' => true, // Cookie en https seulement
        'cookie_samesite' => 'Lax', // Contrôle le comportement du cookie en fonction du site
        'use_strict_mode' => true // Utilisation du mode strict pour les sesisons 
    ]);
    include "Maconnexion.php";
   
    // SUPPRESISON DE COMMENTAIRE
    $id_delete_com = $_POST['id_delete'];

    $supp_com = new MaConnexion("blog_jeux","","root","localhost");
    $requete = $supp_com -> delete_com($id_delete_com);

    header("Location: blog.php");
    exit();
?>