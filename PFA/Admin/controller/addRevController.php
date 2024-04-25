<style> 
/* Container styles */
body{
  background-color: #3B3131; 
}
.container {

  max-width: 800px;
  margin: 2% auto;
  padding: 20px;
  border-radius: 5px;
  background-color: white;
  box-shadow: 0 2px 4px rgba(0,0,0,.1);
}

h4{
  color: green;
  font-size:20px;
}
a{
    text-decoration: none;
    color:white;
    font-size:16px
}
/* Form styles */
.form-group {
  margin-bottom: 20px;
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
.form-group1 {
    gap:1%;
  margin-bottom: 20px;
  display :flex;
}
button[type="submit"] {
  padding: 10px 20px;
  font-size: 16px;
  color: #fff;
  background-color: #007bff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
select{
  display: block;
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
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
  <h4>Add Review</h4>
  <?php
    include_once "../config/dbconnect.php";
    $db=connexionDB();
    if(isset($_POST['id'])){
        $id=$_POST['id']; 
        $mail=$_POST['mail'];
        $rating=$_POST['rating'];
        $rev=$_POST['rev'];
        function checkemail($str) {
            return (preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
        }
        
        if(strlen($id)<5){
            $error="Name Should Be Minimum 6 Characters";
        }elseif(checkemail($mail)) {
            $error = "Invalid email format";
        }elseif(strlen($rev)==0){
            $error="Please Write A Review";
        }else{
            $req1="SELECT * from user where id='$id';";
            $resultat = $db->query($req1); // Exécuter la requêtes SQL
            if($resultat->rowCount()>0){             
                $req2="SELECT * FROM user WHERE  id='$id' AND email='$mail' ;";
                $resultat2=$db->query($req2);
                if($resultat2->rowCount()>0){
                  $req00="SELECT * FROM review WHERE id='$id'";
                  $res00=$db->query($req00);
                  if($res00->rowCount()>0){
                      $req01=" UPDATE review SET rating=$rating, review='$rev' where id='$id' ;";
                      $resultat01 = $db->exec($req01);
                      if($resultat01){
                          $succ="Review Updated Succesfully";
                      }else{
                          $error="Review Failed To Update";
                      }
                      
                  }else{

                      $req3=" INSERT INTO review (id,email,rating,review) VALUES ('$id','$mail',$rating,'$rev') ;";
                      $resultat3 = $db->exec($req3);
                      if($resultat3){
                          $succ="Review Added Succesfully";
                          
                      }else{
                          $error="Review Failed To Add";
                      }
                  }
                }else{
                    $error="Mail Invalid . ";
                }
            }else{
                $error="User ID Doesn't Exist";
            }
        }
    }else{
      $id="";
      $mail="";
      $rating="";
      $rev="";
    }

  ?>
  <form id="update-Items" action="./addRevController.php" method="post" >
    <div class="form-group">
      <label for="id">ID :</label>    
      <input type="text" class="form-control" name="id" id="id" value="<?=$id?>" >
    </div>
    <div class="form-group">
      <label for="mail">Email :</label>
      <input type="text" class="form-control" id="mail" name="mail" value="<?=$mail ?>">
    </div>
    <div class="form-group">
      <label for="rate">Rating:</label>
      <select id="rate" name="rating" tabindex="4">   
        <option value="1" > 1 Star </option>
        <option value="2" > 2 Stars </option>
        <option value="3" > 3 Stars </option>
        <option value="4" > 4 Stars </option>
        <option value="5" selected > 5 Stars </option>
			</select>
    </div>
    <div class="form-group">
      <label for="rev">Review :</label>
      <input type="TEXT " class="form-control" id="rev" name="rev" value="<?=$rev ?>">
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
      <span><?php echo $error; ?></span>
      </div>
    <?php endif ?>
    </div>
    <div class="form-group1">
      <button type="submit" style="height:40px" name="but" class="btn btn-primary">Add Review</button></form>
        <form action="../index.php"><button type="submit" style="height:40px" class="btn btn-primary">Home</button></form>
    </div>
</div>
