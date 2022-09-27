<?php 
    require 'connect.php';
    $sql = "SELECT * FROM product WHERE pro_Id != 0";
    $result = mysqli_query($conn,$sql);
    
    // echo'<pre>';
    // print_r($row['img-name']);
    // echo'</pre>';
    
?>
<style>
    .row{
        margin: 1px 1px 1px 1px;
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
    <?php  while($row = mysqli_fetch_assoc($result)){ ?>
    <div class="col-sm-3 ">
        <a href="pro_detailBE.php?proDetail_id=<?php echo $row['pro_Id'] ?>">
        <div class="card mx-1 my-3">
        <img src="pro_img/<?php echo $row['img_name'] ?>" class="card-img-top" style="height:246px; width:246px; padding:5px 5px 5px 5px; border-radius: 10px;">
        <div class="card-body" >
            <h5 class="card-title"><?php echo $row['proName'] ?></h5>
            <a href="update_cartBE.php?pro_id=<?php echo $row['pro_Id'] ?>" class="btn btn-primary">Add To Cart</a>
            <h5 class="card-text" id="price"><?php echo $row['proPrice'] . ".-" ?></h5>
        </div>
        </div>
        </a>
    </div>
<?php } ?>
</div>