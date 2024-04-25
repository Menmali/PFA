
<div >
  <h2>All Users</h2>
  <table class="table ">
    <thead>
      <tr>
        <th>Number</th>
        <th class="text-center">ID </th>
        <th class="text-center">Email</th>
        <th class="text-center">Age</th>
        <th class="text-center">Card</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $db = connexionDB();
      $sql="SELECT * from user ";
      $result=$db->query($sql);
      $count=1;
      if ($result-> rowCount() > 0){
        while ($row=$result->fetch(PDO::FETCH_ASSOC)) {           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["id"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["age"]?></td>
      <td><?=$row["card"]?></td>
      <td><form action="controller/DeleteUserController.php" method="post"><button class="btn btn-danger" style="height:40px" name="id" value="<?=$row['id']?>">Delete</button></form></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>
  <form action="./controller/addUserController.php" method="post"><button class="btn btn-primary" style="height:40px" name="tit" ?>Add User</button></form>
  </div>
