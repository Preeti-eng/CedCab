<?php
$conn = mysqli_connect("localhost", "root","","cedcab");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'];
$sql1 = "UPDATE `tbl_location` SET `is_available` = '0' WHERE `tbl_location`.`id` = {$id}";
$result = mysqli_query($conn,$sql1) or die("fail");
header("Location: showlocation.php");
mysqli_close($conn);
?>