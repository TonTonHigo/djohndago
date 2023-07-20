<?php include('Maconnexion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCEUIL</title>
    <link rel="stylesheet" href="style.css">
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
    <?php include('header.php'); ?>



    <br>
    <br>

    <div>
        <article class="article">
            <img src="site_exemples\img\wallpaperflare.com_wallpaper(16).jpg" alt="Image de l'article">
            <div class="like-section">
                <!-- <h3>J'aime cet article ?</h3> -->
                <div class="icons">
                    <span class="icon like"><i class="fa-regular fa-heart fa-shake" style="color: #A4133C;"></i>J'aime</span>
                    <span class="icon love"><i class="fa-regular fa-star fa-shake" style="color: #A4133C;"></i>J'adore</span>
                    <span class="icon dislike"><i class="fa-regular fa-thumbs-down fa-shake" style="color: #A4133C;"></i>J'aime pas</span>
                    <span class="icon not-interested"><i class="fa-regular fa-hand fa-shake" style="color: #A4133C;"></i>Pas intéressé</span>
                </div>
            </div>
            <h2 class="titrearticles">DBZ VEGETA BLUE "RAGE"</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut qui labore quisquam eaque ratione molestias et ducimus voluptas enim! Blanditiis.p>

                <!-- Section pour les commentaires -->
            <div class="comment-section">
                <h3>Commentaires</h3>
                <form class="comment-form">
                    <input type="text" placeholder="Votre nom" required>
                    <textarea placeholder="Votre commentaire" required></textarea>
                    <button type="submit">Poster le commentaire</button>
                </form>
                <div class="comments">
                    <!-- Les commentaires des utilisateurs seront ajoutés ici via JavaScript -->
                </div>
            </div>

            <!-- Section pour les icônes d'appréciation -->

        </article>
    </div>


    <br>
    <br>














    <?php include('footer.php'); ?>
    <script src="script.js"></script>
</body>

</html>