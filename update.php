<?php
    session_start();

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