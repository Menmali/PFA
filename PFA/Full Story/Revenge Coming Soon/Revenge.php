<?php
      session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="../..\css\Revenge.css">
</head>
<body>
  <div class="container">
    <header>
      <div class="logoOption">
        <div class="logo">E.R.1</div>
        <ul>
          <li><a href="../../">Home</a></li>
          <li><a href="../Review/Rev.php">Review Us</a></li>
          <li><a href="../../Fonctions/Signout.php">Sign out</a></li>
        </ul>
      </div>
      
    </header>
    
    
    <div class="content">
      <div class="info">
        <h1>The Revenge : Coming soon </h1>
        <p>After Escaping The Escape Room you are Filled with undying Rage. It's Time To Get Back At those who Betrayed You.</p>
        
        <a href="../../Fonctions/Verif_PP.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
          PreOrder</a>
          <div>
      <?php
      if(isset($_SESSION['id'])){
        if(isset($_SESSION['error'])){
          echo"<div class='error-message'>";
          echo $_SESSION['error'];
          echo"</div>";
          $_SESSION['error'] = ""; // clear the error message from the session
        }
      }
      ?>
      </div>
      </div>
      
      <div class="imageContainer">
       <img src="../..\Pics\es.jpg" alt="Revenge" border="0">
      </div>
    </div>
    
    
    <div class="subContainer">
  </div>
  </div>
  


    
</body>
</html>
