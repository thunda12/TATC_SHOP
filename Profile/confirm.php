<?php 
        require '../connect.php';
        $order_id = isset($_SESSION['order_id']) ? $_SESSION['order_id'] : 0;
    if(isset($_GET['confirm'])){
        $sql = " UPDATE `sale` SET `saleStatus_Id`='2' WHERE sale_Id = $order_id";
        $conn->query($sql);
        echo "<script> window.location.href='index.php?select=mer_order'; </script>";
    }
?>