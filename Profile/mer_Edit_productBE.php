<?php 
require '../connect.php';
session_start();
$errors = array();
    echo "<pre>";
    var_dump($_FILES['img-name']) ;
    echo "</pre>";
        $date=date("H:i:s");
        //ทำตัวแปรสำหรับเปลี่ยนเส้นทางของรูปภาพ
        $dir = "../pro_img/";
        //variable for image name
        $img_name = $_SESSION['mer_id'] . $_FILES["img-name"]["name"];
        $FilePart = $dir .$_SESSION['mer_id']. $_FILES["img-name"]["name"];
    //insert product to DB
    if(isset($_REQUEST['Edit'])){
        $pro_id = $_POST['edit_id'];
        $pro_name = $_POST["pro_name"];
        $pro_des = $_POST["pro_des"];
        $pro_type = $_POST["pro_type"];
        $pro_price = $_POST["pro_price"];
        $pro_amt = $_POST["pro_amt"];
        $pro_tag = $_POST['pro_tag'];
        $img = $img_name;
        $mer_id = $_POST["mer_id"];
        //check null
        if(empty($pro_name)){
            array_push($errors,"Product Name is required");
        }
        if(empty($pro_type)){
            array_push($errors,"Product Type is required");
        }
        if(empty($pro_price)){
            array_push($errors,"Product Price is required");
        }
        if(empty($img)){
            array_push($errors,"Image is required");
        }
        if(empty($mer_id)){
            array_push($errors,"MerID is required");
        }
        if($img == 0){
            array_push($errors,"Image is required");
        }
        //sql
        if(count($errors) == 0){
        
                //เช็คว่าเป็นรูปภาพหรือไม่
                if($_FILES["img-name"]["type"] == "image/jpeg" || "image/png"){
                    if(move_uploaded_file($_FILES["img-name"]["tmp_name"],$FilePart)){
                        // echo "Upload ". $_FILES["img-name"]["name"] . " Success";
                    $sql_update ="UPDATE `product` SET `proName`='$pro_name',
                    `proDes`='$pro_des',`proType_Id`='$pro_type',`proPrice`='$pro_price',
                    `proAmt`='$pro_amt',`img_name`='$img',`proTag`='$pro_tag',
                    `mer_Id`='$mer_id' WHERE pro_Id = $pro_id";
                    // $sql = "INSERT INTO product(proName,proDes,proType_Id,proPrice,proAmt,img_name,proTag,mer_Id) 
                    // VALUE ('$pro_name','$pro_des','$pro_type','$pro_price','$pro_amt','$img','$pro_tag','$mer_id')";
                    $result = mysqli_query($conn,$sql_update); 

                        echo "<script> window.location.href='index.php?select=upload'; 
                        alert('แก้ไขสินค้า เสร็จสิ้น');
                                </script>";
                    }else{
                        echo "An error occurred during upload";
                    }
                }else{
                    
                    echo "Your file are not JPG or PNG";
                }
        }else{
            echo "<script> window.location.href='index.php?select=upload'; 
                    alert('กรุณาใส่ข้อมูลให้ครบ');
            </script>";
        }
        

    }
