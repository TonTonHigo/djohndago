<?php

use MaConnexion as GlobalMaConnexion;

 class MaConnexion{
    /*
    private $nomBaseDeDonnees = "";
    private $motDePasse = "";
    private $nomUtilisateur = "root";
    private $hote = "localhost";
    */
    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse , $nomUtilisateur , $hote){
        
        $this->nomBaseDeDonnees = $nomBaseDeDonnees;
        $this->motDePasse = $motDePasse;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->hote = $hote;
        
        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn,$this->nomUtilisateur, $this->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connexion reussi";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }



    public function select($table, $column){
        try {
            $requete = "SELECT $column from $table";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); //Recupere le resultat de la requete dans un tableau associatif
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }




    // On modifie juste le nom de la function ici "select" devient "select_articles_recents"
    public function select_articles_recents($table, $column){
        try {
            // On reparamètre notre requete SQL selon nos besoin
            // Ici on avait besoin de selectionné 3 articles récentes donc on rajoute ORDERBY BY 'nom_column' DESC pour mettre notre liste en ordre décroissant
            // Et ensuite LIMIT 3 pour limiter le nombre d'article selectionné à 3
            $requete = "SELECT $column from $table ORDER BY id_articles DESC LIMIT 3 ";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); //Recupere le resultat de la requete dans un tableau associatif
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }




        // On modifie juste le nom de la function ici "select" devient "select_articles_recents"
        public function select_articles_FPS($table, $column){
            try {
                // On reparamètre notre requete SQL selon nos besoin
                // Ici on avait besoin de selectionné 3 articles récentes donc on rajoute ORDERBY BY 'nom_column' DESC pour mettre notre liste en ordre décroissant
                // Et ensuite LIMIT 3 pour limiter le nombre d'article selectionné à 3
                $requete = "SELECT $column from $table WHERE categorie = 1 ORDER BY id_articles DESC LIMIT 3 ";
                $resultat = $this->connexionPDO->query($requete);
                $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); //Recupere le resultat de la requete dans un tableau associatif
                return $resultat;
            
            } catch (PDOException $e) {
                echo "Erreur : ".$e->getMessage();
            }    
        }

    public function select_where_articles($table, $column, $id) {
        try {
            $requete = "SELECT $column FROM $table WHERE id_articles = $id";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); // Fetch the result of the query into an associative array

            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }




    public function select_where_auteurs($table, $column, $id) {
        try {
            $requete = "SELECT $column FROM $table WHERE id_auteurs = $id";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); // Fetch the result of the query into an associative array

            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }



    public function select_where_abonne($table, $column, $id) {
        try {
            $requete = "SELECT $column FROM $table WHERE id_roles = $id";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); // Fetch the result of the query into an associative array

            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }



    public function select_where_commentaires($table, $column, $id) {
        try {
            $requete = "SELECT $column FROM $table WHERE id_articles = $id";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); // Fetch the result of the query into an associative array

            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }



    public function delete($cond){
        try {
            $requete = "DELETE FROM `articles` WHERE id_articles = ?";
            $resultat = $this->connexionPDO->prepare($requete);
            $resultat->bindValue(1, $cond);

            $resultat->execute();

            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }



    
    public function delete_com($cond){
        try {
            $requete = "DELETE FROM `commentaires` WHERE id_commentaires = ?";
            $resultat = $this->connexionPDO->prepare($requete);
            $resultat->bindValue(1, $cond);

            $resultat->execute();

            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
    
        
   

    public function insertionArticle_Secure( $image, $titre, $contenu, $categorie, $id_auteurs)
    {
        try {
            $requete = "INSERT INTO `articles`( image, titre, contenu, categorie, id_auteurs) VALUES (?, ?, ?, ?, ?)";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1, $image);
            $requete_preparee->bindValue(2, $titre);
            $requete_preparee->bindValue(3, $contenu);
            $requete_preparee->bindValue(4, $categorie);
            $requete_preparee->bindValue(5, $id_auteurs);

            $requete_preparee->execute();
            return "insertion reussie";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }



    










    public function miseAJourArticle_Secure($id_articles,$image,$titre,$contenu,$categorie)
    {
        try {
            $requete = "UPDATE `articles` SET image=?,titre=?,contenu=?,categorie=? WHERE id_articles=?";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            
            $requete_preparee->bindValue(1, $image);
            $requete_preparee->bindValue(2, $titre);
            $requete_preparee->bindValue(3, $contenu);
            $requete_preparee->bindValue(4, $categorie);
            $requete_preparee->bindValue(5, $id_articles);

            $requete_preparee->execute();
            return "mise à jour réussie";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function miseAJour($table,$column,$newValue,$id){
        try {
        $requete = "UPDATE $table set '$column' = $newValue ID_$table = '$id'";
        $this->connexionPDO->exec($requete);
        return "mise a jour reussi";
        } catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }

    }

    public function insert($Table, $Values , $Column)
    {
      try {
          $ToString = '"' . join('","', $Values) . '"'; //Transforme le tableau Values en chaine de character
          $ToString = str_replace('""', "NULL", $ToString); // Remplace les espaces vides du tableau en valeur NULL
          $ColumConv= '(' . join(',', $Column) . ')'; // Transforme le Array contenant les colonnes en un format propice a la requete SQL ( sans string et entre parenthese)
          
         
          $SQLQueryString = "INSERT INTO $Table $ColumConv VALUES ($ToString)";
    
          $Result = $this->connexionPDO->query($SQLQueryString);
          return true;
    
      } catch (PDOException $e) {
          echo "Erreur: " . $e->getMessage();
          
          return false;
      }
    }

    public function insertionInscription($id_roles, $nom, $email, $mdp)
    {
        try {
            $requete = "INSERT INTO `auteurs`(id_roles, nom, email, mdp) VALUES ( ?, ?, ?, ?)";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1, $id_roles);
            $requete_preparee->bindValue(2, $nom);
            $requete_preparee->bindValue(3, $email);
            $requete_preparee->bindValue(4, $mdp);

            $requete_preparee->execute();
            return "insertion reussie";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function insertionCommentaire($contenu, $id_articles, $id_auteurs)
    {
        try {
            $requete = "INSERT INTO `commentaires`(contenu, id_articles, id_auteurs) VALUES ( ?, ?, ?)";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1, $contenu);
            $requete_preparee->bindValue(2, $id_articles);
            $requete_preparee->bindValue(3, $id_auteurs);

            $requete_preparee->execute();
            return "insertion reussie";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}



//  $test = new MaConnexion("blog_jeux","","root","localhost");
 

?>