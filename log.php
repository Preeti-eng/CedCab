<?php 
session_start();
$uname = $_POST['name'];
$pass = $_POST['pass'];
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
$sql = "SELECT * FROM tbl_user WHERE email_id  = '$uname' and password = '$pass'";
$result = mysqli_query($conn,$sql) or die("fail");

if(mysqli_num_rows($result) > 0){	
	//echo "login success";
	$row = mysqli_fetch_assoc($result);
			if ($row['is_admin']==1){
			$_SESSION['mail'] = $uname;
			$_SESSION['email'] = $row['name'];
			$_SESSION['id'] = $row['user_id'];
			$_SESSION['mobile'] = $row['mobile'];
			$_SESSION['passwd'] = $row['password'];
			$_SESSION['status'] = $row['status'];
			$_SESSION['adm'] = $row['is_admin'];
			 header("location:admin.php");
			
			}
			elseif ($row['is_admin']==0) {
			$_SESSION['email'] = $row['name'];
			$_SESSION['id'] = $row['user_id'];
			echo $_SESSION['id'];

			$_SESSION['mail'] = $uname;
			$_SESSION['email'] = $row['name'];
			$_SESSION['id'] = $row['user_id'];
			$_SESSION['mobile'] = $row['mobile'];
			$_SESSION['passwd'] = $row['password'];
			$_SESSION['status'] = $row['status'];
			$_SESSION['adm'] = $row['is_admin'];

			if($row['status']==1){
			header("location:user.php");
			}else{
				//echo "<script type='text/javascript'>alert('You Blocked By the Admin..')</script>";
				header("location:login.php");
			}
			//echo "user";
			}
}else{
	header("location:login.php");
	
}

mysqli_close($conn);
?>