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
  <h4>Edit Review</h4>
  <?php
    include_once "../config/dbconnect.php";
    include_once "../controller/updateRevController.php";
      $pl=$_POST['id'];
      $db=connexionDB();
      $req="SELECT * FROM review WHERE Place='$pl' ;";
      $res=$db->query($req);
      if($res->rowCount() > 0) {
        $row1 = $res->fetch(PDO::FETCH_ASSOC);
        $id=$row1['id'];
        $email=$row1['email'];
        $rating=$row1['rating'];
        $rev=$row1['review'];
      }
    
  ?>
  <form id="update-Items" action="./editRevForm.php" method="post" >
    <div class="form-group">
      <input type="hidden" name="Place"value="<?=$pl?>" >
      <label for="id">ID :</label>    
      <input type="text" class="form-control" name="id" id="id" value="<?=$id?>" readonly>
    </div>
    <div class="form-group">
      <label for="email">Email :</label>
      <input type="text" class="form-control" id="email" name="email" value="<?=$email ?>">
    </div>
    <div class="form-group">
      <label for="rate">Rating:</label>
      <select id="rate" name="rating" tabindex="4">   
        <option value="1" <?php if($rating==1) echo"selected"; ?>> 1 Star </option>
        <option value="2" <?php if($rating==2) echo"selected"; ?>> 2 Stars </option>
        <option value="3" <?php if($rating==3) echo"selected"; ?>> 3 Stars </option>
        <option value="4" <?php if($rating==4) echo"selected"; ?>> 4 Stars </option>
        <option value="5" <?php if($rating==5) echo"selected"; ?>> 5 Stars </option>
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
      <span><?php echo $error;?></span>
      </div>
    <?php endif ?>
    </div>
    <div class="form-group1">
      <button type="submit" style="height:40px" name="but" class="btn btn-primary">Update Review</button></form>
        <form action="../index.php"><button type="submit" style="height:40px" class="btn btn-primary">Home</button></form>
    </div>
</div>
