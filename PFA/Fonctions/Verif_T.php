<?php

session_start();
// Inclure le fichier
require_once "Connect.php";
// Se connecter à la base de données
$db = connexionDB();

// Vérifier si le formulaire a bien été rempli
$id = $_SESSION["id"];
// Traitement
$req1="SELECT * from guest where id='$id';";
try{
    $resultat = $db->query($req1); // Exécuter la requêtes SQL
    if($resultat->rowCount()>0){
        $row = $resultat->fetch(PDO::FETCH_ASSOC);  
        if($row["Trial"]=="N"){
            header("location:../Free To Play/Chap 0/Chap0.html");
            die;
        }else{
            $error="You Have Already Played The Trial";
            $_SESSION['error'] = $error; // Set the value of $_SESSION['error']
            header("location:../");
        }
    }
}
catch(PDOException $e){
    echo $e->getMessage();
}

// Fermer la connexion avec la base de données
$db = null;
?>

	
