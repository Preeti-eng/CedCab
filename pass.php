<?php 
session_start();
$id = $_POST['id'];
$email = $_POST['email'];
$oldpass = $_POST['pass1'];
$newpass = $_POST['pass'];

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
$sql = "SELECT * FROM tbl_user WHERE password = '$oldpass'";
$result = mysqli_query($conn,$sql) or die("Incorrect Old password");
if(mysqli_num_rows($result) > 0){
    // echo "done";	
$sql2 = "UPDATE tbl_user SET password ='{$newpass}' WHERE user_id={$id}";
$result = mysqli_query($conn,$sql2) or die("fail");
echo "Password Updated Successfully....";
echo '<script>alert("Password Updated Successfully....")</script>';
if($_SESSION['adm'] ==1){
    header("location:admin.php");
     } 
elseif($_SESSION['adm'] == 0){ 
    header("location:user.php");
    } 
}
mysqli_close($conn);
?>
