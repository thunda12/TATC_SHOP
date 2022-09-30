<?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "JOJO";
        $con = mysqli_connect($host,$user,$pass,$db);
        if (mysqli_connect_errno()){
                die("Error conncting to the Database");
        }
        //adding new visitors
        $visitor_ip=$_SERVER['REMOTE_ADDR'];


        //checking if visitor is unique
        $query="SELECT * FROM counter_table WHERE ip_address='$visitor_ip'";
        $result=mysqli_query($con, $query);

        //checking query error
        if(!$result){
                die("Retriving Query Error<br>".$query);
        }
        $total_visitors=mysqli_num_rows($result);
        if ($total_visitors < 1){
                $query="INSERT INTO counter_table (ip_address) VALUES('$visitor_ip')";
        $result=mysqli_query($con, $query);
        }


        $query="SELECT * FROM counter_table";
        $result=mysqli_query($con, $query);

        if(!$result){
                die("Retriving Query Error<br>".$query);
        }
        $total_visitors=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
        <title></title>
        <style type="text/css">
                h1{
                        background-color: mediumseagreen;
                        color:white;
                        border-bottom:2px solid white;
                }
                h3{
                        font-size:5em;
                }
                
                h1,h3{
                        padding:20px;
                        margin:0px;
                }
        </style>
</head>
<body>
        <div class="wrapper">
                <h1>
                        Visitor Count
                </h1>
                <h3><?php echo $total_visitors; ?> คน</h3>
        </div>
</body>
</html>