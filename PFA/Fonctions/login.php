<?php
session_start();
// Inclure le fichier
require_once "Connect.php";
// Se connecter à la base de données
$db = connexionDB();
$id="";
if(isset($_SESSION['id']) && $_SESSION['id']==""){
$_SESSION['id']="";
}
// Vérifier si le formulaire a bien été rempli
if(isset($_POST['but'])){
    $id =$_POST["name"];
    $pass=$_POST["pass"];
    try{
        // Traitement
        $req00 = "SELECT * from ADMIN where Admin_n = :id";
        $stmt00 = $db->prepare($req00);
        $stmt00->execute(['id' => $id]);
        if($stmt00->rowCount()>0){
            $admin = $stmt00->fetch();
            $pass=crypt($_POST['pass'],"PFA");
            if($pass==$admin['Admin_P']){
                $_SESSION['id'] = "Admin";
                header("location:../../Admin/");
                exit;
            }
        }else{
        // Check if the user is a regular user
        $req1 = "SELECT * from user where id = :id";
        $stmt1 = $db->prepare($req1);
        $stmt1->execute(['id' => $id]);
        if($stmt1->rowCount()>0){
            $user = $stmt1->fetch();
            $pass=crypt($_POST['pass'],"PFA");
            if($pass==$user['pass']){
                $succ = "Connected";
                $_SESSION['id'] = $id;
                $_SESSION['page'] = "";
                header("location:../../");
                exit;
            }else{
                $error=" Password Is Incorrect.";    
            }
        }else{
            $error="User ID or Password Is Incorrect.";
        }
    }
}catch(PDOException $e){
    echo $e->getMessage();
}
}

// Fermer la connexion avec la base de données
$db = null;
?>

	
