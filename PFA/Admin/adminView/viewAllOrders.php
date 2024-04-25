
<div >
  <h2>All Admins</h2>
  <table class="table ">
    <thead>
      <tr>
        <th>Number</th>
        <th class="text-center">ID</th>
        <th class="text-center">Email</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $db = connexionDB();
      $sql="SELECT * from ADMIN ";
      $result=$db->query($sql);
      $count=1;
      if ($result-> rowCount() > 0){
        while ($row=$result->fetch(PDO::FETCH_ASSOC)) {           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["Admin_n"]?></td>
      <td><?=$row["Admin_M"]?></td>
      <td><form action="controller/DeleteAdminControl.php" method="post"><button class="btn btn-danger" style="height:40px" name="id" value="<?=$row['Admin_n']?>">Delete</button></form></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>
  <form action="controller/AddAdminController.php" method="post"><button class="btn btn-primary" style="height:40px" name="tit" ?>Add Admin</button></form>
  </div>
