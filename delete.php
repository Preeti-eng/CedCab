<?php
$conn = mysqli_connect("localhost", "root","","cedcab");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'];
$sql1 = "DELETE FROM tbl_location WHERE id = {$id}";
$result = mysqli_query($conn,$sql1) or die("fail");
header("Location: showlocation.php");
mysqli_close($conn);
?>