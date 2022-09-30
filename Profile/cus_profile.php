<?php 
    include '../connect.php';
    if(isset($_SESSION['cus_id'])){
        $id = isset($_SESSION['cus_id'])?$_SESSION['cus_id'] :"";
        if($id != ""){
            $sql = "SELECT * FROM customer WHERE cus_Id = $id";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
        }
    }else{
        echo "<script> window.location.href='../index.php'; 
                    alert('กรุณาเข้าสู่ระบบก่อนครับ :)');
            </script>";
    }
?>
<style>
    .profile{
        position: relative;
        margin: 20px 0px 5rem 0px;
        left: -0%;
        top: -0%;
        background-color: #f1f1f1;
    }
    #Logout{
        margin: 0% 0% 0% 50%;
        transform: translateX(-50%);
    }
</style>
<div class="profile">
<div class="container ">
    <h1>Hello Welcome : <span class="text-primary"><?php echo $_SESSION['username'] ?></span></h1>
    <form action="cus_profile_edit.php?ID_cus=<?php echo $row['cus_Id']?>" method="POST">
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">บัตรประชาชน <span style="color: gray; font-size:12px;">*//ใส่ตัวอักษรไม่เกิน 13 ตัวอักษร//*</span></label>
            <input name="card" type="text" class="form-control" value="<?php echo $row['cusIdCard']?>">
        </div>
        <div class="input-group">
            <div class="mb-3 "style="width: 50% ;">
                <label for="exampleInputEmail1" class="form-label">ชื่อ</label>
                <input name="f_name" type="text" class="form-control" value="<?php echo $row['cusFirstName']?>" style="width: 98%;">
            </div>
            <div class="mb-3 " style="width: 50% ;" >
                <label for="exampleInputEmail1" class="form-label">นามสกุล</label>
                <input name="l_name" type="text" class="form-control" value="<?php echo $row['cusLastName']?>" style="width: 100%;">
            </div>
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" class="form-control" value="<?php echo $row['Email']?>" disabled >
            <input name="email" type="text" class="form-control" value="<?php echo $row['Email']?>" hidden >
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">เบอร์โทร</label>
            <input name="tel" type="text" class="form-control" value="<?php echo $row['phoneNumber']?>" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">เปลี่ยน Password</label>
            <input name="pass1" type="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">ยืนยัน Password</label>
            <input name="pass2" type="password" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">ที่ยู่</label>
            <textarea name="address" class="form-control"><?php echo $row['address']?></textarea>
        </div>
        
    <button type="edit" name="Edit" class="btn btn-primary">บันทึก</button>
    </form>
    <a href="index.php?Logout=1" class="btn btn-outline-primary" id="Logout">Logout</a>
</div>
</div>