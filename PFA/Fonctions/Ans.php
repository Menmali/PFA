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
            header("location:../Chapters/Chap2.html");
        }
    }

    }elseif($rid==2){
        $v1=$_POST["v1"];
        if ($ans==""){
            $error="Enter An Answer";
        }else{
    // Traitement
        if($ans!="LOID FORGER"){
            $error="Incorrect Answer !!";
        }else{
          if($v1==1){
            header("location:../../Fonctions/End.php");
          }else{
            header("location:../Chapters/chap3.html");
          }
        }
    }
    }elseif($rid==3){
        if ($ans==""){
            $error="Enter An Answer";
        }else{
        // Traitement
            if($ans!="SILENCE"){
                $error="Incorrect Answer !!";
            }else{
                header("location:../Chapters/Chap4.html");
            }
        }
    }elseif($rid==4){
        if ($ans==""){
            $error="Enter An Answer";
        }else{
        // Traitement
            if($ans!="YGOLOHCYSP"){
                $error="Incorrect Answer !!";
            }else{
                header("location:../Chapters/chap5.html");
            }
        }
        
    }elseif($rid==5){
        if ($ans==""){
            $error="Enter An Answer";
        }else{
        // Traitement
            if($ans!="FIRE"){
                $error="Incorrect Answer !!";
            }else{
                header("location:../Chapters/Ending.html");
            }
        }

    }
}    
// Fermer la connexion avec la base de données
$db = null;
?>

	
