<?php
session_start();
// Assurez-vous que le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["Nom"];
    $motdepasse = $_POST["Mot_de_passe"];

    // Connexion à la base de données (remplacez les paramètres avec vos informations de connexion)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog_jeux";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configuration pour afficher les erreurs MySQL
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour vérifier les informations de connexion dans la base de données
        $sql = "SELECT * FROM auteurs WHERE Nom = :nom AND mdp = :motdepasse";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':motdepasse', $motdepasse);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // L'utilisateur est connecté avec succès
            // Vous pouvez ajouter ici les actions à effectuer après la connexion réussie (par exemple, rediriger vers une page d'accueil)

            // Exemple de redirection vers la page d'accueil
            header("Location: blog.php");
            exit();
        } else {
            // Les informations de connexion sont invalides, afficher un message d'erreur ou rediriger vers la page de connexion avec un message d'erreur
            echo "Identifiants invalides. Veuillez réessayer .";
        }
    } catch (PDOException $e) {
        // En cas d'erreur, affiche le message d'erreur
        echo "Erreur : " . $e->getMessage();
    }

    // Ferme la connexion à la base de données
    $conn = null;
}
?>
