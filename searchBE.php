<?php 
    require 'connect.php';
    if(isset($_GET['search'])){
        // echo "<pre>";
        // echo var_dump($_POST);
        // echo "</pre>";
        $search = $_GET['search'];
        $sql = "SELECT * FROM product as p INNER JOIN product_type as t ON p.proType_Id = t.proType_Id
        WHERE p.proName LIKE '%$search%' OR t.TypeName LIKE '%$search%' ";
        $result_name = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result_name);
        // echo "<pre>";
        // echo var_dump($result_name);
        // echo "</pre>";
        // echo "name";
        //echo "<script> window.location.href='index.php?select=search'; </script>";
                      
    }
?>
<style>
    .row{
        margin: 2rem 1rem 3rem 1rem;

    }
    #price{
        position: absolute; 
        right: 1% ;
        bottom: 7%;  
    }

    .card-title{
        white-space: nowrap; 
        line-height: 1em;
        height: 1em;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="row">
    <?php if($count > 0){ ?>
        <?php  while($row = mysqli_fetch_array($result_name)) {?>
        <div class="col-sm-3 ">
            <div class="card mx-1 my-3">
            <a href="pro_detailBE.php?proDetail_id=<?php echo $row['pro_Id'] ?>">
            <img src="pro_img/<?php echo $row['img_name'] ?>" class="card-img-top" style="height:246px; width:246px; padding:5px 5px 5px 5px; border-radius: 10px;">
            </a>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['proName'] ?></h5>
                <a href="update_cartBE.php?pro_id=<?php echo $row['pro_Id'] ?>" class="btn btn-primary">Add To Cart</a>
                <h5 class="card-text" id="price"><?php echo $row['proPrice'] . ".-" ?></h5>
            </div>
            </div>
            
        </div>
    <?php } ?>
    <?php }else{
        echo "<script> alert('ไม่มีสินค้าที่ค้นหา');
        window.location.href='index.php'; 
        </script>";
    } ?>
    </div>