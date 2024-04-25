<?php     
    include_once '../../Fonctions/Ans.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Riddle 2</title>
	<link rel="stylesheet" href="../../css/a.css">
</head>
<body>
    <p hidden>c3B5eGZhbWlseQ==</p>
	<section class="showcase">
		<header>
		  <h2 class="logo" alt="URL">E.R.1</h2>
		  <div class="toggle"></div>
		</header>
		<video
		  src="./imagesvideos/vvvv.mp4"
		  muted
		  loop
		  autoplay
		></video>

		<div class="overlay"></div>
		<div class="text">
			<form action="./Rid2.php" method="post">
		  <h2>Find The Spy</h2>
		  <div class="new">
            <h3>the Main Details :</h3>
            <p>tall, short hair, blue eyes and light skin.
                he often wears a light green three-piece suit with a tie
            </p>
            <input placeholder="Answer" id="rd1" name="ans" type="text"> <br>
			<input type="hidden" value="1" name="v1">
            <input type="hidden" value="2" name="rid">
                <?php if (isset($error)): ?>
                <div class="error">
                <span><?php echo $error; ?></span>
                </div>
                <?php endif ?>
            <button type="submit" name="but">Submit</button>

			</form>
            <p class="cpr"></p><center>E.R.1 &copy 2023</center>
          </div>
          
		</div>
	  </section>
    
	
   <div class="menu">
	  <p>64Encoder is your Key to success</p>
	  </div>
	
</body>
<script>
	const menuToggle = document.querySelector(".toggle");
	const showcase = document.querySelector(".showcase");
	
	menuToggle.addEventListener("click", () => {
	  menuToggle.classList.toggle("active");
	  showcase.classList.toggle("active");
	});
</script>