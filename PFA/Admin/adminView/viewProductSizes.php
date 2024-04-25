

<div >
  <h2>Precommands </h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Number</th>
        <th class="text-center">ID</th>
        <th class="text-center">Card Number</th>
        <th class="text-center">Date</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $db = connexionDB();
      $sql="SELECT * from precom";
      $result=$db-> query($sql);
      $count=1;
      if ($result-> rowCount() > 0){
        while ($row=$result->fetch(PDO::FETCH_ASSOC)) {  
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["id"]?></td>
      <td><?=$row["card_nb"]?></td>      
      <td><?=$row["date"]?></td> 
      <td><form action="controller/deletePreController.php" method="post"><button class="btn btn-danger" style="height:40px" name="id" value="<?=$row['id']?>">Delete</button></form></td>
    </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>
        
</div>
   