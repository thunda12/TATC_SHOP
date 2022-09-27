<?php
    include 'connect.php';
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
            $pro_ids=$pro_ids . $pro_id . ",";
        }
        $inputPro_id=rtrim($pro_ids,",");
        $sql="SELECT * FROM product WHERE pro_Id in ($inputPro_id) AND pro_Id != 0";
        $result=mysqli_query($conn,$sql);
        $num_rows=mysqli_num_rows($result);
    }else{
        $num_rows=0;
    }
    if($num_rows==0){
        echo "ไม่มีสินค้าในตะกร้า";
    }else{
?>
<div class="container" style="margin-top: 150px;">
    <form action="update_orderBE.php" method="post">
    <div class="container mt-5">
            <h1 class="" style="text-align:center;">ยืนยันการสั่งซื้อ</h1>
    <table class="table table-strip">
        <tr>
            <th>รหัสสินค้า</th>
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
            <td><?php echo $row['pro_Id'] ?></td>
            <td><?php echo $row['proName'] ?></td>
            <td>
                <?php echo $_SESSION['qty'][$key];?>
                <input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>">
                <input type="hidden" name="pro_id[]" value="<?php echo $row['pro_Id']; ?>">
                <input type="hidden" name="price[]" value="<?php echo $row['proPrice']; ?>">
            </td>
            <td><?php echo number_format($row['proPrice'],2) ?></td>
            <td><?php echo number_format($row['proPrice'] * $_SESSION['qty'][$key],2) ?></td>
        </tr>
        <?php
            $i++;
        }
        ?>
        <tr>
            <td colspan="3" align="right">
                <h4>จำนวนเงินรวมทั้งหมด</h4>
            </td>
            <td colspan="2">
                <h4><?php echo number_format($total_price,2) ?> บาท</h4>
                <?php $_SESSION['total']=$total_price ?>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <a href="index.php?select=cart" class="btn btn-success">กลับไปตะหร้าสินค้า</a>
                <button type="submit" class="btn btn-primary">ยืนยันการสั่งซื้อ</button>
            </td>
        </tr>
    </table>
    </form>
    </div>
</div>
<?php } ?>