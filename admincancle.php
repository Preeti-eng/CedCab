<?php
$conn = mysqli_connect("localhost", "root","","cedcab");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'];
$sql1 = "UPDATE `tbl_ride` SET `status` = '0' WHERE `tbl_ride`.`ride_id` = {$id}";
$result = mysqli_query($conn,$sql1) or die("fail");
header("Location: adminpending.php");
mysqli_close($conn);
?>