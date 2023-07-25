<?php
session_start();

include("Maconnexion.php");

$nom = $_POST['nom'];
$mdp = $_POST['mdp'];

$pattern = '/^[a-zA-Z0-9_]+$/';

if(preg_match($pattern, $nom)){

    $connexion = new MaConnexion("blog_jeux","","root","localhost");
    $requete = $connexion-> select("auteurs", "*");
    foreach($requete as $compare){
        
        if(password_verify($mdp, $compare['mdp'])){   
            $_SESSION['id'] = $compare['id_auteurs'];
            $_SESSION['role'] = $compare['id_roles'];
            header("Location: index.php");
            exit();
        }
    }

}      
?>
