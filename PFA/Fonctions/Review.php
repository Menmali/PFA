<?php
// Inclure le fichier
require_once "Connect.php";
// Se connecter à la base de données
$db = connexionDB();

if($_SESSION['id']!=""){
    $id=$_SESSION['id'];
    $req00="SELECT * from user where id='$id';";
    $res00=$db->query($req00);
    if($res00->rowCount() > 0) {
        $row1 = $res00->fetch(PDO::FETCH_ASSOC);
        $id=$row1['id'];
        $mail=$row1['email'];
        $rate="5";
    }
}else{
$id="";
$mail="";
$rate="5";
$rev="";
}



// Vérifier si le formulaire a bien été rempli
if(isset($_POST['but'])){
$id=$_POST["name"];
$mail=$_POST["mail"];    
$rate=$_POST["rate"];
$rev=$db->quote($_POST["rev"]);

//Making Sure
function checkemail($str) {
    return (preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

if(strlen($id)<5){
    $error="Name Should Be Minimum 6 Characters";
}elseif(checkemail($mail)) {
    $error = "Invalid email format";
}elseif(strlen($rev)<=2){
    $error="Please Write A Review";
}else{





// Traitement
$req1="SELECT * from user where id='$id';";
try{
    $resultat = $db->query($req1); // Exécuter la requêtes SQL
            if($resultat->rowCount()>0){             
                $req2="SELECT * FROM user WHERE  id='$id' AND email='$mail' ;";
                $resultat2=$db->query($req2);
                if($resultat2->rowCount()>0){
                    $req00="SELECT * FROM review WHERE id='$id'";
                    $res00=$db->query($req00);
                    if($res00->rowCount()>0){
                        $req01=" UPDATE review SET rating=$rate, review=$rev where id='$id' ;";
                        $resultat01 = $db->exec($req01);
                        if($resultat01){
                            $succ="Review Updated Succesfully";
                        }else{
                            $error="Review Failed To Update";
                        }
                        
                    }else{

                        $req3=" INSERT INTO review (id,email,rating,review) VALUES ('$id','$mail','$rate',$rev) ;";
                        $resultat3 = $db->exec($req3);
                        if($resultat3){
                            $succ="Review Added Succesfully";
                            
                        }else{
                            $error="Review Failed To Add";
                        }
                    }
                }else{
                    $error="Mail Invalid . ";
                }
            }else{
                $error="User ID Doesn't Exist";
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

	
