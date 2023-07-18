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
            echo "Connexion reussi";
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

    public function delete($table, $id, $cond){
        try {
            $requete = "DELETE FROM $table WHERE $id = $cond";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC); //Recupere le resultat de la requete dans un tableau associatif
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
    
    public function insertClient($Nom,$Adresse,$AdresseEmail){
        $sql = "INSERT INTO client (Nom,Adresse,AdresseEmail) VALUES (?,?,?)";
        $stmt= $this->connexionPDO->prepare($sql);
        $stmt->execute([$Nom, $Adresse, $AdresseEmail]);
    }

    public function insertionProduit_Secure($nom, $prix, $description, $stock)
    {
        try {
            $requete = "INSERT INTO produits (nom, prix, description, stock) VALUES (:nom, :prix, :description, :stock)";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':nom', $nom, PDO::PARAM_STR, 25);
            $requete_preparee->bindParam(':prix', $prix, PDO::PARAM_STR, 25);
            $requete_preparee->bindParam(':description', $description, PDO::PARAM_STR, 25);
            $requete_preparee->bindParam(':stock', $stock, PDO::PARAM_INT, 25);

            $requete_preparee->execute();
            return "insertion reussie";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function miseAJourProduit_Secure($nom, $prix, $description, $id)
    {
        try {
            $requete = "UPDATE produits SET nom  = ?, prix  = ?, description  = ? WHERE id_produits = ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1, $nom, PDO::PARAM_STR);
            $requete_preparee->bindValue(2, $prix, PDO::PARAM_INT);
            $requete_preparee->bindValue(3, $description, PDO::PARAM_STR);
            $requete_preparee->bindValue(4, $id, PDO::PARAM_INT);

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

 $test = new MaConnexion("blog_jeux","","root","localhost");
 

?>