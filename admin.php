<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>
            Admin pannel
        </title>
    </head>
    <body>
    <?php include "header1.php"?>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cedcab";
//$id = $_SESSION['id'];
$pending = 0;
$cancle = 0;
$complete = 0;
$total = 0;
$count = 0;
$user=0;
$loc = 0;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "SELECT * FROM tbl_ride";
$result = mysqli_query($conn,$sql1) or die("fail");
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $count++;
    if($row['status']==1){
      $pending++;
    }elseif($row['status']==2){
      $complete++;
      $total += $row['total_fare'];
    }else{
      $cancle++;
    }
  }
}
$sql = "SELECT * FROM tbl_user";
$result = mysqli_query($conn,$sql) or die("fail");
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $user++;
    
  }
}
$sql2 = "SELECT * FROM tbl_location";
$result = mysqli_query($conn,$sql2) or die("fail");
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $loc++;
    
  }
}


?>
    <div class="container-fluid" style="padding:5%;">
    <div class="row" style="padding:1%;text-align:center;">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Ride Requests</h5>
        <p class="card-text"><?php echo $pending; ?></p>
        <a href="adminpending.php" class="btn" style="background-color:#808000;">Ride Requests</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Completed Rides</h5>
        <p class="card-text"><?php  echo $complete;?></p>
        <a href="admincompleteride.php" class="btn" style="background-color:#808000;">Completed Rides</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Canceled Rides</h5>
        <p class="card-text"><?php echo $cancle;?></p>
        <a href="admincancleride.php"class="btn" style="background-color:#808000;">Cancled Rides</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">All Rides</h5>
        <p class="card-text"><?php echo $count;  ?></p>
        <a href="showrides.php" class="btn" style="background-color:#808000;">All Rides</a>
      </div>
    </div>
  </div>
</div>
<div class="row" style="padding:1%;text-align:center;">
 
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">All Users</h5>
        <p class="card-text"><?php echo $user;  ?></p>
        <a href="showUserInfo.php" class="btn" style="background-color:#808000;">All Users</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Serviceable Locations</h5>
        <p class="card-text"><?php echo $loc; ?></p>
        <a href="showlocation.php" class="btn" style="background-color:#808000;">serviceable Locations</a>
      </div>
    </div>
  </div>
</div>

    </div>
<?php include "footer.php"?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>