<?php 
    // echo "<pre>";
    // echo var_dump($_SESSION['detail']);
    // echo "</pre>";
    $row = isset($_SESSION['detail'])? $_SESSION['detail'] : 0 ;
    $page = isset($_GET['select'])? $_GET['select'] : "Desc" ;
?>
<style>
    a{
        text-decoration: none;
        
    }
    #detail{
        margin-top: 150px;
        border: 2px solid gray;
        border-radius: 10px;
        padding: 1rem 2rem 1rem 2rem;
        box-shadow: 20px 10px 20px gray;
    }
    #showDes{
        border-right: 2px solid gray;
        margin: 0rem 0rem -3rem 0rem;
    }
    #foot_detail{
        border-top: 2px solid gray;
    }
    #pro_img{
        margin: 5% 0% 0% 10%;
        border-radius: 10px;
        box-shadow: 0px 0px 20px black;
    }
    button{
        padding: 20px 50px;
        font-size: 1.5rem;
        cursor: pointer;
        border: 0px ;
        background: transparent;
        position: relative;
        transition: all 0.2s ease;
    }
    .btn_line:hover::after{
        width: 100%;
    }
    .btn_line::after{
        content: "";
        position: absolute;
        width: 10%;
        height: 5px;
        border-radius: inherit ;
        background: #FF6F0F;
        left: 0;
        top: 0;
        z-index: -1;
        transition: all 0.25s ease;
        left: 50%;
        transform: translateX(-50%);
    }
</style>

<div class="container py-4 mx-auto" id="detail" >
    <div class="row">
        <div class="col-md-6" id="showDes">
            <div class="container-head"id="ProName">
                <h1><?php echo $row['proName'] ?></h1>
            </div>
            <div class="container-body mt-4">
                <p><?php echo $row['proDes'] ?></p>
            </div>
        </div>
    <div class="col-md-6" id="detail_img"> 
        <img src="pro_img/<?php echo $row['img_name'] ?>" width="500px" height="500px" id="pro_img"> 
    </div>
    <div class="footer d-flex flex-column mt-5" id="foot_detail">
        <div class="row mt-2">
            <div class="col-md-2 " ><button class="btn_line"><a href="index.php?select=product_detail" >Description</a></button></div>
            <div class="col-md-2 " ><button class="btn_line"><a href="index.php?select=product_review" >Review</a></button></div>
            <div class="col-md-2 offset-md-4 "></div>
            <?php if(!$_SESSION['mer_id']){?>
            <div class="col-md-2 "><a href="update_cartBE.php?pro_id=<?php echo $row['pro_Id'] ?>" class="btn btn-primary" style="padding: 20px 20px ;">Add To Cart</a></div>
            <?php }?>
        </div>
    </div>
</div>
