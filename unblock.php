<?php
$conn = mysqli_connect("localhost", "root","","cedcab");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'];
$sql1 = "UPDATE `tbl_user` SET `status` = '1' WHERE `tbl_user`.`user_id` = {$id}";
$result = mysqli_query($conn,$sql1) or die("fail");
header("Location: showUserInfo.php");
mysqli_close($conn);
?>