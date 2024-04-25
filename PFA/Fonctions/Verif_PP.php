<?php

session_start();
// Inclure le fichier
require_once "Connect.php";
// Se connecter à la base de données
$db = connexionDB();

// Vérifier si le formulaire a bien été rempli
$id = $_SESSION["id"];
// Traitement
$req1="SELECT * from precom where id='$id';";//Verifying If The Player ALready Preordered The game
try{
    $resultat = $db->query($req1); // Exécuter la requêtes SQL
    if($resultat->rowCount()==0){
        header("location:../Full Story/Purchase Game/Preorder.php");
            die;
        }else{
            $error= "You Already Preordered The Game";
            $_SESSION['error'] = $error; // Set the value of $_SESSION['error']
            header("location:../Full Story/Revenge Coming Soon/Revenge.php");
        }
    }
catch(PDOException $e){
    echo $e->getMessage();
}

// Fermer la connexion avec la base de données
$db = null;

?>

	
