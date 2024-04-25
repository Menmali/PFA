<?php 
    include_once './header.php';
?>
<div class="home-page">
    <div class="block">
        <h1>About This Game :</h1>
        <p class="intro">You were betrayed by an unknown friend who set you up after winning the jackpot, trapping you in a game of puzzles and riddles. Despite feeling taunted at every turn, you refused to give up and fought to escape with each new challenge.</p>
        <p></p>
        <?php if(isset($_SESSION["id"])){
            echo"<a href='./Fonctions/Verif.php' class='button' >Full Story</a> ";
            echo"<a href='./Fonctions/Verif_T.php' class='button' >Trial</a>";
            if(isset($_SESSION['error']) && $_SESSION['error'] != ""){
              echo"<div class='error-message'>";
              echo $_SESSION['error'];
              echo"</div>";
              $_SESSION['error'] = ""; // clear the error message from the session
          } 
        }else{
            echo"<a href='./Full Story/Login/Login.php' class='button' >Full Story</a>";
        }
        ?>
    </div>
    <div class="block">
        <img class="img1" name="img1" src="./Pics/es.jpg" alt="escape room pic">
    </div>
</div>
<?php 
    include_once './footer.php';
?>
