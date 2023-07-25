<?php
    session_start();

    include "Maconnexion.php";
   
    // SUPPRESISON ARTICLE
    $id_delete_com = $_POST['id_delete'];

    $supp_com = new MaConnexion("blog_jeux","","root","localhost");
    $requete = $supp_com -> delete_com($id_delete_com);
    header("Location: blog.php");
    exit();
?>