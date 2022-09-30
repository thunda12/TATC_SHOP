<?php
$menu = "index";
require_once 'connect.php';
$sql = "SELECT sale_detail.sale_detail_id,customer.cusFirstName, product.img_name, sale.saleDate, sale_detail.amount, sale_detail.salePrice, sale.totalPrice
FROM sale 
INNER JOIN sale_detail ON ( sale.sale_Id = sale_detail.sale_id )
INNER JOIN customer ON ( sale.cus_Id = customer.cus_Id )
INNER JOIN product ON ( sale_detail.pro_Id = product.pro_Id);";
$result = $con->query($sql);
//isset( $_POST['id'] ) ? $user_id = $_POST['id'] : $user_id = "";
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid"> 
    <h1><i class="nav-icon fas fa-address-card"></i>  รายละเอียดการซื้อขาย</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header card-navy card-outline">
        <div aligh="right"> 
        </div>
      </div>
      <br>
      <div class="card-body p-1">
        <div class="row">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row" class="info">
                <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">SaleID</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่อลูกค้า</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">สินค้า</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันที่ขาย</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">จำนวน</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ราคาขาย</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ราคาสุทธิ</th>
                  <!--<th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">-</th>-->
                </tr>
              </thead>
              
              <tbody>
              <?php
                 $i = 1;
                   while($row = mysqli_fetch_array($result))
                   {                
                ?>
                    <tr>
                      <td><?php echo $row['sale_detail_id'] ?></td>
                      <td><?php echo $row['cusFirstName'] ?></td>
                      <td><img src="../pro_img/<?php echo $row['img_name'] ?>" style="width:50px; height:50px" alt=""></td>
                      <td><?php echo $row['saleDate'] ?></td>
                      <td><?php echo $row['amount'] ?></td>
                      <td><?php echo $row['salePrice'] ?></td>
                      <td><?php echo $row['totalPrice'] ?></td>
                      
                    </tr>
                    <?php
                    $i++;
                   }
                ?>
                
              </tbody>
              
            </table>
            
          </div>
          <div class="col-md-1" >
            
          </div>
        </div>
      </div>
      
    </div>
    
    
    
  </div>
  <!-- /.col -->
</div>
</section>
<!-- /.content -->
<?php include('footer.php'); ?>
<script>
$(function () {
$(".datatable").DataTable();
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
http://fordev22.com/
"ordering": true,
"info": true,
"autoWidth": false,
});
});
</script>
</body>
</html>     