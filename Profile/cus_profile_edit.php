<?php
    session_start();
    include '../connect.php';
    if(isset($_POST)){
        $id = isset($_GET['ID_cus'])?$_GET['ID_cus']:"";
        $card = $_POST['card'];
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        if(isset($_POST['pass1'])){
            $pass1 = isset($_POST['pass1'])?$_POST['pass1']:99;
            $pass2 = isset($_POST['pass2'])?$_POST['pass2']:11;
            echo $pass1;
            if($pass1 == $pass2){
                $lastPass = md5($pass2);    
            }else{
                $_SESSION['error_pass'] = "รหัสไม่ตรงกัน";
                echo $_SESSION['erroe_pass'];
            }
        }
        
        // echo "<pre>";
        // echo  var_dump($_POST);
        // echo "</pre>";
        // echo $id."-".$card."-".$f_name."-".$l_name."-".$tel."-".$email."-".$username."-".$lastPass."-".$address;
        
        if($id != ""){
            $sql = "UPDATE `customer` SET cusIdCard = '$card',
            cusFirstName = '$f_name',cusLastName = '$l_name',
            phoneNumber= '$tel' ,Email = '$email',
            username = '$username',address = '$address' 
            WHERE cus_Id = '$id'";
            $result = mysqli_query($conn,$sql);

            if($id != "" && isset($lastPass)){
            $sql = "UPDATE `customer` SET cusIdCard = '$card',
            cusFirstName = '$f_name',cusLastName = '$l_name',
            phoneNumber= '$tel' ,Email = '$email',
            username = '$username',cusPassword= '$lastPass',
            address = '$address' WHERE cus_Id = '$id'";
            $result = mysqli_query($conn,$sql);
            echo "<script> window.location.href='index.php'</script>";
            }

        }else{
            echo "<script> window.location.href='../index.php'; 
        alert(' ไม่มี id ลูกค้า ');
</script>";
        }
    }else{
        echo "<script> window.location.href='../index.php'; 
        alert('ทำไมไม่เข้ามาแบบปกติล่ะครับ >:( ');
</script>";
    }

    $conn -> close();
?>