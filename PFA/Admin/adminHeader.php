<?php
   session_start();
   if(isset($_SESSION['id'])){
    if($_SESSION['id']!="Admin"){
        header("location:../");      
    } 
   }else{
    header("location:../");
   }
   include_once "./config/dbconnect.php";

?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/logo.png" width="80" height="80" alt="Admin Panel">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <a href="../Fonctions/Signout.php" style="text-decoration:none;">
        <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
    </a>
    </div>  
</nav>
