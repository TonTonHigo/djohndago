<?php
include("Maconnexion.php");

// On récolte les données
$nom = $_POST['nom'];
$mdp = $_POST['mdp'];

// Le pattern contient les caractère interdit lors de l'input
$pattern = '/^[a-zA-Z0-9_]+$/';

// Si le preg_match ne voit aucun caractère du pattern dans $nom alors on exécute le code
if(preg_match($pattern, $nom)){

    // On select l'auteur par rapport à son $nom et $mdp dans la table
    $connexion = new MaConnexion("blog_jeux","","root","localhost");
    $requete = $connexion-> select("auteurs", "*");
    foreach($requete as $compare){
        // Si le $mdp est égale au mot de passe de la bdd alors on créer la session
        if(password_verify($mdp, $compare['mdp'])){ 

            session_start([
                'cookie_lifetime' => 3600, // Durée de vie du cookie sesison en secondes quand la session est inactive
                'cookie_httponly' => true, // Empêche l'accés des cookie par JavaScript
                'cookie_secure' => true, // Cookie en https seulement
                'cookie_samesite' => 'Lax', // Contrôle le comportement du cookie en fonction du site
                'use_strict_mode' => true // Utilisation du mode strict pour les sesisons 
            ]);
            //Generer un token CSRF
            $byte = random_bytes(32);

            $taken = bin2hex($byte); 

            // Stocker le token en session
            $_SESSION['csrf_token'] = $taken;
            // On enregistre l'id de l'auteur dans $_SESSION['id'] 
            $_SESSION['id'] = $compare['id_auteurs'];
            // On enregistre role de l'auteur dans $_SESSION['role'] 
            $_SESSION['role'] = $compare['id_roles'];
            // On enregistre nom de l'auteur dans $_SESSION['nom'] 
            $_SESSION['nom'] = $compare['nom'];
            // On créer une session article 
            $_SESSION['article'] = "";
            // On le redirige vers index.php
            header("Location: index.php");
            exit();
        }
        

    }


    
}
