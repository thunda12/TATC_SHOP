<?php 
        session_start();
        require '../connect.php';
        $pro_id = isset($_GET['pro_id']) ? $_GET['pro_id'] : "";
        if($pro_id != ""){
            $sql = "SELECT * FROM product WHERE pro_Id = $pro_id";
            $result_detal = mysqli_query($conn,$sql) ;
            if($result_detal != null){
                $row  = mysqli_fetch_assoc($result_detal);
                $_SESSION['edit_id'] = $pro_id;
                $_SESSION['edit_detail'] = $row;
                echo "<script> window.location.href='index.php?select=mer_edit';
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