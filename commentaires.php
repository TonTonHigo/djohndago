<?php
session_start();
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
