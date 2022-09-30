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
    switch(@$_GET['page']){
      case "customer" :
        include "customer.php";
        break;
      case "edit_customer":
        include "edit_customer.php";
        break;
      case "del_customer":
        include "del_customer.php";
        break;
      case "merchant":
        include "merchant.php";
        break;
      case "edit_merchant":
        include "edit_merchant.php";
        break;
      case "del_merchant":
        include "del_merchant.php";
        break;
      case "saledetail":
        include "saledetail.php";
        break;
      case "howmanypeoplesawmyweb":
        include "howmanypeoplesawmyweb.php";
        break;
      //default:  include "member.php";
}
  ?>
</div>
</div>