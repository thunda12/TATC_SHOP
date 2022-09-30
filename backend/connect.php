<?php
    $servername = "localhost";
    $username = "tatcmark_javfy";
    $password = "1209301117432B@m";
    $dbname = "tatcmark_db-market";
    
    //$host = "localhost";
    //$user = "root";
    //$pass = "";
    //$db = "JOJO";
    //$con = mysqli_connect($host,$user,$pass,$db);
    
    $con = mysqli_connect($servername,$username,$password,$dbname);

    $con->query("SET NAMES UTF8");

?>