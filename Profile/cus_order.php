<?php 
    require '../connect.php';
    $cus_id = $_SESSION['cus_id'];
        $sql = "SELECT * FROM sale WHERE cus_Id = $cus_id" ;
    $result = $conn->query($sql);
    $count = $result->num_rows;
    
?>
<style>
    table{
        margin: 0% 0% 10% 0%;
        box-shadow: 0px 0px 20px black ;
    }
    h1{
      margin-top: 2%;
      text-align: center;
    }
   
</style>
<?php if($count!=0){ ?>
<h1>รายการสั่งซื้อทั้งหมด</h1>
<div class="container" style="margin-bottom: 20%;">
<?php  while($row = mysqli_fetch_array($result)){ ?>
<a href="cus_selectBE.php?order_id=<?php echo $row['sale_Id'] ?>" >
<table class="table table-hover table-striped table-responsive-sm">
<div class="order mb-5">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">วันที่</th>
    </tr>
  </thead>
  
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['sale_Id'] ?></th>
      <td colspan="4"></td>
      <td><?php echo $row['saleDate']?></td>
    </tr>
  </tbody>
  <tfoot>
  <tr>
        <th scope="row">รวม</th>
        <td colspan="4"></td>
        <td><?php echo $row['totalPrice'] ?></td>
    </tr>
  </tfoot>
  </div>
</table>
</a>
<?php } ?>
</div>
<?php }else{?>
  <h1>ไม่มีรายการสั่งซื้อ</h1>
<?php } ?>
