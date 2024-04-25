<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/home.css">
</head>
<body>
  <div class="wrapper"> 
<header class="site-header">
        <nav>
            <?php 
            //If The User is An Admin 
            if(isset($_SESSION["id"])&& $_SESSION["id"]=="Admin"){
                header("location:./Admin/");
            }elseif(isset($_SESSION["id"])&& $_SESSION["id"]!=""){
                //If we have a session available
            echo"<strong>Escape Room</strong> |";
            echo"<a href='./Full Story\Review\Rev.php'>Review Us</a>";
            echo"<a href='./Fonctions/Verif_P.php'>Purchase Game</a>";
            echo"<a href='./Fonctions/Verif.php'>Full Story</a>";
            echo"<a href='./Fonctions/Verif_T.php'>Trial</a>";
            echo"<a href='./Fonctions/Signout.php'>Sign Out</a>";
            }else{
                //If No Session is Available
                echo"<a><strong>Escape Room</strong></a> | ";
                echo"<a href='./Full Story/Login/Login.php'>Login</a>";
                echo"<a href='./Full Story/Sign_up/Signup.php'>Sign up</a>";
                echo"<a href='./Full Story/Login/Login.php'>Full Story</a>";
                echo"<a href='./Full Story/Login/Login.php'>Trial</a>";
            }
            ?>
       </nav>

</header>
<main>