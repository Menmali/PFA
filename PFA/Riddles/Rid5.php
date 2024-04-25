<?php     
    include_once '../Fonctions/Ans.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Riddle 5</title>
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
			<form action="./Rid5.php" method="post">
		  <h2>Heated Riddle</h2>
		  <div class="new">
            <h4>Sometimes Simplicity Is The Key To Success.
            </h4>
            <p><center>Riddle Me This : I am not alive, but I grow. I don't have lungs, but I need air. I don't have a mouth, but water kills me. What am I?</center></p>
            <input placeholder="Answer" id="rd1"   name="ans" type="text"> <br>
            <input type="hidden" value="5" name="rid">
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
	  <p>Oxygen, heat, and fuel</p>
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