<?php 
    require('../connect.php');
    $mer = $_SESSION['mer_id'];
    //SELECT data product type
    $sql = "SELECT * FROM product_type";
    $result = $conn->query($sql);
    $rw = isset($_SESSION['edit_detail'])?$_SESSION['edit_detail']:"";
    // echo'<pre>';
    // print_r($result);
    // echo'</pre>';
?>
<style>
    img{
      margin: 1% 5% 1% 10%;
      background-color: red;
      border-radius: 20px;
      
    }
    .btn{
        position: relative;
        padding: 0.5rem 1rem 0.5rem 1rem ;
        left: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .container{
        background-color: #f1f1f1;
        border-radius: 20px;
        padding: 20px 10px 10px 10px ;
        
    }
    .container label{
        margin-left: 20px ;
    }
    .card-title{
        white-space: nowrap; 
        line-height: 1em;
        height: 1em;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<?php if($rw === ""){ ?>
<div class="container mt-5 px-2 mb-5">
    <h1 style="text-align:center;">อัพโหลดสินค้า</h1>
<form action="mer_upload_productBE.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Product Name</label>
    <input type="text" class="form-control" name="pro_name" >
  </div>
  <div class="mb-3">
    <label for="des" class="form-label">Product Description</label>
    <textarea name="pro_des" class="form-control" id="pro_Desc" rows="20" cols="120" >
        
        </textarea>
  </div>
  <div class="mb-3">
    <label for="pro_type" class="form-label">Product Type</label>
    <select name="pro_type" class="form-control">
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
    <option value="<?php echo $row["proType_Id"] ?>"><?php echo $row["TypeName"] ?></option>
    <?php } ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="pro_price" class="form-label">Product Price</label>
    <input type="text" class="form-control" name="pro_price" >
  </div>
  <div class="mb-3">
    <label for="pro_price" class="form-label">Product Amount</label>
    <input type="text" class="form-control" name="pro_amt" >
  </div>
  <div class="mb-3">
    <label for="pro_price" class="form-label">Product Tag</label>
    <input type="text" class="form-control" name="pro_tag" >
  </div>
  <div class="mb-3">
    <label for="pro_img" class="form-label">Product Picture</label>
    <input type="file" class="form-control" name="img-name" id="up-input">
  </div>
  <input type="text" name="mer_id" value="<?php echo $mer ?>" hidden>
  <input type="submit" class="btn btn-primary" name="submit" value="Upload">
</form>
</div>

<?php }else{?>
  <div class="container mt-5 px-2 mb-5">
    <h1 style="text-align:center;">แก้ไขสินค้า</h1>
<form action="mer_Edit_productBE.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Product Name</label>
    <input type="text" class="form-control" name="pro_name" value="<?php echo $rw['proName'] ?>" >
  </div>
  <div class="mb-3">
    <label for="des" class="form-label">Product Description</label>
    <textarea name="pro_des" class="form-control" id="pro_Desc" rows="20" cols="120" >
        
        </textarea>
  </div>
  <div class="mb-3">
    <label for="pro_type" class="form-label">Product Type</label>
    <select name="pro_type" class="form-control">
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
    <option value="<?php echo $row["proType_Id"] ?>"><?php echo $row["TypeName"] ?></option>
    <?php } ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="pro_price" class="form-label">Product Price</label>
    <input type="text" class="form-control" name="pro_price" value="<?php echo $rw['proPrice'] ?>" >
  </div>
  <div class="mb-3">
    <label for="pro_price" class="form-label">Product Amount</label>
    <input type="text" class="form-control" name="pro_amt" value="<?php echo $rw['proAmt'] ?>" >
  </div>
  <div class="mb-3">
    <label for="pro_price" class="form-label">Product Tag</label>
    <input type="text" class="form-control" name="pro_tag" value="<?php echo $rw['proTag'] ?>" >
  </div>
  <div class="mb-3">
    <label for="pro_img" class="form-label">Product Picture</label>
    <img src="../pro_img/<?php echo $rw['img_name'] ?>" width="500px" height="500px">
    <input type="file" class="form-control" name="img-name" id="up-input">
  </div>
  <input type="text" name="mer_id" value="<?php echo $mer ?>" hidden>
  <input type="text" name="edit_id" value="<?php echo $rw['pro_Id'] ?>" hidden>
  <input type="text" name="old_img" value="<?php echo $rw['img_name'] ?>" hidden>
  <input type="submit" class="btn btn-primary" name="Edit" value="Edit">
</form>
</div>

<?php unset($_SESSION['edit_detail']);} ?>