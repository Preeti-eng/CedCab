<?php 
$id = $_POST['id'];
$loca = $_POST['location'];
$distn = $_POST['distance'];
// $avail = $_POST['avail'];

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
$sql2 = "UPDATE `tbl_location` SET `name`='{$loca}',`distance`='{$distn}' WHERE id = {$id}";
$result = mysqli_query($conn,$sql2) or die("fail");
header("Location: http://localhost/project/CedCab/showlocation.php");
mysqli_close($conn);
?>
