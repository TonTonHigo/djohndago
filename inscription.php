<?php
session_start([
    'cookie_lifetime' => 3600, // Durée de vie du cookie sesison en secondes quand la session est inactive
    'cookie_httponly' => true, // Empêche l'accés des cookie par JavaScript
    'cookie_secure' => true, // Cookie en https seulement
    'cookie_samesite' => 'Lax', // Contrôle le comportement du cookie en fonction du site
    'use_strict_mode' => true // Utilisation du mode strict pour les sesisons 
]);

include("Maconnexion.php");

// AJOUT AUTEUR
$role = $_POST['id_roles'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$mdp = $_POST['mdp'];
$conf_mdp = $_POST['conf_mdp'];

$pattern = '/^[a-zA-Z0-9_]+$/';

    if(preg_match($pattern, $nom)){
    
        if($mdp == $conf_mdp){
            $mdp_hash = password_hash($mdp, PASSWORD_ARGON2ID);
        
            $ajout_article = new MaConnexion("blog_jeux","","root","localhost");
            $requete = $ajout_article -> insertionInscription($role, $nom, $email, $mdp_hash);
            header("Location: index.php");
            exit();
        }
    }      


// $newInsertion = new MaConnexion("blog_jeux", "", "root", "localhost"); //$ plus nom de la variable= declarer la varaiable
// //new maconnexion = permet de creer un instance .//johndoe = base de donnée //utilisateur= utilisateur de base de donnee//localhost = host chemin d'acces au server
// $newInsertion-> insertionInscription_Secure($_POST["id_roles"], $_POST["nom"], $_POST["email"], $_POST["mdp"]);// new maconnexion = new construction
// //$newinsertion n7 =instance de ma classe MaConnexion// -> insertion_secure = permet avoir ou appeller la fonction de MA classe . // () du fonction = parametre
// // header("location: index.php");// header = modifie l'en tete de la requete http pour pointe vers le nouveau chemin
// // exit();



?>