<?php include('Maconnexion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNEXION</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="connexion">


    <!-- Modal de Connexion -->
    <!-- <div id="modal-connexion" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('connexion')">&times;</span>
            <div class="login-form">
                <h2>Connexion</h2>
                <form> -->
                    <!-- ... Contenu du formulaire de connexion ... -->

                    <div class="container">
                        <div class="login-form">
                            <h2>Connexion</h2>
                            <form>
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" id="nom" name="nom" required>
                                </div>
                                <div class="form-group">
                                    <label for="motdepasse">Mot de passe</label>
                                    <input type="password" id="motdepasse" name="motdepasse" required>
                                </div>
                                <button type="submit">Connexion</button>
                            </form>
                        </div>
                    </div>

                <!-- </form>
            </div>
        </div>
    </div> -->

    <script src="script.js"></script>
</body>

</html>