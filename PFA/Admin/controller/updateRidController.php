<?php
include_once "../config/dbconnect.php";

$db=connexionDB();
if(isset($_POST['but'])){
    $tit=$_POST['tit'];
    $desc= $_POST['desc'];
    $rid= $_POST['rid'];
    $ans= $_POST['ans'];
    $cn= $_POST['cn'];

    $req="UPDATE riddles SET title=?, Description=?, riddle=?, ans=?, chapter_nb=? WHERE title=?;";
    $stmt = $db->prepare($req);
    $stmt->execute([$tit, $desc, $rid, $ans, $cn, $tit]);
    if($stmt){
        $succ="Update Completed";
    }else{
        $error="Update Error";
    }
}
?>
