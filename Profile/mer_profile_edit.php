<?php
    session_start();
    include '../connect.php';
    if(isset($_POST)){
        $id = isset($_GET['ID_mer'])?$_GET['ID_mer']:"";
        $card = $_POST['card'];
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        echo $_POST['pass1'];
        if(isset($_POST['pass1']) != null){
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
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
            $sql = "UPDATE `merchant` SET merIdCard = '$card',
            merFirstName = '$f_name',merLastName = '$l_name',
            phoneNumber= '$tel' ,Email = '$email',
            username = '$username' 
            WHERE mer_Id = '$id'";
            $result = mysqli_query($conn,$sql);

            if($id != "" && isset($lastPass)){
            $sql = "UPDATE `merchant` SET merIdCard = '$card',
            merFirstName = '$f_name',merLastName = '$l_name',
            phoneNumber= '$tel' ,Email = '$email',
            username = '$username',merPassword= '$lastPass'
            WHERE mer_Id = '$id'";
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