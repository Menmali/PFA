<?php
// Inclure le fichier
session_start();
require_once "Connect.php";
// Se connecter à la base de données
$db = connexionDB();
$id="";
$mail="";
$age="";
$pass="";
$cpass="";


// Vérifier si le formulaire a bien été rempli
if(isset($_POST['but'])){
$id=$_POST["id"];
$mail=$_POST["mail"];
$age=$_POST["age"];
$pass=$_POST["pass"];
$cpass=$_POST["cpass1"];

//makesure
function checkemail($str) {
    return (preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str));
}
function checkpass($str) {
    // Define the pattern for the password
    $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/";

    // Check if the password matches the pattern
    if (preg_match($pattern, $str)) {
        return true;
    } else {
        return false;
    }
}

    
   
    if(strlen($id)<5){
        $error="Username Minimun length : 5";
    }
    else if (!(checkemail($mail))) {
        $error="Please enter a valid email address";
    }
    else if($age<10 || $age>80){
        $error="age not acceptable";
    }
    else if(!(checkpass($pass))){
        $error="your password is not strong enough";
    }
    else if($pass!=$cpass){
        $error="passwords are not similar";
    }else{

// Traitement
$id=$db->quote($_POST["id"]);
$mail=$db->quote($_POST["mail"]);
$pass = crypt($pass,"PFA");
$cpass=$db->quote($_POST["cpass1"]);
$req1="SELECT * from user where id=$id  ;";
try{
    $resultat = $db->query($req1); // Exécuter la requêtes SQL
    if($resultat->rowCount()==0){
        $req00 = "SELECT * from ADMIN where Admin_n =$id ;";
        $res00=$db->query($req00);
        if($res00->rowCount()==0){
            $req2="SELECT * from user where email=$mail;";
            $resultat2 = $db->query($req2);
            if($resultat2->rowCount()==0){
                //Inserting Into User And Guest A new User
                $req3="INSERT INTO user(id,email,age,pass) VALUES($id,$mail,$age,'$pass');
                    INSERT INTO guest(id,email,age,pass,Trial) VALUES($id,$mail,$age,'$pass','N');";
                $resultat3 = $db->exec($req3);
                if($resultat3){
                    $succ="Account Added";
                    $_SESSION['id']=$_POST["id"];
                    $_SESSION['page']="";
                    header("location:../../index.php");
                    die;
                }else{
                    $error="Sign Up Failed";
                }
            }else{
                $error=" Email Already Exists.";
            }
        }else{
            $error="User ID Already Exists.";
        }      
    }else{
        $error="User ID Already Exists.";
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

	
