<?php 
$mail = $_POST['maile'];
$mobil= $_POST['mobil'];
$name = $_POST['name'];
$pass= $_POST['pass'];
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
$sql = "INSERT INTO tbl_user(email_id,name,mobile,status,password,is_admin)
         VALUES ('$mail','$name','$mobil','1','$pass','0')";
if (mysqli_query($conn,$sql)) {
    echo "New record created successfully!!!!Sign In Now.....";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
        ?>