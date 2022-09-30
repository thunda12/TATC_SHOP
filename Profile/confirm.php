<?php 
        require '../connect.php';
        $pro_id = $_GET['pro_id'];
        $order_id = $_GET['order_id'];
    if(isset($pro_id)&&isset($order_id)){
        $sql = " UPDATE `sale_detail` SET `saleStatus_Id`='2' WHERE sale_Id = $order_id AND pro_Id = $pro_id";
        $conn->query($sql);
        echo "<script> window.location.href='index.php?select=mer_order_detail'; </script>";
    }
?>