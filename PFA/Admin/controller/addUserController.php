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
  <h4>Add User</h4>
  <?php
    include_once "../config/dbconnect.php";
    
        $id="";
        $mail="";
        $age="";
        $pass="";
        $cpass="";
        $cn="";
        $vcc="";

        
    if(isset($_POST['but'])){
        $id=$_POST['id'];
        $mail= $_POST['mail'];
        $age= $_POST['age'];
        $pass= $_POST['pass'];
        $cpass= $_POST['cpass'];
        $vcc= $_POST['vcc'];
        $cn= $_POST['cn'];
        
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
            else if($age<10 || $age>80){
                $error="age not acceptable";
            }
            else if(!(checkpass($pass))){
                $error="your password is not strong enough";
            }
            else if($pass!=$cpass){
                $error="passwords are not similar";
            }elseif(($cn=="") && ($vcc!="")){
                    $error="You need To Enter Card Number Before VCC";
            }elseif(($cn!="")&&(($vcc=="")||(strlen($vcc)!=3))){
                $error="VCC Wrong";     
            }elseif(($cn!="")&&(strlen($cn)<16)){
                $error="Card Number Wrong";     
            }else{
            $db=connexionDB();
            $req="SELECT * FROM user WHERE id='$id' ;";
            $res=$db->query($req);
            if($res->rowCount() > 0) {
                $error="ID Already Used ";
            }else{
                $req1="SELECT * FROM user WHERE email='$mail' ;";
                $res1=$db->query($req1);
                if($res1->rowCount() > 0) {
                    $error="Mail Already Exists";
                }else{
                    if($cn==""){
                      $pass=crypt($_POST['pass'],"PFA");
                        $req3="INSERT INTO user(id,email,age,pass) VALUES('$id','$mail',$age,'$pass');
                            INSERT INTO guest(id,email,age,pass,Trial) VALUES('$id','$mail',$age,'$pass','N');";
                        $res3 = $db->exec($req3);
                        if($res3){
                            $succ="User Added";
                        }else{
                            $error="User Failed To Add";
                        }
                    }else{
                        $Date=date("Y-m-d H:i:s");
                        $pass=crypt($_POST['pass'],"PFA");
                        $req4="INSERT INTO user(id,email,age,pass,card,date,vcc) VALUES('$id','$mail',$age,'$pass',$cn,'$Date',$vcc);
                            INSERT INTO guest(id,email,age,pass,Trial) VALUES('$id','$mail',$age,'$pass','N');";
                        $res4=$db->exec($req4);
                        if($res4){
                            $succ="User Added";
                        }else{
                            $error="User Failed To Add";
                        }    
                }
                }
            }
        }
    }else{
        $id="";
        $mail="";
        $age="";
        $pass="";
        $cpass="";
        $cn="";
        $vcc="";
    }
  ?>
  <form id="update-Items" action="./addUserController.php" method="post" >
    <div class="form-group">
      <label for="id">ID :</label>    
      <input type="text" class="form-control" name="id" id="id" value="<?=$id?>" >
    </div>
    <div class="form-group">
      <label for="mail">Email :</label>
      <input type="text" class="form-control" id="mail" name="mail" value="<?=$mail ?>">
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="tel" class="form-control" id="age" name="age" value="<?=$age ?>">
    </div>
    <div class="form-group">
      <label for="pass">Password :</label>
      <input type="password" class="form-control" id="pass" name="pass" value="<?=$pass ?>">
    </div>
    <div class="form-group">
      <label for="cpass">Confirm Password :</label>
      <input type="password" class="form-control" id="cpass" name="cpass" value="<?=$cpass ?>">
    </div>
    <div class="form-group">
      <label for="cn">Card Number :</label>
      <input type="number" class="form-control" id="cn" name="cn" value="<?=$cn ?>">
    </div>
    <div class="form-group">
      <label for="vcc">VCC :</label>
      <input type="number" class="form-control" id="vcc" name="vcc" value="<?=$vcc ?>">
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
        <button type="submit" style="height:40px" name="but" class="btn btn-primary">Add User</button></form>
        <form action="../index.php"><button type="submit" style="height:40px" class="btn btn-primary">Home</button></form>
    </div>
  
</div>
