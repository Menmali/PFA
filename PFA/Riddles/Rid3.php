<?php     
    include_once '../Fonctions/Ans.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Riddle 3</title>
	<link rel="stylesheet" href="../css\a.css">
</head>
<body>
	<section class="showcase">
		<header>
		  <h2 class="logo" alt="URL">E.R.1</h2>
		  <div class="toggle"></div>
		</header>
		<div class="overlay"></div>
		<div class="text">
			<form action="./Rid3.php" method="post">
		  <h2>Keep Quiet</h2>
		  <div class="new">
            <h4>What is so fragile that saying its name breaks it?</h4>
            <br>
            <input placeholder="Answer" id="rd1"   name="ans" type="text"> <br>
            <input type="hidden" value="3" name="rid">
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
    <p>Lao Tzu Source of Strength</p>
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