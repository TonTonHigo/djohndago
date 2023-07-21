<?php
// Vérifie si le formulaire a été soumis

    // Récupère les données du formulaire
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $contenu = $_POST["contenu"];

    // Connexion à la base de données
    $servername = "localhost"; // Remplacez par l'adresse de votre serveur MySQL
    $username = "root";
    $password = "";
    $dbname = "blog_jeux";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configuration pour afficher les erreurs MySQL
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prépare et exécute la requête pour insérer les données dans la table
        $sql = "INSERT INTO contacts (nom, email, contenu) VALUES (:nom, :email, :contenu)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->execute();

        // Redirige vers la page de confirmation (ou toute autre page de votre choix)
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        // En cas d'erreur, affiche le message d'erreur
        echo "Erreur : " . $e->getMessage();
    }

    // Ferme la connexion à la base de données
    $conn = null;

?>
