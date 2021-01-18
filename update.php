<?php 
$id = $_POST['id'];
$email = $_POST['email'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];

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
$sql2 = "UPDATE tbl_user SET name ='{$name}',mobile='{$mobile}' WHERE user_id={$id}";
$result = mysqli_query($conn,$sql2) or die("fail");
echo "Profile Updated Successfully....";
if($_SESSION['adm'] ==1){
    header("location:admin.php");
     } 
elseif($_SESSION['adm'] == 0){ 
    header("location:user.php");
    }
mysqli_close($conn);
?>
