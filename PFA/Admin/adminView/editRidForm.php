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
  <h4>Edit Riddle</h4>
  <?php
    include_once "../config/dbconnect.php";
    include_once "../controller/updateRidController.php";
    if(isset($_POST['tit'])){
      $tit=$_POST['tit'];
      $db=connexionDB();
      $req="SELECT * FROM riddles WHERE title='$tit' ;";
      $res=$db->query($req);
      if($res->rowCount() > 0) {
        $row1 = $res->fetch(PDO::FETCH_ASSOC);
        $title=$row1['title'];
        if($row1['Description']!=""){
          $desc=$row1['Description'];
        }else{
          $desc="";
        }
        $rid=$row1['riddle'];
        $ans=$row1['ans'];
        $cn=$row1['chapter_nb'];
      }
    }
  ?>
  <form id="update-Items" action="./editRidForm.php" method="post" >
    <div class="form-group">
      <label for="title">Title :</label>    
      <input type="text" class="form-control" name="tit" id="tit" value="<?=$tit?>" readonly>
    </div>
    <div class="form-group">
      <label for="desc">Description :</label>
      <input type="text" class="form-control" id="desc" name="desc" value="<?=$desc ?>">
    </div>
    <div class="form-group">
      <label for="rid">Riddle :</label>
      <input type="text" class="form-control" id="rid" name="rid" value="<?=$rid ?>">
    </div>
    <div class="form-group">
      <label for="ans">Answer :</label>
      <input type="TEXT " class="form-control" id="ans" name="ans" value="<?=$ans ?>">
    </div>
    <div class="form-group">
      <label for="cn">Chapter Number :</label>
      <input type="number" class="form-control" id="cn" name="cn" value="<?=$cn ?>">
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
      exit(); ?></span>
      </div>
      <?php endif ?>
    </div>
    <div class="form-group1">
      <button type="submit" style="height:40px" name="but" class="btn btn-primary">Update Riddle</button></form>
        <form action="../index.php"><button type="submit" style="height:40px" class="btn btn-primary">Home</button></form>
    </div>
</div>
