<?php 

require_once('../../Fonctions/login.php');
if(isset($_SESSION['id'])&& $_SESSION['id']!=""){
  header("location:../../");
} ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="../../css/Sign up.css">
</head>
<body>
    <header class="bar">
        <h1>Escape Room</h1>
        <nav>
        <div class="label">
            <ul>
                <li><a href="../../">Home</a></li>
                <li><a href="..\Sign_up\Signup.php">Sign Up</a></li>
            </ul>
        </div>
        </nav>
</header>
<p>.</p><p>.</p>
    <div class="login-box">
		<h2>Login</h2>
		<form name="f" action="Login.php" method="post">
		  <div class="user-box">
			<input type="text" name="name" id="name" value="<?php if(isset($_POST["name"])){echo $_POST["name"];} ?>" >
			<label>Username :</label>
		  </div>
		  <div class="user-box">
			<input type="password" name="pass"  >
			<label>Password :</label>
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
			<button type="submit" name="but" >Submit</button>
		  </div>
            <div class="last">
            <p>No Account ? <a href="..\Sign_up\Signup.php">Sign up</a></p>
            </div>
        </form>
	  </div>
</body>
</html>
