<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "shop";
    $con = mysqli_connect($host,$user,$pass,$db);
    $con->query("SET NAMES UTF8");

?>