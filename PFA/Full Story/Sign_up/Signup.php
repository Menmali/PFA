<?php require_once("../../Fonctions/Signup.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="../..\css\Sign up.css">
</head>

<body>
    <header class="bar">
        <h1>Escape Room</h1>
        <nav>
        <div class="label">
            <ul>
                <li><a href="../../">Home</a></li>
                <li><a href="..\Login\Login.php">Log In</a></li>
                <li><a href=""></a></li>
            </ul>
        </div>
        </nav>
</header>

    <div class="login-box">
                <h2>Sign Up</h2>
                <form action="Signup.php" name="f" method="post">
                <div class="user-box">
                  <input type="text" name="id" id="id" value="<?php if(isset($_POST['id'])){echo $_POST['id'];} ?>" >
                  <label>Username</label>
                </div>
                <div class="user-box">
                  <input type="email" name="mail" id="mail" value="<?php if(isset($_POST['mail'])){echo$_POST['mail'];} ?>">
                  <label>Email</label>
                </div>
            <div class="user-box">
                <input type="number" name="age" id="age" value="<?php if(isset($_POST['age'])){echo $_POST['age'];} ?>"   >
                <label>Age :</label>
            </div>
            <div class="user-box">
              <input type="password" name="pass" id="pass1" >
			        <label>Password</label>
	      	  </div>
		     <div class="user-box">
          <input type="password" name="cpass1" id="cpass1">
          <label>Confirm Password</label>
		     </div>
          <div class="s">
              <?php if (isset($succ)): ?>
                <div class="success">
                <?php echo $succ; ?>
                </div>
              <?php endif ?>
              <?php if (isset($error)): ?>
                <div class="error">
                <?php echo $error; ?>
                </div>
              <?php endif ?>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <button type="submit" name="but" >Sign Up</button>
          </div>  
      </form>
        <div class="last">
          <p>Already Have an Account ? <a href="..\Login\Login.php">Login</a></p>
	      <div>
        </div>
</body>
</html>
