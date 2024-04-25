<style> 
/* Container styles */
body{
  background-color: #3B3131; 
}
h4{
    color: green;
    font-size:25px;
}
.container {
    
  max-width: 800px;
  margin: 2% auto;
  padding: 20px;
  border-radius: 5px;
  background-color: white;
  box-shadow: 0 2px 4px rgba(0,0,0,.1);
}

/* Form styles */
.form-group {
  margin-bottom: 20px;
  display: block;

}
.form-group1 {
  gap:1%;
  margin-bottom: 20px;
  display :flex;
}
label {
  font-weight: bold;
}
input {
  display: block;
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
}
a{
    text-decoration: none;
    color:white;
    font-size:16px
}
button {
  padding: 10px 20px;
  font-size: 16px;
  color: #fff;
  background-color: #007bff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.succ{
  margin-bottom:1%;
  color: green;
  font-size: 18px;
}
.error{
  margin-bottom:1%;
  color:red ;
  font-size: 18px;
}

/* Responsive styles */
@media only screen and (max-width: 768px) {
  .container {
    max-width: 100%;
    padding: 10px;
  }
}

</style>

<div class="container p-5">
  <h4>Add Admin</h4>
  <?php
    include_once "../config/dbconnect.php";
    
        $id="";
        $mail="";
        $pass="";
        $cpass="";

        
    if(isset($_POST['but'])){
        $id=$_POST['id'];
        $mail= $_POST['mail'];
        $pass= $_POST['pass'];
        $cpass= $_POST['cpass'];
        
        function checkemail($str) {
            return (preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str));
        }
        function checkpass($str) {
            // Define the pattern for the password
            $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/";
        
            // Check if the password matches the pattern
            if (preg_match($pattern, $str)) {
                return true;
            } else {
                return false;
            }
        }
            if(strlen($id)<5){
                $error="Username Minimun length : 5";
            }
            else if (!(checkemail($mail))) {
                $error="Please enter a valid email address";
            }
            else if(!(checkpass($pass))){
                $error="your password is not strong enough";
            }
            else if($pass!=$cpass || $cpass!=$pass ){
                $error="passwords are not similar";
            }else{
            $db=connexionDB();
            $req="SELECT * FROM ADMIN WHERE Admin_n='$id' ;";
            $res=$db->query($req);
            if($res->rowCount() > 0) {
                $error="ID Already Used ";
            }else{
                $req1="SELECT * FROM ADMIN WHERE Admin_M='$mail' ;";
                $res1=$db->query($req1);
                if($res1->rowCount() > 0) {
                    $error="Mail Already Exists";
                }else{
                  $pass=crypt($_POST['pass'],"PFA");
                    $req3="INSERT INTO ADMIN(Admin_n,Admin_M,Admin_P) VALUES('$id','$mail','$pass');";
                    $res3 = $db->exec($req3);
                    if($res3){
                        $succ="Admin Added";
                    }else{
                        $error="Admin Failed To Add";
                    }
                }
            }
        }
    }else{
        $id="";
        $mail="";
        $pass="";
        $cpass="";
    }
  ?>
  <form id="update-Items" action="./AddAdminController.php" method="post" >
    <div class="form-group">
      <label for="id">ID :</label>    
      <input type="text" class="form-control" name="id" id="id" value="<?=$id?>" >
    </div>
    <div class="form-group">
      <label for="mail">Email :</label>
      <input type="text" class="form-control" id="mail" name="mail" value="<?=$mail ?>">
    </div>
    <div class="form-group">
      <label for="pass">Password :</label>
      <input type="password" class="form-control" id="pass" name="pass" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];} ?>">
    </div>
    <div class="form-group">
      <label for="cpass">Confirm Password :</label>
      <input type="password" class="form-control" id="cpass" name="cpass" value="<?=$cpass ?>">
    </div>
    
    <div> 
    <?php if (isset($succ)): ?>
            <div class="succ">
            <span><?php echo $succ;
            ?></span>
            </div>
            <?php endif ?>
        <?php if (isset($error)): ?>
            <div class="error">
            <span><?php echo $error;
             ?></span>
            </div>
            <?php endif ?>
            <?php $succ="";$error=""; ?>
    </div>
    <div class="form-group1">
        <button type="submit" style="height:40px" name="but" class="btn btn-primary">Add Admin</button></form>
        <form action="../index.php"><button type="submit" style="height:40px" class="btn btn-primary">Home</button></form>
    </div>
  
</div>
