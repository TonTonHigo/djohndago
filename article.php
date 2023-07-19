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
</head>
<body>

    <?php include "header.php"; ?>

    <main>

        <?php
        $articles = $_POST['id_articles'];
        $wow = new MaConnexion("blog_jeux", "" , "root" , "localhost");
        $afficher = $wow -> select_where_articles("articles","*", $articles);
        foreach($afficher as $ligne){
            echo '
                <img src="' . $ligne['image'] . '">
                <h1>' . $ligne['titre'] . '</h1>
                <p>' . $ligne['contenu'] . '</p>
            ';
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