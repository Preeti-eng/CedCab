<?php
session_start();
$pick  = $_SESSION['pick'];
$dest  = $_SESSION['dest'];
$cabt  = $_SESSION['cab'];
$weigt = $_SESSION['wt'];
$dist = $_SESSION['dis']; 
$fare = $_SESSION['fare']; 
$id = $_SESSION['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cedcab";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO `tbl_ride`(`from`, `to`, `cab_type`, `total_distance`, `luggage`, `total_fare`,`customer_user_id`) VALUES ('$pick','$dest','$cabt','$dist','$weigt','$fare','$id')";

if (mysqli_query($conn,$sql)) {
    echo "New record created successfully!!!!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header("location: waiting.php");

mysqli_close($conn);
?>