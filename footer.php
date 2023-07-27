
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOTER</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="FOOTER">

    <div class="footer">
        <div class="contact">
            <!-- Formulaire de contact -->
            <h2>Contact</h2>
            <form action="submit_form.php" method="post">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="email" name="email" placeholder="Email" required>
                <textarea name="contenu" placeholder="Message" required></textarea>
                <button type="submit">Envoyer</button>
            </form>

        </div>
        <hr>
        <div class="social">
            <!-- Liens vers les réseaux sociaux -->
            <h2>Réseaux sociaux</h2>
            <ul>
                <li><a href="lien_vers_facebook" target="_blank"><i class="fa-brands fa-twitter" style="color: #ffffff;"></i>TWITTER</a></li>
                <li><a href="lien_vers_twitter" target="_blank"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i>INSTAGRAM</a></li>
                <li><a href="lien_vers_youtube" target="_blank"><i class="fa-brands fa-facebook" style="color: #ffffff;"></i>FACEBOOK</a></li>
                <li><a href="lien_vers_instagram" target="_blank"><i class="fa-brands fa-youtube" style="color: #ffffff;"></i>YOUTUBE</a></li>
            </ul>
        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>