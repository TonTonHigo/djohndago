 <!DOCTYPE html>
 <html lang="fr">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="styles.css">
     <title>Navbar</title>
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
 </head>

 <body class="navbar">
     <header>
         <nav>
             <div class="nav-left">
                 <a href="index.php"><img src="site_exemples/img/LOGO.gif" alt="Logo"></a>
             </div>
             <div class="nav-center">
                 <ul>
                     <li><a href="index.php">Accueil</a></li>
                     <li><a href="blog.php">Blog</a></li>
                 </ul>
             </div>
             <div class="nav-right">

                 <button type="button" class="custom-btn-up updatebut" data-bs-toggle="modal" data-bs-target="#connexion"><span>CONNEXION</span></button>
                 <button type="button" class="custom-btn-del deletebut" data-bs-toggle="modal" data-bs-target="#inscription"><span>INSCRIPTION</span></button>
                 <!-- <button class="btn"><a href="inscription.php">Inscription</a></button>
                <button class="btn"><a href="connexion.php">Connexion</a></button> -->

                 <!-- <button onclick="openModal('connexion')">Connexion</button> -->
                 <!--        <button onclick="openModal('inscription')">Inscription</button> -->
             </div>


             <!-- Modal connexion -->
             <div class="modal fade" id="connexion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h1 class="modal-title fs-5" id="exampleModalLabel">CONNEXION</h1>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">

                             <!-- form codepen -->
                             <div class="login-page">

                                 <div class="form">

                                     <form class="login-form" method="POST" action="connexion.php" id="connexion">
                                         <!-- <input name="id_update" type="number" value="" hidden /> -->
                                         <!-- <input name="image_update" type="text" placeholder="image" /> -->
                                         <input name="Nom" type="text" placeholder="Nom" />
                                         <input name="Mot_de_passe" type="password" placeholder="Mot de passe" />
                                         <!-- <input name="categorie_update" type="number" placeholder="categorie" /> -->
                                         <!-- <textarea name="contenu_update" type="text" placeholder="contenu" ></textarea> -->
                                         <!-- <input name="date_update" type="date" placeholder="date" /> -->
                                         <!-- <input name="id_auteur_update" type="number" value="' . $_SESSION['id'] . '" hidden /> -->
                                     </form>

                                 </div>
                             </div>

                         </div>
                         <div class="modal-footer">
                             <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button> -->
                             <button form="connexion" type="submit" class="btn btn-primary">CONNEXION</button>
                         </div>
                     </div>
                 </div>
             </div>






             <!-- Modal inscription -->
             <div class="modal fade" id="inscription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h1 class="modal-title fs-5" id="exampleModalLabel">INSCRIPTION</h1>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">

                             <!-- form codepen -->
                             <div class="login-page">

                                 <div class="form">

                                     <form class="login-form" method="POST" action="update.php" id="update_article">
                                         <input name="id_inscription" type="number" value="3" hidden />
                                         <input name="Nom_Utilisateur" type="text" placeholder="Nom utilisateur" required/>
                                         <input name="email" type="text" placeholder="email" required/>
                                         <input name="Mot_de_passe" type="password" placeholder="Mot de passe" required/>
                                         <input name="Confirmez_Mot_de_passe" type="password" placeholder="Confirmez mot de passe" required/>
                                         <!-- <input name="categorie_update" type="number" placeholder="categorie" /> -->
                                         <!-- <textarea name="contenu_update" type="text" placeholder="contenu" ></textarea> -->
                                         <!-- <input name="date_update" type="date" placeholder="date" /> -->
                                         <!-- <input name="id_auteur_update" type="number" value="' . $_SESSION['id'] . '" hidden /> -->
                                     </form>

                                 </div>
                             </div>

                         </div>
                         <div class="modal-footer">
                             <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button> -->
                             <button form="inscription" type="submit" class="btn-modal">INSCRIPTION</button>
                         </div>
                     </div>
                 </div>
             </div>




         </nav>
     </header>
     <!-- Le reste de ton contenu de blog ici -->




     <!-- bootstrap -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
     <script src="script.js"></script>
 </body>

 </html>