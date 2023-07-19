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
</head>
<body class="blog">
    
<?php include ('header.php'); ?>

    <main>


        <section>
            
        <?php 
            if($_SESSION['role'] == 2){
                echo '
                <!-- button stylé -->
                <button type="button" class="bubbly-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Ajouter un article
                </button>
        
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    
                                    <form class="login-form" method="POST" action="crud.php" id="form_article">
                                        <input name="image" type="text" placeholder="image"/>
                                        <input name="titre" type="text" placeholder="titre"/>
                                        <input name="categorie" type="number" placeholder="categorie"/>
                                        <input name="contenu" type="text" placeholder="contenu"/>
                                        <input name="date" type="date" placeholder="date"/>
                                        <input name="id_auteur" type="number" value="' . $_SESSION['id'] . '" hidden/>
                                    </form>
    
                            </div>
                        </div>
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button form="form_article" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
                ';
            }
        ?>
           
           <div>
                <?php
                    $select = new MaConnexion("blog_jeux", "" , "root" , "localhost");
                    $afficher = $select -> select("articles","*");
                    foreach($afficher as $cartes){
                        
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