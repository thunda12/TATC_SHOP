<?php 
    session_start();
    if($_POST){
        include 'connect.php';
        $id=$_SESSION['cus_id'];
        //$date=date("l jS \of F Y H:i:s");
        $total = $_SESSION['total'];
        $sql="INSERT INTO sale VALUES('','$id','','$total')";
        $result=mysqli_query($conn,$sql);
        if($result){
            $order_id=$conn->insert_id;
            for($i=0; $i < count($_POST['qty']); $i++){
                $qty=$_POST['qty'][$i];
                $price =$_POST['price'][$i];
                $pro_id=$_POST['pro_id'][$i];   
                $sql2="INSERT INTO sale_detail VALUEs('','$order_id','$pro_id','$qty','$price')";
                $conn->query($sql2);
                $sql_pro = "SELECT * FROM product WHERE pro_Id = $pro_id";
                $result_pro = $conn->query($sql_pro);
                $all=0;
                while($row=$result_pro->fetch_array()){
                $db_qty = intval($row['proAmt']);
                $cart_qty = intval($qty);
                $all = $db_qty - $cart_qty; 
                }
                $sql_update = "UPDATE `product` SET `proAmt`='$all' WHERE pro_Id = $pro_id";
                $conn->query($sql_update);
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