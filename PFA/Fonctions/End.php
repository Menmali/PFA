<?php

session_start();
// Inclure le fichier
require_once "Connect.php";
// Se connecter à la base de données
$db = connexionDB();
$id=$_SESSION['id'];


// Traitement
$req1="UPDATE guest SET Trial='Y' Where id='$id' ;";
try{
    $resultat = $db->query($req1); // Exécuter la requêtes SQL
    if($resultat){
        header("location:../Free To Play/End Of Trial/EndofTrial.php");
        die;
    }
}
catch(PDOException $e){
    echo $e->getMessage();
}
    
// Fermer la connexion avec la base de données
$db = null;
?>

	
