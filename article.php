<?php 
// On ouvre notre session
session_start([
    'cookie_lifetime' => 3600, // Durée de vie du cookie sesison en secondes quand la session est inactive
    'cookie_httponly' => true, // Empêche l'accés des cookie par JavaScript
    'cookie_secure' => true, // Cookie en https seulement
    'cookie_samesite' => 'Lax', // Contrôle le comportement du cookie en fonction du site
    'use_strict_mode' => true // Utilisation du mode strict pour les sesisons 
]);
// On inclu notre page Maconnexion pour l'utiliser si besoin
include ('Maconnexion.php'); 
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- autre -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Orbitron:wght@400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Orbitron:wght@400;500&family=Permanent+Marker&display=swap" rel="stylesheet">
</head>

<body class="articles">

    <?php include "header.php"; ?>

    <main>
        <!-- SI il y une session article alors $articles prend la valeur de la session article
            SINON $articles prend la valeur su post id_article et la session prend la valeur de $articles
            se sera utile quand on commentera pour que la page ne perde pas l'id de l'article afficher -->
        <?php
        if(isset($_POST["csrf_token"]) && $_POST["csrf_token"] === $_SESSION["csrf_token"]){
            
        }
        if(isset($_SESSION['article'])){
            $articles = $_SESSION['article'];

        }else{
            $articles = $_POST['id_articles'];
            $_SESSION['article'] = $articles;
        }

        // On affiche l'article souhaité
        $wow = new MaConnexion("blog_jeux", "", "root", "localhost");
        $afficher = $wow->select_where_articles("articles", "*", $articles);

        foreach ($afficher as $ligne) {
            echo '
            <div >
                <article class="article">
                <img src="' . $ligne['image'] . '" alt="Image de l\'article">
                
                <h1 class="titrearticles">' . $ligne['titre'] . '</h1>
                <p>' . $ligne['contenu'] . '</p>
                <small>';
                // On cherche l'auteur de l'article et on l'affiche en bas de celui-ci
                $cherche_auteur = $wow -> select_where_auteurs("auteurs", "nom", $ligne['id_auteurs']);
                echo $cherche_auteur[0]["nom"] . ' ';
                echo $ligne['date_publication'] . '</small>';

                // On affiche si il y a session active
                if(isset($_SESSION['role'])){
                    echo '
                    // Des icônes pour like/adore/dislike/pas intéressé
                    <div class="like-section">
                        <div class="icons">
                            <span class="icon like"><i class="fa-regular fa-heart fa-shake" style="color: #A4133C;"></i>J\'aime</span>
                            <span class="icon love"><i class="fa-regular fa-star fa-shake" style="color: #A4133C;"></i>J\'adore</span>
                            <span class="icon dislike"><i class="fa-regular fa-thumbs-down fa-shake" style="color: #A4133C;"></i>J\'aime pas</span>
                            <span class="icon not-interested"><i class="fa-regular fa-hand fa-shake" style="color: #A4133C;"></i>Pas intéressé</span>
                        </div>
                    </div> ';
                }
                echo '
                <!-- Section pour les commentaires -->
                <div class="comment-section">
                    <h3>Commentaires</h3>

                    ';


            // On affiche les commentaire
            $commentaires = $wow->select_where_commentaires("commentaires", "*", $articles);
            if ($commentaires != null) {
                foreach ($commentaires as $coms) {
                    if ($coms['id_articles'] == $articles) {

                        echo '
                                <small>';

                        $comauteur = $wow->select_where_auteurs("auteurs", "*", $coms['id_auteurs']);
                        foreach ($comauteur as $nomaut) {
                            echo $nomaut['nom'];
                        }
                        echo ' ' . $coms['date'] . '</small>
                                <p>' . $coms['contenu'] . '</p>
                                ';

                                // SI une session est en cours alors on fait le switch
                                if(isset($_SESSION['role'])){
                                    // Le switch regarde deux cas différent pour le role de la session
                                    switch ($_SESSION['role']) {
                                        // Si le role est 2(admin) alors un boutton pour SUPPRIMER le commentaire s'affichera
                                        case 2:
            
                                            echo '
                                                    <button type="button" class="custom-btn-del deletebut" data-bs-toggle="modal" data-bs-target="#delete' . $coms['id_commentaires'] . '"><span>DELETE</span></button>
                                                ';
                                            echo '
                                                <!-- Modal DELETE -->
                                                    <div class="modal fade" id="delete' . $coms['id_commentaires'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer un article</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">';
            
                                            echo 'Veut-tu vraiment supprimer le commentaire ' . $coms['contenu'] . ' id: ' . $coms['id_commentaires'] . ' de la base de donnée ?';
                                            echo '
                    
                                                                <!-- form codepen -->
                                                                <div class="login-page">
                                        
                                                                <div class="form">
                                        
                                                                    <form  method="POST" action="delete_commentaire.php" id="delete_commentaire' . $coms['id_commentaires'] . '">
                                                                        <input name="id_delete" type="number" value="' . $coms['id_commentaires'] . '" hidden/>                                                        
                                                                    </form>
                                        
                                                                </div>
                                                            </div>
                                        
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <button form="delete_commentaire' . $coms['id_commentaires'] . '" type="submit" class="btn btn-primary">Supprimer le commentaire</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>';
                                            break;
            
                                        // Si le role est 3(abonné) alors un boutton pour UPDATE et SUPPRIMER le commentaire s'affichera
                                        // Seulement si l'id de la session est égale à l'id du commentaire 
                                        case 3:
                                            if (isset($_SESSION['id']) && ($_SESSION['id'] == $coms['id_auteurs'])) {
                                                echo '
                                                    <div id="mdr">
                                                        <button type="button" class="custom-btn-up updatebut" data-bs-toggle="modal" data-bs-target="#delete' . $coms['id_commentaires'] . '"><span>UPDATE</span></button>
                                                        <button type="button" class="custom-btn-del deletebut" data-bs-toggle="modal" data-bs-target="#delete' . $coms['id_commentaires'] . '"><span>DELETE</span></button>
                                                    </div>      
                                                            ';
                                                echo '
                                                        <!-- Modal DELETE -->
                                                            <div class="modal fade" id="delete' . $coms['id_commentaires'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer un article</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">';
            
                                                echo 'Veut-tu vraiment supprimer le commentaire ' . $coms['contenu'] . ' id: ' . $coms['id_commentaires'] . ' de la base de donnée ?';
                                                echo '
                    
                                                                    <!-- form codepen -->
                                                                    <div class="login-page">
                                                
                                                                        <div class="form">
                                                
                                                                                <form  method="POST" action="delete_commentaire.php" id="delete_commentaire' . $coms['id_commentaires'] . '">
                                                                                    <input name="id_delete" type="number" value="' . $coms['id_commentaires'] . '" hidden/>                                                        
                                                                                </form>
                                                
                                                                        </div>
                                                                    </div>
                                                
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                    <button form="delete_commentaire' . $coms['id_commentaires'] . '" type="submit" class="btn btn-primary">Supprimer le commentaire</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>';
                                            }
            
                                            break;
                                    }
                                }
                        
                    }
                }
            }
            
            // Enfin on affiche un formulaire pour envoyer un commentaire si il y a une session de lancé
            if (isset($_SESSION['role'])) {
                echo '
                            <form class="comment-form" method="POST" action="commentaires.php">                           
                                <input name="id_articles" type="hidden" value="' . $ligne['id_articles'] . '">
                                <input name="id_auteurs" type="hidden" value="' . $_SESSION['id'] . '">
                                <input name="token" type="hidden" value="' . $_SESSION['csrf_token'] . '">                           
                                <textarea name="contenu" placeholder="Votre commentaire" required></textarea>
                    ';
                    $monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                    echo'<input name="url" type="hidden" value="' . $monUrl . '">';
                    echo'
                                <button type="submit">Poster le commentaire</button>
                            </form>
                            
                            ';
            }

            echo '
                        </div>
                <!-- Section pour les icônes d\'appréciation -->
            
                        </article>
                    </div>';
        }





        ?>

    </main>

    <?php include "footer.php"; ?>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- mon script -->
    <script src="script.js"></script>
</body>

</html>