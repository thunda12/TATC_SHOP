<?php 
        require '../connect.php';
    if(isset($_GET['confirm'])){
        $amt = $_GET['amt'];
        $sql = "SELECT proAmt FROM product WHERE pro_Id = $pro_id";
        $result = $conn->query($sql);
        var_dump($result);
        $totatAmt ;
    }
?>