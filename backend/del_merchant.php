<?php
    require_once 'connect.php';
    $selected_id = $_GET['id'];
    $del_data = $con->query("DELETE FROM merchant WHERE mer_Id = '$selected_id'");
    if(!$del_data){
        echo "<script>alert('ERROR : ไม่สามารถเพิ่ มข้อมูลได้ กรุณาตรวจสอบข้อผิดพลาด');window.history.back();</script>";   
    }else{
        echo "<script>window.location.href='index.php';</script>";
    }

?>  