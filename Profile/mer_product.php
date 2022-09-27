<?php
require '../connect.php';
$mer_pro = $_SESSION['mer_id'];
$sql = "SELECT * FROM product WHERE pro_Id != 0 AND mer_Id = $mer_pro";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

$SQL = "SELECT * FROM merchant WHERE mer_Id = $mer_pro";
$mer = $conn->query($SQL);
$rowLv = mysqli_fetch_array($mer);
$Level = $rowLv['Lv'];
switch($Level){ 
    case "1":
        $Lv_product = 5;
        break;  
    case "2":
        $Lv_product = 10;
        break;
    case "3":
        $Lv_product = 15;
        break;
    case "4":
        $Lv_product = 20;
        break;
    default: $Lv_product = 0;
}
// echo'<pre>';
// print_r($row['img-name']);
// echo'</pre>';

?>
<style>
    .row{
        margin: 2rem 2rem 2rem 1.5rem;
    }

    #price {
        position: absolute;
        right: 10px;
        bottom: 25px;

    }
    #add_item {
        height: 340px;
        padding: 2rem 2rem 2rem 2rem;
        border: 2px dashed rgba(255, 115, 0, 1);
        border-radius: 20px;
    }
    #circle {
        width: 150px;
        height: 150px;
        padding: 0.5rem 2rem 2rem 2rem;
        margin: auto;
        margin-top: 50px;
        border: 2px dashed rgba(255, 115, 0, 1);
        border-radius: 100%;
        text-align: center;
        font-size: 5rem;
    }
    h5{
        line-height: 1em;
        height: 1em;
        font-size: 1em;
        text-overflow: ellipsis;
    }
</style>
<H1 style="text-align:center ;">สินค้าของคุณ</H1>
<?php if ($count > 0) { ?>
    <div class="row">
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <div class="col-sm-3 " >
                <a href="mer_editBE.php?pro_id=<?php echo $row['pro_Id'] ?>">
                    <div class="card mx-1 my-3">
                        <img src="../pro_img/<?php echo $row['img_name'] ?>" class="card-img-top" style="height:246px; width:246px; padding:5px 5px 5px 5px; border-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['proName'] ?></h5><br>
                            <h5 class="card-text text-primary" id="price"><?php echo $row['proPrice'] . ".-" ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    <?php } else { $msg = "คุณยังไม่ได้อัพโหลดสินค้า คุณสามารถ อัพโหลดสินค้า ได้หลังจากอัพเกรดร้านค้าแล้วเท่านั้น"; ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $msg ?>
        </div>
    <?php } ?>
    <?php if($count < $Lv_product){  ?>
        <div class="col-sm-3 mt-3">
        <a href="index.php?select=upload">
            <div class="add-item" id="add_item">
                <div class="circle" id="circle">+</div>
            </div>
        </a>
        </div>
    </div>
    
    <?php } ?>
    
    