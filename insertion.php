<?php
    session_start();

    include "Maconnexion.php";

    // AJOUT ARTICLE
    $image = $_POST['image'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $date = $_POST['date'];
    $categorie= $_POST['categorie'];
    $auteur = $_POST['id_auteur'];

    $ajout_article = new MaConnexion("blog_jeux","","root","localhost");
    $requete = $ajout_article -> insertionArticle_Secure($image,$titre,$contenu,$date,$categorie,$auteur);
    header("Location: blog.php");
    exit();

?>