<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['id'];
    $req="DELETE FROM review where Place='$id'";
    $db=connexionDB();
    $res=$db->query($req);
    if($res){
        $succ="Review Deleted";
    }else{
        $error="Review Deletion Error";
    }
?>
<style> 
/* Container styles */
body{
  background-color: #3B3131; 
}
.container {
  margin: auto;
  padding: 100px;
  border-radius: 5px;
  background-color: white;
  box-shadow: 0 2px 4px rgba(0,0,0,.1);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Form styles */
.form-group {
  margin:10% auto;
}
input {
  display: block;
  width: 100%;
  padding: 10px ;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
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
  color: green;
  font-size: 25px;
}
.error{
  color:red ;
  font-size: 25px;
}

/* Responsive styles */
@media only screen and (max-width: 768px) {
  .container {
    max-width: 100%;
    padding: 10px;
  }
}

</style>
<div class="container">
<div class="form-group">
    <?php if (isset($succ)): ?>
      <div class="succ">
      <span><?php echo $succ;
      ?></span>
      </div>
      <?php endif ?>
    </div>
    <div class="form-group">
  <?php if (isset($error)): ?>
      <div class="error">
      <span><?php echo $error;
       ?></span>
      </div>
      <?php endif ?>
        <form action="../index.php"><button type="submit" style="height:40px" class="btn btn-primary">Home</button></form>
    </div>
</div>
