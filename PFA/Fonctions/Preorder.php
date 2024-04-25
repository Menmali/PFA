<?php
session_start();
// Inclure le fichier
require_once "Connect.php";
// Se connecter à la base de données
$db = connexionDB();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
$vcc="";
$card="";
}else{
$id="";
$vcc="";
$card="";
$date=date("Y-m-d H:i:s");
}




// Vérifier si le formulaire a bien été rempli
if(isset($_POST['but'])){
$id = $_POST["name"];
$card = $_POST["num"];
$vcc =(int)$_POST["cvv"];
$month =$_POST["month"];
$year=$_POST["years"];
$date=date("Y-m-d H:i:s");
//makesure
if(strlen($id)<5){
    $error="Username Minimun length : 5";
}
else if(strlen($card)<16 ){
    $error="Card Number Incorrect";
}
else if(strlen($vcc)!=3){
    $error="CVV Code Incorrect";
}else{

    $id = $db->quote($_POST["name"]);
    $card = $db->quote($_POST["num"]);

// Traitement
$req1="SELECT * from user where id=$id  ;";
try{
    $resultat = $db->query($req1); // Exécuter la requêtes SQL
    if($resultat->rowCount() == 1){
        $req2="SELECT * from cards where card_nb=$card AND id=$id  ;";
         $resultat2 = $db->query($req2);
            if($resultat2->rowCount()>0){
                $req0="SELECT * From precom where id=$id   ;";
                $res0=$db->query($req0);
                if($res0->rowCount()==0){
                $req3 = "INSERT INTO precom (id,card_nb,date) VALUES($id,$card,'$date');";
                $resultat3 = $db->query($req3);
                if($resultat3){
                    $succ="Preordering Has Been Succesfull .";
                }else{
                $error="Preorder Failed.";
                }
            }else{
                $error="You Already Preordered The Game";
            }

            }else{
                $error="Card Number Not Found.";
            }
    }else{
        $error="User Not Found.";
    }
}
catch(PDOException $e){
    echo $e->getMessage();
}
}
}
// Fermer la connexion avec la base de données
$db = null;
?>

	
