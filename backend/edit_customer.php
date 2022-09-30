<!-- http://fordev22.com/ -->
<?php include ("head.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
<!-- Site wrapper -->
<div class="wrapper">
  
  
  <?php include ("navbar.php"); ?>
  <?php include ("menu_l.php"); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php
    include 'connect.php';
    $selected_id = isset($_GET['id']) ? $_GET['id'] : '';
    $old_data=mysqli_fetch_array($con->query("SELECT * FROM customer WHERE cus_Id = '$selected_id'"));
    if(isset($_POST['add'])){
        $cusIdCard=$_POST['cusIdCard'];
        $cusFirstName=$_POST['cusFirstName'];
        $cusLastName=$_POST['cusLastName'];
        $phoneNumber=$_POST['phoneNumber'];
        $Email=$_POST['Email'];
        $username=$_POST['username'];
        $cusPassword=$_POST['cusPassword'];
        $address=$_POST['address'];
        $upd_data=$con->query("UPDATE customer SET cusIdCard = '$cusIdCard', cusFirstName = '$cusFirstName', cusLastName = '$cusLastName', phoneNumber = '$phoneNumber', Email = '$Email', username = '$username', cusPassword = '$cusPassword', address = '$address' WHERE cus_Id = '$selected_id' ");
        $old_data = mysqli_fetch_array($con->query("SELECT * FROM customer"));
        if(!$upd_data){
            echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');window.history.back();</script>";
        }else{
            //header('location:employee.php'); redirec php
            echo "<script>window.location.href='index.php?page=customer';</script>";
            //echo "<META HTTP-EQUIV = 'Refresh' CONTENT='0;URL=employee.php'>"; redirec html
    }
    }
   
    ?>

<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>แก้ไขข้อมูล</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
          <section class="content container">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Customer</h3>
              </div>
                  <br>
                <div class="card-body p-1">
                  <div class="row">
                    <div class="col-md-1"></div>
                      <div class="col-md-10">
                        <!--<?php $_SERVER['PHP_SELF'] ?>-->
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" role="form">
                            <div class="form-group">
                                <label>IDCard</label>
                                <input type="text" class="form-control" name="cusIdCard" value="<?php echo $old_data['cusIdCard'] ?>">
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="cusFirstName" value="<?php echo $old_data['cusFirstName'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="cusLastName" value="<?php echo $old_data['cusLastName'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phoneNumber" value="<?php echo $old_data['phoneNumber'] ?>">
                            </div>
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="email" class="form-control" name="Email" value="<?php echo $old_data['Email'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $old_data['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="cusPassword" value="<?php echo $old_data['cusPassword'] ?>">
                            </div>
                            <div class="form-group">
                                <label>address</label>
                                <input type="text" class="form-control" name="address" value="<?php echo $old_data['address'] ?>">
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="add">Save</button>
                          </div>
                          
                      <div class="col-md-1"></div>
                      </form>
                  </div>
                </div>
              </div>
        </section>
          <!-- /.content -->
<?php include('footer.php'); ?>

<script>
  $(function () {
    $(".datatable").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // http://fordev22.com/
    // });
  });
</script>
  
</body>
</html>
<!-- http://fordev22.com/ -->


</div>
</div>
