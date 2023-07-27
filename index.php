<?php include('Maconnexion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCEUIL</title>
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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

<body class="acceuil">
    <?php include('header.php'); ?>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- mon carousel -->
<!-- 
    <div class="carousel-container-nav">
        <div class="carousel-slide">
            <img src="site_exemples\img\battlefield-2042-logo.webp" alt="Image 1">
            <img src="site_exemples\img\daysgone.jpg" alt="Image 2">
            <img src="site_exemples\img\wallpaperflare.com_wallpaper(10).jpg" alt="Image 3">
            <img src="site_exemples\img\decolastofusblackandwhite.jpg" alt="Image 4">
            <img src="site_exemples\img\onepeace.jpg" alt="Image 5">
            <img src="site_exemples\img\sexy.jpg" alt="Image 6">
            <img src="site_exemples\img\onepeace.jpg" alt="Image 7">
        </div>
    </div>
    <br> -->

    <hr class="trait">

    <!-- <br> -->
    <!-- <div class="image-container">
        <img src="site_exemples\img\watchdog.jpg" alt="Votre image">
    </div> -->

    <!-- <br> -->

    <!-- <h2>ARTICLES RECENTS ...</h2>

    <section class="card-section">
    <div class="card-image">
        <img src="site_exemples\img\onepeace.jpg" alt="Image 1">
        <div class="card-buttons">
            <button>Voir article</button>
            <button>Update</button>
            <button>Delete</button>
        </div>
    </div>

    <div class="card-image">
        <img src="site_exemples\img\fps game image.jpg" alt="Image 1">
        <div class="card-buttons">
            <button>Voir article</button>
            <button>Update</button>
            <button>Delete</button>
        </div>
    </div>

    <div class="card-image">
        <img src="site_exemples\img\harleyqueen.jpg" alt="Image 1">
        <div class="card-buttons">
            <button>Voir article</button>
            <button>Update</button>
            <button>Delete</button>
        </div>
    </div> -->
    <!-- Ajoutez d'autres images similaires ici -->
<!-- </section>


    <br>
    <hr>
    <br>

    <h2>FPS ...</h2>

    <-- seconde image -->
    <!-- <div class="image-container">
        <img src="site_exemples\img\call-of-duty-warzone-photo-1381831.webp" alt="Votre image">
    </div>


    <br>
    <br>  -->


    <!-- <section class="card-section">
    <div class="card-image">
        <img src="site_exemples\img\decor (29).jpg" alt="Image 1">
        <div class="card-buttons">
            <button>Voir article</button>
            <button>Update</button>
            <button>Delete</button>
        </div>
    </div>

    <div class="card-image">
        <img src="site_exemples\img\decor (15).jpg" alt="Image 1">
        <div class="card-buttons">
            <button>Voir article</button>
            <button>Update</button>
            <button>Delete</button>
        </div>
    </div>

    <div class="card-image">
        <img src="site_exemples\img\wallpaperflare.com_wallpaper(1).jpg" alt="Image 1">
        <div class="card-buttons">
            <button>Voir article</button>
            <button>Update</button>
            <button>Delete</button>
        </div>
    </div> -->
    <!-- Ajoutez d'autres images similaires ici -->
<!-- </section>

    <br>
    <hr>
    <br> -->




    <?php
// Définir un tableau contenant les chemins d'accès des images
$images = array(
    "site_exemples\img\battlefield-2042-logo.webp",
    "site_exemples\img\daysgone.jpg",
    "site_exemples\img\wallpaperflare.com_wallpaper(10).jpg",
    "site_exemples\img\decolastofusblackandwhite.jpg",
    "site_exemples\img\onepeace.jpg",
    "site_exemples\img\sexy.jpg",
    "site_exemples\img\onepeace.jpg",
);

// Boucle foreach pour afficher les images du carousel
echo '<div class="carousel-container-nav">
    <div class="carousel-slide">';
foreach ($images as $image) {
    echo '<img src="' . $image . '" alt="Image">';
}
echo '</div>
</div>';

// Tableau des articles récents avec les boutons (à remplacer par vos données réelles)
$articles = array(
    array("site_exemples\img\onepeace.jpg"),
    array("site_exemples\img\fps game image.jpg"),
    array("site_exemples\img\harleyqueen.jpg"),
    // Ajoutez d'autres articles similaires ici
);

// Boucle foreach pour afficher les cartes d'articles récents
echo '<h2>ARTICLES RECENTS ...</h2>
<section class="card-section">';
foreach ($articles as $article) {
    echo '<div class="card-image">
        <img src="' . $article[0] . '" alt="Image">
        <div class="card-buttons">
            <button>Voir article</button>
            <button>Update</button>
            <button>Delete</button>
        </div>
    </div>';
}
echo '</section>';

// Tableau des images de FPS (à remplacer par vos données réelles)
$fpsImages = array(
    "site_exemples\img\call-of-duty-warzone-photo-1381831.webp",
    "site_exemples\img\decor (29).jpg",
    "site_exemples\img\decor (15).jpg",
    // Ajoutez d'autres images de FPS similaires ici
);

// Boucle foreach pour afficher les images de FPS
echo '<h2>FPS ...</h2>';
foreach ($fpsImages as $image) {
    echo '<div class="image-container">
        <img src="' . $image . '" alt="Votre image">
    </div>';
}
?>









<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <?php include('footer.php'); ?>
    <script src="script.js"></script>
</body>

</html>