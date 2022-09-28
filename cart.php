<?php 
    if(!isset($_SESSION['username'])){
        echo "<script> window.location.href='Login & Register/Login.php'; </script>";
    }else{
?>
<?php
    include 'connect.php';    
    $pro_id=isset($_GET['pro_id']) ? $_GET['pro_id'] : "";
    $count=isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    if(isset($_SESSION['qty'])){
        $qty=0;
        foreach($_SESSION['qty'] as $item){
            @$qty=$qty+$item;
        }
    }else{
        $qty=0;
    }
    if(isset($_SESSION['cart']) and $count > 0 ){
        $pro_ids = "0";
        foreach($_SESSION['cart'] as $pro_id){
            $pro_ids=$pro_ids . $pro_id . "," ;
            // echo $pro_ids;
            // echo "<br>";
        }
        $inputPro_id=rtrim($pro_ids,",");
        // echo "<li>".$inputPro_id."</li>";
        // var_dump($inputPro_id);
        $sql="SELECT * FROM product AS p INNER JOIN merchant AS m ON p.mer_Id = m.mer_Id 
        WHERE pro_Id in ($inputPro_id) AND pro_Id != 0";//in ($inputPro_id)
        $result=mysqli_query($conn,$sql);
        $num_rows=mysqli_num_rows($result);
    }else{
        $num_rows=0;
    }
    if($num_rows==0){
        echo "<script>
        alert('ไม่มีสินค้าในตะกร้า')
        window.location.href='index.php';
            </script>";
    }else{
?>

<div class="container" style="margin-top: 150px;" >
    <form action="update_cartBE.php" method="Post">
        <div class="container mt-5">
            <h1 class="" style="text-align:center;">ตะกร้าสินค้า</h1>
        
    <table class="table table-strip">  
        <tr>
            <th>รูป</th>
            <th>ชื่อสินค้า</th>
            <th>จำนวน</th>
            <th>ราคาต่อหน่วย</th>
            <th>จำนวนเงิน</th>
            <th>การจัดการ</th>
        </tr>
        <?php
            $i=0;
            $total_price=0;
                while($row=mysqli_fetch_array($result)){
                $key=array_search($row['pro_Id'],$_SESSION['cart']);
                $total_price=$total_price+($row['proPrice'] * $_SESSION['qty'][$key]);
            
        ?>
        <tr>
            <td><img src="pro_img/<?php echo $row['img_name'] ?>" alt="" width="50px" height="50px"></td>
            <td><?php echo $row['proName'] ?></td>
            <td>
                <input type="text" class="form-control" value=<?php echo $_SESSION['qty'][$key]?>
                 name="qty[<?php echo $i ?>]" style="width:50px;">
                <input type="hidden" name="arr_key_<?php echo $i ?>" value="<?php echo $key ?>">
            </td>
            <td><?php echo $row['proPrice'] ?></td>
            <td><?php echo $row['proPrice'] * $_SESSION['qty'][$key] ?></td>
            <td>
                <a href="remove_cartBE.php?pro_id=<?php echo $row['pro_Id'] ?>" class="btn btn-danger">ลบ</a>
            </td>
        </tr>
        <?php
            $i++;
        }
        ?>
        </div>
        <tr>
            <td colspan="6">
                <h4>จำนวนเงินทั้งหมด <?php echo $total_price ?> บาท</h4>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <button type="submit" class="btn btn-primary">ชำระเงิน</button>
            </td>
        </tr>
    </table>
    </div>
    </form>
</div>
<?php } ?>
<?php } ?>
