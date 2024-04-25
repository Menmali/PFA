<div >
  <h3>All Reviews</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Number</th>
        <th class="text-center">ID</th>
        <th class="text-center">Email</th>
        <th class="text-center">Review</th>
        <th class="text-center">Rating</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $db = connexionDB();
      $sql="SELECT * from review";
      $result=$db-> query($sql);
      $count=1;
      if ($result-> rowCount() > 0){
        while ($row=$result->fetch(PDO::FETCH_ASSOC)) {  
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["id"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["review"]?></td>
      <td><?=$row["rating"]?></td>   
      <td><form action="adminView/editRevForm.php" method="post"><button class="btn btn-primary" name="id" value="<?=$row['Place']?>"style="height:40px" >Edit</button></form></td>
      <td><form action="controller/deleteRevController.php" method="post"><button class="btn btn-danger" style="height:40px" name="id" value="<?=$row['Place']?>">Delete</button></form></td>
      
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>  
  <form action="./controller/addRevController.php" method="post"><button class="btn btn-primary" style="height:40px" name="tit" ?>Add Review</button></form>


  
</div>
   