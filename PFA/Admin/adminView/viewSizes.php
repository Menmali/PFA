 
<div >
  <h3>Riddles</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Number</th>
        <th class="text-center">Title</th>
        <th class="text-center">Description</th>
        <th class="text-center">Riddle</th>
        <th class="text-center">Answer</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
    
      include_once "../config/dbconnect.php";
      $db = connexionDB();
      $sql="SELECT * from riddles";
      $result=$db-> query($sql);
      $count=1;
      if ($result-> rowCount() > 0){
        while ($row=$result->fetch(PDO::FETCH_ASSOC)) {  
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["title"]?></td>   
      <td><?=$row["Description"]?></td>   
      <td><?=$row["riddle"]?></td>
      <td><?=$row["ans"]?></td>      
      <td><form action="adminView/editRidForm.php" method="post"><button class="btn btn-primary" name="tit" value="<?=$row['title']?>"style="height:40px" >Edit</button></form></td>
      <td><form action="controller/deleteRidController.php" method="post"><button class="btn btn-danger" style="height:40px" name="tit" value="<?=$row['title']?>">Delete</button></form></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>
  <form action="./controller/addRidController.php" method="post"><button class="btn btn-primary" style="height:40px" name="tit" ?>Add Riddle</button></form>


  
</div>
   