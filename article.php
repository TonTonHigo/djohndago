<?php include ('Maconnexion.php'); 
session_start();
$_SESSION['role'] = 2;
$_SESSION['id'] = 1;
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

        <?php
        $articles = $_POST['id_articles'];
        $wow = new MaConnexion("blog_jeux", "" , "root" , "localhost");
        $afficher = $wow -> select_where_articles("articles","*", $articles);
        foreach($afficher as $ligne){
            echo '
            <div >
            <article class="article">
                <img src="'. $ligne['image'] . '" alt="Image de l\'article">
                
                <h1 class="titrearticles">'. $ligne['titre'] . '</h1>
                <p>'. $ligne['contenu'] . '</p>
    
                <div class="like-section">
                    <div class="icons">
                        <span class="icon like"><i class="fa-regular fa-heart fa-shake" style="color: #A4133C;"></i>J\'aime</span>
                        <span class="icon love"><i class="fa-regular fa-star fa-shake" style="color: #A4133C;"></i>J\'adore</span>
                        <span class="icon dislike"><i class="fa-regular fa-thumbs-down fa-shake" style="color: #A4133C;"></i>J\'aime pas</span>
                        <span class="icon not-interested"><i class="fa-regular fa-hand fa-shake" style="color: #A4133C;"></i>Pas intéressé</span>
                    </div>
                </div> 
                <!-- Section pour les commentaires -->
                <div class="comment-section">
                    <h3>Commentaires</h3>

                    ';
            $commentaires = $wow -> select_where_commentaires("commentaires","*", $ligne['id_articles']);
            if($commentaires != null){
                foreach($commentaires as $coms){
                    if($coms['id_articles'] == $ligne['id_articles']){

                        echo '
                        <small>';
    
                        $comauteur = $wow -> select_where_auteurs("auteurs", "*" ,$coms['id_auteurs']);
                        foreach($comauteur as $nomaut){
                            echo $nomaut['nom'];
                        }
                        echo ' ' . $coms['date'] . '</small>
                        <p>'. $coms['contenu'] . '</p>
                        ';
                    }
                }

            }



            if($_SESSION['role'] == 2 || $_SESSION['role'] == 3 ){
                echo '
                        <form class="comment-form" method="POST" action="commentaires.php">
                            <input name="id_articles" type="number" value="'. $ligne['id_articles'] . '"  hidden>
                            <input name="id_auteurs" type="number" value="'. $_SESSION['id'] . '"  hidden>
                            <textarea name="contenu" placeholder="Votre commentaire" required></textarea>
                            <button type="submit">Poster le commentaire</button>
                        </form>
                        
                        ';
                    }
                    
                echo'
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