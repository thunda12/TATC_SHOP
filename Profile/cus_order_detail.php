<?php
require '../connect.php';
$order_id = isset($_SESSION['order_id']) ? $_SESSION['order_id'] : 0;
$cus_id = $_SESSION['cus_id'];
if (isset($_SESSION['order_id'])) {
    $sql = "SELECT * FROM sale AS s INNER JOIN sale_detail AS sd ON s.sale_Id = sd.sale_Id
    INNER JOIN product AS p ON sd.pro_Id = p.pro_Id 
    WHERE s.cus_Id = $cus_id and sd.sale_Id = $order_id";
    $result = $conn->query($sql);
    // echo "<pre>";
    // var_dump($order_id);
    // echo "</pre>";

?>
    <style>
        img{
            width: 50px;
            height: 50px;
            border-radius: 5px;
            border: none;
            box-shadow: 0px 0px 10px rgba(255, 115, 0, 1);
        }
        h5{
            padding-top: 10px;
        }
    </style>
    <div class="container mt-5">
        <H1>รายการสั่งซื้อที่ <?php echo $order_id ?></H1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">รูป</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">ราคา(ต่อหน่วย)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <th scope="row">
                            <a href="../pro_detailBE.php?proDetail_id=<?php echo $row['pro_Id']?>">
                                <img src="../pro_img/<?php echo $row['img_name'] ?>" alt="">
                            </a>
                        </th>
                        <td><h5><?php echo $row['proName'] ?></h5></td>
                        <td><h5><?php echo $row['amount'] ?> ชิ้น</h5></td>
                        <td><h5><?php echo $row['proPrice'] ?></h5></td>  
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="call_back  d-inline">
            <a href="index.php?select=mer_order">
        <button class="btn btn-primary">ย้อนกลับ</button>
            </a>
        </div> 
    </div>
<?php } ?>