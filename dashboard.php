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
        <!-- Une table wow c'est impressionant -->
        <table>
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 


        <?php
            // On select les auteurs avec comme role 3
            $connexion = new MaConnexion("blog_jeux","","root","localhost");
            $afficher = $connexion->select_where_abonne("auteurs", "*", "3");

            // On les affiche
            foreach ($afficher as $ligne) {
                echo '
                    <tr>
                        <td><strong>' . $ligne['id_auteurs'] . '</strong></td>
                        <td>' . $ligne['nom'] . '</td>
                        <td>' . $ligne['email'] . '</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="custom-btn-del deletebut" data-bs-toggle="modal" data-bs-target="#delete' . $ligne['id_auteurs'] . '">
                                SUPPR
                            </button>
                        </td>
                    </tr>

                    <!-- Modal DELETE-->
                    <div class="modal fade" id="delete' . $ligne['id_auteurs'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer un contact</h1>
                                    <button type="button" class="btn-close button-3d" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="login">
                                        <p>Êtes-vous sûr de vouloir supprimer ' . $ligne['nom'] . ' ' . $ligne['email'] . '</p>
                                        <form id="formdelete' . $ligne['id_auteurs'] . '" action="delete.php" method="POST">
                                            <div class="mb-3">
                                                <input type="number" class="form-control" value="' . $ligne['id_auteurs'] . '" name="id" hidden>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary button-3d" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn colred button-3d" form="formdelete' . $ligne['id_auteurs'] . '">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }

        ?>
            </tbody>
        </table>
    </main>

    
<?php include ('footer.php'); ?>

<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- mon script -->
<script src="script.js"></script>
</body>
</html>