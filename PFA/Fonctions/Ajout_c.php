<?php
// Inclure le fichier

require_once "Connect.php";

session_start();
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
}


// Vérifier si le formulaire a bien été rempli
if(isset($_POST['but'])){
$id2=$_POST['name'];
$card = $_POST["num"];
$vcc =(int)$_POST["cvv"];
$month =$_POST["month"];
$year=$_POST["years"];
$date=date("Y-m-d H:i:s");
    


//makesure
if($id==""){
    $error="Write Your Username ";
}elseif($id!=$id){
    $error="Username Wrong";
}
else if(strlen($card)<16 ){
    $error="Card Number Incorrect";
}
else if(strlen($vcc)!=3){
    $error="CVV Code Incorrect";
}else{

    $id = $db->quote($_POST["name"]);
    $card = $db->quote($_POST["num"]);
    $vcc = $db->quote($_POST["cvv"]);
// Traitement
$req1="Select * from user where id=$id  ;";
try{
    $resultat = $db->query($req1); // Exécuter la requêtes SQL
    if($resultat->rowCount() == 1){
        $row = $resultat->fetch(PDO::FETCH_ASSOC);
        if($row["card"] ==""){
        $req2 = "UPDATE user SET card=$card, vcc=$vcc, date='$date' WHERE id=$id;";
         $resultat2 = $db->query($req2);
            if($resultat2){
                $succ="Game Has Been Purchased Succesfully.";
                $req3 = "Select * from cards where id=$id ;";
                $resultat3 = $db->query($req3);
                    if($resultat3->rowCount() == 1){
                        $req4 = "UPDATE cards SET card_nb=$card, year=$year WHERE id=$id ;";
                        $resultat4 = $db->query($req3);
                        
                    }else{
                        $req5 = "INSERT INTO cards (id,card_nb,year) VALUES($id,$card,$year);";
                        $resultat5 = $db->query($req5); 
                          
                    }
            }else{
                $error="Game Purchase Failed.";
            }
        }else{
            $error="You Already Purchased The Game";
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

	
