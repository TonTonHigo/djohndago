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






    <?php


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";





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


echo "<br>";
echo "<br>";
echo "<br>";


// Chemin d'accès de votre image que vous souhaitez afficher
$chemin_image = "site_exemples\img\watchdog.jpg";
echo '<div class="image-container">
    <img src="' . $chemin_image . '" alt="Votre image">
</div>';

echo "<br>";
echo "<br>";
echo "<br>";





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
// On instancie une nouvelle MaConnexion qu'on met dans notre variable $trois_cartes 
$trois_cartes = new MaConnexion("blog_jeux", "" , "root" , "localhost");
// On utilise une fonction de la classe MaConnexion pour select les cartes et on les met dans la variable $afficher
$afficher = $trois_cartes -> select_articles_recents("articles","*");
// Maintenant qu'on à selectionner nos articles on doit les afficher donc on fait un foreach car $afficher est un tableau dans un tableau ($afficher = [[propriété:valeur])
foreach($afficher as $cartes){
    echo '<div class="card-image">
        <img src="' . $cartes['image'] . '" alt="Image">
        <div class="card-buttons">
            <button>Voir article</button>

        </div>
    </div>';
}
echo '</section>';

echo "<br>";
echo "<br>";
echo "<br>";



// Chemin d'accès de votre image que vous souhaitez afficher
$chemin_image = "site_exemples\img\poi.webp";
echo '<div class="image-container">
    <img src="' . $chemin_image . '" alt="Votre image">
</div>';

echo "<br>";
echo "<br>";
echo "<br>";



// Tableau des images de FPS (à remplacer par vos données réelles)
$fpsImages = array(
    "site_exemples\img\call-of-duty-warzone-photo-1381831.webp",
    "site_exemples\img\decor (29).jpg",
    "site_exemples/img/battlefield-2042-logo.webp",
    // Ajoutez d'autres images de FPS similaires ici
);

// Boucle foreach pour afficher les images de FPS
echo '<h2>FPS ...</h2>
<section class="card-section">';
$fpsImages = $trois_cartes -> select_articles_FPS("articles","*");
foreach ($fpsImages as $cartes) {
    echo '<div class="card-image">
    <img src="' . $cartes['image'] . '" alt="Image">
    <div class="card-buttons">
        <button>Voir article</button>

    </div>
</div>';
}
echo '</section>';

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";



?>
<?php include('footer.php'); ?>








<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    <script src="script.js"></script>
</body>

</html>