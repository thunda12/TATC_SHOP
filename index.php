<?php 
    session_start();
    include 'connect.php';
    
    // if(!isset($_SESSION['username'])){
    //   $_SESSION['msg'] = "You must Login first!!";
    //   header('location: login.php');
    // }

    if(isset($_GET['Logout'])){
      session_destroy();
      unset($_SESSION['username']);
      unset($_SESSION['mer_name']);
      session_unset();
      header('location: index.php');
    }
    if(isset($_GET['select'])){
      $select = $_GET['select'];
    }else{
      $select = "";
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TATC MARKET</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Link Tymce -->
    <script src="tinymce/tinymce.min.js"></script>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <?php
        include 'navbar.php';
    ?>
    <div class="selected" style="margin-top: 150 ;">
    <?php 
    switch ($select) {
        case "upload_product":
          include 'upload_product.php';
          break;
        case "cart":
          include 'cart.php';
          break;
        case "order":
          include 'order.php';
          break;
        case "product_detail":
          include 'product_Detail.php';
          break;
        case "cus_profile":
          include 'Profile/cus_profile.php';
          break;
        case "mer_profile":
          include 'Profile/mer_profile.php';
          break;
        default:
        include 'component/carousel.php';
        ?>
      <div class="row mx-5"  >
        <div class="col-sm-2" >
        <?php include 'categories.php'; ?>
        </div>
        <div class="col-sm-10" >
      <?php $q = isset($_GET['search'])?$_GET['search'] : ""; 
      if($q != ""){
        include 'searchBE.php';
      }else{
        include 'product.php';
      } ?>
      </div>
      </div>
      <?php
        
      }
    
    ?>
    </div>


    <?php
        include 'component/footer.php';
    ?>
    
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
      <!-- Function Tinymce -->
    <script>
    tinymce.init({
    selector: '#pro_Desc',
    width: 600,
    height: 300
});
</script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>