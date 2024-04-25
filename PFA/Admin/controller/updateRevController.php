<?php
    include_once "../config/dbconnect.php";
    $db=connexionDB();

    if(isset($_POST['but'])){
    $p=$_POST['Place'];
    $id=$_POST['id'];
    $email=$_POST['email'];
    $rev= $_POST['rev'];
    $rating= $_POST['rating'];
   
    $req="UPDATE review SET id=?, email=?, rating=?, review=? WHERE Place=?;";
    $stmt = $db->prepare($req);
    $stmt->execute([$id, $email, $rating, $rev, $p]);
    if($stmt){
        $succ="Review Updated ";
    }else{
        $error="Review Update Error";
    }
}
?>