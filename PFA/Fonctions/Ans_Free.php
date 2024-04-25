<?php
// Inclure le fichier
session_start();
require_once "Connect.php";
// Se connecter à la base de données
$db = connexionDB();
$ans="";



// Vérifier si le formulaire a bien été rempli
if(isset($_POST['but'])){

    $ans=$_POST["ans"];
    $rid=$_POST["rid"];
    $ans=strtoupper($ans);


    if($rid==1){
        if ($ans==""){
            $error="Enter An Answer";
        }else{
    // Traitement
        if($ans!="Y"){
            $error="Incorrect Answer !!";
        }else{
            header("location:../../Fonctions/Verif_T.php");
        }
    }

    }
}    
// Fermer la connexion avec la base de données
$db = null;
?>

	
