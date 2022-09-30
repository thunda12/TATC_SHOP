<?php
// $servername = "localhost";
// $username = "tatcmark_javfy";
// $password = "1209301117432B@m";
// $dbname = "tatcmark_db-market";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "JOJO";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>