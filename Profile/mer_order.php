<?php 
    require '../connect.php';
    $mer_id = $_SESSION['mer_id'];
        $sql = "SELECT * FROM sale AS s INNER JOIN customer AS c 
        ON s.cus_Id = c.cus_Id INNER JOIN sale_detail AS sd ON s.sale_Id = sd.sale_Id 
        INNER JOIN product AS p ON sd.pro_Id = p.pro_Id WHERE p.mer_Id = $mer_id
        GROUP BY s.sale_Id
        ORDER BY s.sale_Id ASC" ;
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
<a href="mer_selectBE.php?order_id=<?php echo $row['sale_Id'] ?>" >
<table class="table table-hover table-striped table-responsive-sm">
<div class="order mb-5">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">เบอร์โทร</th>
      <th scope="col">วันที่</th>
    </tr>
  </thead>
  
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['sale_Id'] ?></th>
      <td><?php echo $row['cusFirstName']." ".$row['cusLastName'] ?></td>
      <td><?php echo $row['phoneNumber'] ?></td>
      <td><?php echo $row['saleDate'] ?></td>

    </tr>
  </tbody>
  <tfoot>
  <tr>
        <th scope="row"> </th>
        <td colspan="2"><h5>รวม</h5></td>
        <td><h5><?php echo $row['totalPrice'] ?></h5></td>
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
