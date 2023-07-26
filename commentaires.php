<?php
session_start();

include("Maconnexion.php");

if (isset($_POST['id_articles'], $_POST['id_auteurs'], $_POST['contenu'])) {
    // Form data is present, proceed with the insertion.
    $id_articles = $_POST['id_articles'];
    $id_auteurs = $_POST['id_auteurs'];
    $contenu = $_POST['contenu'];
    $url = $_POST['url'];

    $ajout_commentaire = new MaConnexion("blog_jeux","","root","localhost");
    $result = $ajout_commentaire->insertionCommentaire($contenu, $id_articles, $id_auteurs);

    // Handle the result as needed, e.g., redirect to a success page or display an error message.
    if ($result === "insertion reussie") {
        header("Location: article.php");
        exit();
    } else {
        echo "Error: " . $result;
    }
}
?>
