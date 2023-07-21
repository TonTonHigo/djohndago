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

    public function delete($table, $cond){
        try {
            $requete = "DELETE FROM $table WHERE id_articles = $cond";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); //Recupere le resultat de la requete dans un tableau associatif
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
    
        
   

    public function insertionArticle_Secure($id_articles,$image,$titre,$contenu,$date_publication,$categorie,$id_auteurs)
    {
        try {
            $requete = "INSERT INTO articles ($image,$titre,$contenu,$date_publication,$categorie,$id_auteurs) VALUES (:image, :titre, :contenu, :date_publication, :categorie, :id_auteurs)";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':image', $image, PDO::PARAM_STR, 25);
            $requete_preparee->bindParam(':titre', $titre, PDO::PARAM_STR, 25);
            $requete_preparee->bindParam(':contenu', $contenu, PDO::PARAM_INT, 25);
            $requete_preparee->bindParam(':date_publication', $date_publication, PDO::PARAM_INT, 25);
            $requete_preparee->bindParam(':categorie', $categorie, PDO::PARAM_INT, 25);
            $requete_preparee->bindParam(':id_auteurs', $id_auteurs, PDO::PARAM_INT, 25);

            $requete_preparee->execute();
            return "insertion reussie";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function miseAJourArticle_Secure($id_articles,$image,$titre,$contenu,$date_publication,$categorie,$id_auteurs)
    {
        try {
            $requete = "UPDATE `articles` SET image=?,titre=?,contenu=?,date_publication=?,categorie=?,id_auteurs=? WHERE id_articles=?";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            
            $requete_preparee->bindValue(1, $image, PDO::PARAM_INT);
            $requete_preparee->bindValue(2, $titre, PDO::PARAM_STR);
            $requete_preparee->bindValue(3, $contenu, PDO::PARAM_INT);
            $requete_preparee->bindValue(4, $date_publication, PDO::PARAM_STR);
            $requete_preparee->bindValue(5, $categorie, PDO::PARAM_INT);
            $requete_preparee->bindValue(6, $id_auteurs, PDO::PARAM_STR);
            $requete_preparee->bindValue(7, $id_articles, PDO::PARAM_STR);

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
 }

//  $test = new MaConnexion("blog_jeux","","root","localhost");
 

?>