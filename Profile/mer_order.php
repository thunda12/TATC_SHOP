<?php 
    require '../connect.php';
    $mer_id = $_SESSION['mer_id'];
        $sql = "SELECT * FROM sale AS s INNER JOIN customer AS c 
        ON s.cus_Id = c.cus_Id";
    $result = $conn->query($sql);
?>
<style>
    table{
        box-shadow: 0px 0px 20px black ;
    }
    h1{
      margin-top: 2%;
      text-align: center;
    }
</style>
<h1>รายการสั่งซื้อทั้งหมด</h1>
<?php  while($row = mysqli_fetch_array($result)){ ?>
<a href="mer_selectBE.php?order_id=<?php echo $row['sale_Id'] ?>">
<table class="table table-hover table-striped table-responsive-sm">
<div class="order mb-5">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">วันที่</th>
    </tr>
  </thead>
  
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['sale_Id'] ?></th>
      <td><?php echo $row['cusFirstName']." ".$row['cusLastName'] ?></td>
      <td><?php echo $row['saleDate'] ?></td>
    </tr>
  </tbody>
  <tfoot>
  <tr>
        <th scope="row"> </th>
        <td colspan="1">รวม</td>
        <td><?php echo $row['totalPrice'] ?></td>
    </tr>
  </tfoot>
  </div>
</table>
</a>
<?php } ?>
