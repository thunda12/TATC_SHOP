<?php
$menu = "index";
require_once 'connect.php';
$sql = "SELECT * FROM merchant";
$result = $con->query($sql);
isset( $_POST['id'] ) ? $user_id = $_POST['id'] : $user_id = "";
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid"> 
    <h1><i class="nav-icon fas fa-address-card"></i> จัดการข้อมูลผู้ขาย</h1>
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
                <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">รหัสลูกค้า</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ID Card</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ชื่อ</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">นามสกุล</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">Tel .</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">Email</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">Username</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 2%;">Password</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 2%;">sign_Date</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 2%;">Expired_Date</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">Level</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">-</th>
                </tr>
              </thead>
              
              <tbody>
              <?php
                 $i = 1;   
                   while($row = mysqli_fetch_array($result))
                   {                
                ?>
                    <tr>
                      <td><?php echo $row['mer_Id'] ?></td>
                      <td><?php echo $row['merIdCard'] ?></td>
                      <td><?php echo $row['merFirstName'] ?></td>
                      <td><?php echo $row['merLastName'] ?></td>
                      <td><?php echo $row['phoneNumber'] ?></td>
                      <td><?php echo $row['Email'] ?></td>
                      <td><?php echo $row['username'] ?></td>
                      <td><?php echo $row['merPassword'] ?></td>
                      <td><?php echo $row['sign_Date'] ?></td>
                      <td><?php echo $row['Expired_Date'] ?></td>
                      <td><?php echo $row['Lv'] ?></td>
                      <td>           
                        <a class="btn btn-warning btn-xs" href="edit_merchant.php?id=<?php echo $row['mer_Id']?>" >
                          <i class="fas fa-pencil-alt">
                          </i>
                        </a>
                        <a class="btn btn-danger btn-xs" href="del_merchant.php?id=<?php echo $row['mer_Id']?>">
                          <i class="fas fa-trash-alt">
                          </i> 
                        </a>
                      </td>
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