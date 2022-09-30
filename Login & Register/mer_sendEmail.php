<?php 
    session_start();
    include '../connect.php';
    if(isset($_POST['submit'])){
        $mail = isset($_SESSION['merMail']) ? $_SESSION['merMail'] : "";
        $card = isset($_SESSION['merIdCard']) ? $_SESSION['merIdCard'] : "";
        $pass1 = isset($_POST['pass1'])?$_POST['pass1'] :"99"; 
        $pass2 = isset($_POST['pass2'])?$_POST['pass2'] :"11";
        if($pass1 == $pass2){
            $lastPassword = md5($pass2);
        }
        if(isset($lastPassword)){
            $sql = "UPDATE merchant SET merPassword = '$lastPassword' WHERE Email = '$mail' AND merIdCard = '$card'";
            $result = mysqli_query($conn,$sql);
            // if(isset($row)){
            //     echo "Your password send successful.<br>Send to mail : ".$row["Email"];    
            //     $sentTO = $row['Email'];
            //     $Subject = "Your Account information username and password.";
            //     $Header = "Content-type: text/html; charset=windows-874\n".
            //     "From: webmaster@thaicreate.com\nReply-To: webmaster@thaicreate.com"; 
            //     $MSG = 
            //     "Welcome : ".$row['cusFirstName']." ".$row['cusLastName']."<br>".
            //     "Username : ".$row['usernaeme']."<br>".
            //     "Password : ".$row['cusPassword']."<br>".
            //     "=================================<br>";
            //     $sendMessege = mail($sentTO,$Subject,$Header,$MSG);
                echo "<script> window.location.href='Login.php'; 
                alert('เปลี่ยนรหัสผ่านเรียบร้อยแล้ว');
                    </script>";
            //}
        }else{
            echo "<script> alert('กรุณาใส่ รหัสผ่าน');  </script>";
        }
        mysqli_close($conn);
    }
?>