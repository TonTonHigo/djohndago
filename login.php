<?php
// require('./Maconnexion.php');
 
// if (!empty($_POST['nom']) && !empty($_POST['password'])) {
//     $email = $_POST['email'];
//     $password = $_POST['password'];
 
//     var_dump($email);
//     var_dump($password);
 
//     $q = $db->prepare('SELECT * FROM users WHERE email = :email');
//     $q->bindValue('nom', $nom);
//     $q->execute();
//     $res = $q->fetch(PDO::FETCH_ASSOC);
    
//     var_dump($res);
    
//     if ($res) {
//         $passwordHash = $res['password'];
//         if (password_verify($password, $passwordHash)) {
//             echo "Connexion réussie !";
//         } else {
//             echo "Identifiants invalides";
//         }
//     } else {
//         echo "Identifiants invalides";
//     }
// }