<?php 
        session_start();
        require '../connect.php';
        $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : "";
        if($order_id != ""){
            $_SESSION['order_id'] = $order_id;
            echo "<script> window.location.href='index.php?select=mer_order_detail';
                      </script>";
        }else{
            echo "<script> window.location.href='index.php'; 
                    alert('ไม่มีคำสั่งซื้อที่เลือก');
            </script>";
        }
        
?>