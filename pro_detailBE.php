<?php 
        session_start();
        require 'connect.php';
        $pro_id = isset($_GET['proDetail_id']) ? $_GET['proDetail_id'] : "";
        if($pro_id != ""){
            $sql = "SELECT * FROM product WHERE pro_id = $pro_id";
            $result_detal = mysqli_query($conn,$sql) ;
            if($result_detal != null){
                $row  = mysqli_fetch_array($result_detal);
                $_SESSION['detail'] = $row;
                echo "<script> window.location.href='index.php?select=product_detail';
                      </script>";
            }else{
                echo "<script> window.location.href='index.php'; 
                alert('คำสั่ง sql ผิดพลาด');
                      </script>";
                }
        }else{
            echo "<script> window.location.href='index.php'; 
                    alert('ไม่มีสินค้าที่เลือก');
            </script>";
        }
        
?>