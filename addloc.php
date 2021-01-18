<?php 
$loc = $_POST['location'];
$dist = $_POST['distance'];

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
$sql = "INSERT INTO tbl_location(name,distance)
         VALUES ('$loc','$dist')";
if (mysqli_query($conn,$sql)) {
    header("location:showlocation.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
        ?>