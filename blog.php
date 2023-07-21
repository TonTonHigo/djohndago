<?php include ('Maconnexion.php'); 
session_start();
$_SESSION['role'] = 2;
$_SESSION['id'] = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- autre -->
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
<body class="blog">
    
<?php include ('header.php'); ?>

    <main>


        <section>
            
        <?php 
            if($_SESSION['role'] == 2){
                echo '
                <!-- button stylé -->
                <div class="frame">
                <button type="button" class="custom-btn btn-5" data-bs-toggle="modal" data-bs-target="#insertion"><span>Ajouter un article</span></button>
                </div>
        
                <!-- Modal INSERTION -->
                <div class="modal fade" id="insertion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un article</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
    
                        <!-- form codepen -->
                        <div class="login-page">
    
                            <div class="form">
    
                                    <form class="login-form" method="POST" action="insertion.php" id="form_article">
                                        <input name="image" type="text" placeholder="image"/>
                                        <input name="titre" type="text" placeholder="titre"/>
                                        <input name="categorie" type="number" placeholder="categorie"/>
                                        <textarea name="contenu" type="text" placeholder="contenu"/></textarea>
                                        <input name="date" type="date" placeholder="date"/>
                                        <input name="id_auteur" type="number" value="' . $_SESSION['id'] . '" hidden/>
                                    </form>
    
                            </div>
                        </div>
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button form="form_article" type="submit" class="btn btn-primary">Ajouter l\'article</button>
                    </div>
                    </div>
                </div>
                </div>
                ';
            }
        ?>
           
           <div id="ourservices">
                <?php
                    $select = new MaConnexion("blog_jeux", "" , "root" , "localhost");
                    $afficher = $select -> select("articles","*");
                    foreach($afficher as $cartes){
                        $maxContentLength = 100; // Maximum de caractère a afficher 

                        // Raccourci le contenu si il est trop long
                        $truncatedContent = (strlen($cartes['contenu']) > $maxContentLength) ?
                        substr($cartes['contenu'], 0, $maxContentLength) . "..." :
                        $cartes['contenu'];

                        echo '

                        

                            <div class="our_services" id="massage'. $cartes['id_articles'] . '">
                                <h3 class="titre_style">'. $cartes['titre'] . '</h3>
                                <p class="txt3">'. $truncatedContent . '</p>
                                <form method="POST" action="article.php">
                                    <input name="id_articles" value="'. $cartes['id_articles'] . '" hidden>
                                    <button type="submit" class="txt3 butcard">Voir l\'article</button>
                                </form>
                                ';

                        if($_SESSION['role'] == 2){
                            echo '
                                <div class="crudbut">
                                    <button type="button" class="custom-btn-up updatebut" data-bs-toggle="modal" data-bs-target="#update'. $cartes['id_articles'] . '"><span>UPDATE</span></button>
                                    <button type="button" class="custom-btn-del deletebut" data-bs-toggle="modal" data-bs-target="#delete'. $cartes['id_articles'] . '"><span>DELETE</span></button>
                                </div>
                            
                            ';
                        }
                        
                        echo '
                                </div> 
                        
                                <!-- Modal UPDATE -->
                                <div class="modal fade" id="update'. $cartes['id_articles'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Mettre à jour un article</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                    
                                        <!-- form codepen -->
                                        <div class="login-page">
                    
                                            <div class="form">
                    
                                                    <form class="login-form" method="POST" action="update.php" id="update_article'. $cartes['id_articles'] . '">
                                                        <input name="id_update" type="number" value="'. $cartes['id_articles'] . '" hidden/>
                                                        <input name="image_update" type="text" placeholder="image"/>
                                                        <input name="titre_update" type="text" placeholder="titre"/>
                                                        <input name="categorie_update" type="number" placeholder="categorie"/>
                                                        <textarea name="contenu_update" type="text" placeholder="contenu"/></textarea>
                                                        <input name="date_update" type="date" placeholder="date"/>
                                                        <input name="id_auteur_update" type="number" value="' . $_SESSION['id'] . '" hidden/>
                                                    </form>
                    
                                            </div>
                                        </div>
                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <button form="update_article'. $cartes['id_articles'] . '" type="submit" class="btn btn-primary">Mettre à jour l\'article</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <!-- Modal DELETE -->
                                <div class="modal fade" id="delete'. $cartes['id_articles'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer un article</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">';
                        
                        echo 'Veut-tu vraiment supprimer l\'article ' . $cartes['titre'] . ' id: ' . $cartes['id_articles'] . ' de la base de donnée ?';
                        echo '

                                        <!-- form codepen -->
                                        <div class="login-page">
                    
                                            <div class="form">
                    
                                                    <form  method="POST" action="delete.php" id="delete_article'. $cartes['id_articles'] . '">
                                                        <input name="id_delete" type="number" value="'. $cartes['id_articles'] . '" hidden/>                                                        
                                                    </form>
                    
                                            </div>
                                        </div>
                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <button form="delete_article'. $cartes['id_articles'] . '" type="submit" class="btn btn-primary">Supprimer l\'article</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                        <style>
                        #massage'. $cartes['id_articles'] . '{
                            font-weight: 300;
                            letter-spacing: 1px;
                            background-image: linear-gradient(180deg,rgba(0,0,0,0) 0%,rgba(0,0,0,0.51) 100%),url("' . $cartes['image'] . '");
                            background-size: cover;
                            background-repeat: no-repeat;    
                            padding-top: 280px;
                            padding-right: 60px;
                            padding-bottom: 40px;
                            padding-left: 30px;
                        }
                        </style>

                        ';
                    }
                ?>
  
            </div>
        </section>




    </main>

    





<?php include ('footer.php'); ?>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- mon script -->
<script src="script.js"></script>
</body>
</html>