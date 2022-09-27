<?php 
    session_start();
    if($_POST){
        include 'connect.php';
        $id=$_SESSION['cus_id'];
        $date=date("l jS \of F Y H:i:s");
        $total = $_SESSION['total'];
        $sql="INSERT INTO sale VALUES('','$id','$date','$total')";
        $result=mysqli_query($conn,$sql);
        if($result){
            $order_id=$conn->insert_id;
            for($i=0; $i < count($_POST['qty']); $i++){
                $qty=$_POST['qty'][$i];
                $price =$_POST['price'][$i];
                $pro_id=$_POST['pro_id'][$i];   
                $sql2="INSERT INTO sale_detail VALUEs('','$order_id','$pro_id','$qty','$price')";
                $result2=mysqli_query($conn,$sql2);

                $calqty = intval($qty);
                
            }
            unset($_SESSION['cart']);
            unset($_SESSION['qty']);
            echo "<script>
                    alert('สั้งซื้อสินค้าสำเร็จแล้ว')
                    window.location.href='index.php';
                  </script>";
        }else{
            echo "<script>alert('ไม่สามารถทำรายการได้ในขณะนี้')</script>";
        }
    }
?>