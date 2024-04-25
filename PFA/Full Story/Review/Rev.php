<?php 
session_start();
$id=$_SESSION['id'];
include('../../Fonctions/Review.php') 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Review Form</title>
	<link rel="stylesheet" href="../..\css\Rev.css">
</head>
<body>
    <header class="bar">
        <h1>Escape Room</h1>
        <nav>
        <div class="label">
            <ul>
                <li><a href="../../">Home</a></li>
                <li><a href="../Login/Login.php">Log In</a></li>
                <li><a href="../../Fonctions/Signout.php">Sign Out</a></li>
            </ul>
        </div>
        </nav>
</header>


<div id="contact-form">
	<div>
		<h1>We Hope That You Enjoyed Our Game</h1> 
		<h4>Tell us your Own Review </h4> 
	</div>
		   <form method="post" action="Rev.php" name="f">
			<div>
		      <label for="name">
		      	<span class="required">ID : </span> 
		      	<input type="text" id="name" name="name" value="<?php if($id!=""){echo $id;} ?>" placeholder="Name Or ID" tabindex="1" autofocus="autofocus" readonly />
		      </label> 
			</div>
			<div>
		      <label for="email">
		      	<span class="required">Email : . </span>
		      	<input type="email" id="email" name="mail" value="<?php if($mail!=""){echo $mail;} ?>" placeholder="Your Email" tabindex="2"  readonly/>
		      </label>  
			</div>
			<div>		          
		      <label for="Rating">
		      <span>Rating : </span>
			      <select id="Rating" name="rate" tabindex="4">   
				  	<option value="1" <?php if($rate==1) echo"selected"; ?>> 1 Star </option>
						<option value="2" <?php if($rate==2) echo"selected"; ?>> 2 Stars </option>
						<option value="3" <?php if($rate==3) echo"selected"; ?>> 3 Stars </option>
						<option value="4" <?php if($rate==4) echo"selected"; ?>> 4 Stars </option>
						<option value="5" <?php if($rate==5) echo"selected"; ?>> 5 Stars </option>
                    </option>
			      </select>
		      </label>
			</div>
			<div>		          
		      <label for="Review">
		      	<span class="required">Review: </span> 
		      	<textarea id="message" name="rev" value="<?php if(isset($_POST['rev'])){echo $_POST['rev'] ;} ?>" placeholder="Please write your Review here." tabindex="5"></textarea> 
		      </label>  
			</div>
			<div>		           
		    <div class="last">
            <?php if (isset($succ)): ?>
                 <div class="success">
                <span><?php echo $succ; ?></span>
                </div>
            <?php endif ?>
            </div>
            <div class="last">
                <?php if (isset($error)): ?>
                        <div class="error">
                        <span><?php echo $error; ?></span>
                        </div>
            <?php endif ?>
            </div>
            <button name="but" type="submit" id="submit" >SEND</button> 
			</div>
            
		   </form>

	</div>
</body>
</html>
