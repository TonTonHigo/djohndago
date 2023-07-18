<?php include('Maconnexion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="inscription">

<!-- modale d'incription -->
    <!-- <div id="modal-inscription" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('inscription')">&times;</span>
            <div class="signup-form">
                <h2>Inscription</h2>
                <form> -->
                    <!-- ... Contenu du formulaire d'inscription ... -->

                    <div class="container">
                        <div class="signup-form">
                            <h2>Inscription</h2>
                            <form>
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" id="nom" name="nom" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="motdepasse">Mot de passe</label>
                                    <input type="password" id="motdepasse" name="motdepasse" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirmermotdepasse">Confirmer mot de passe</label>
                                    <input type="password" id="confirmermotdepasse" name="confirmermotdepasse" required>
                                </div>
                                <button type="submit">Inscription</button>
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