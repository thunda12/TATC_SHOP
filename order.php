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
<style>
    #bill{
        position: relative;
        margin-bottom: 3rem;
    }
    #To{
        position: relative;
        left: 50%;
        transform: translateX(-50%);
    }
    #upload{
        position: relative;
        left: 50%;
        transform: translateX(-50%);
    }
    img{
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        box-shadow: 0px 0px 10px orangered;
        margin-bottom: 20px;
    }
</style>
<div class="container" style="margin-top: 150px;">
    <form action="update_orderBE.php" method="post" enctype="multipart/form-data" >
           
    <div class="container mt-5">
            
            <h1 class="" style="text-align:center;">ยืนยันการสั่งซื้อ</h1>
            <img src="bill/SERVER_BANK.jpg" alt="" width="300px" height="500px">
            <div class="mb-3" id="bill">
            <label for="pro_img" class="form-label" id="upload">อัพโหลด สลิปโอน</label>
            <input type="file" class="form-control" name="img-name" id="up-input">
            </div>
    <table class="table table-strip">
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>จำนวน</th>
            <th>ราคาต่อหน่วย</th>
            <th>จำนวนเงิน</th>
        </tr>
        <?php
            $i=0;
            $total_price=0;
            $priceNonet=0;
            while($row=mysqli_fetch_array($result)){
                $key=array_search($row['pro_Id'],$_SESSION['cart']);
                $total_price=(($row['proPrice'] * $_SESSION['qty'][$key]))+($total_price+($row['proPrice'] * $_SESSION['qty'][$key])*0.01);
                $priceNonet = $priceNonet+($row['proPrice'] * $_SESSION['qty'][$key]);
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
            <td colspan="3">
                <h4><?php echo number_format($total_price,2) ?> บาท
                <span id="EX" style="font-size:15px;text-align:left;">*ราคานี้รวมค่าธรรมเนียมแล้ว 1%*</span>    
                </h4>
                
                <?php $_SESSION['total']=$total_price; $_SESSION['totalNonet']=$priceNonet?>
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