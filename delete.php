<?php
    session_start();
    include "Maconnexion.php";
   
    // SUPPRESISON ARTICLE
    $id_delete = $_POST['id_delete'];

    $supp_article = new MaConnexion("blog_jeux","","root","localhost");
    $requete = $supp_article -> delete($id_delete);
    
    header("Location: blog.php");
    exit();
?>