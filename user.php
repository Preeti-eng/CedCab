<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>
            user pannel
        </title>
    </head>
    <body>
    <?php include "header2.php" ?>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cedcab";
$id = $_SESSION['id'];
$pending = 0;
$cancle = 0;
$complete = 0;
$total = 0;
$count = 0;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "SELECT * FROM tbl_ride WHERE customer_user_id={$id}";
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
}?>
    <div class="container-fluid">
    <div class="container-fluid" style="padding:5%;">
    <div class="row" style="padding:1%;text-align:center;">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pending Rides</h5>
        <p class="card-text"><?php echo $pending;?></p>
        <a href="pending.php" class="btn" style="background-color:#808000;">Pending Rides</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Canceled Rides</h5>
        <p class="card-text"><?php echo $cancle; ?></p>
        <a href="cancleride.php" class="btn" style="background-color:#808000;">Cancelled Rides</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Completed Rides</h5>
        <p class="card-text"><?php echo $complete; ?></p>
        <a href="completeride.php" class="btn" style="background-color:#808000;">Completed Rides</a>
      </div>
    </div>
  </div>
  </div>
  <div class="row" style="padding:1%;text-align:center;">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">All Rides</h5>
        <p class="card-text"><?php echo $count; ?></p>
        <a href="showallrides.php"class="btn" style="background-color:#808000;">All Rides</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Expanses</h5>
        <p class="card-text"><?php echo $total; ?></p>
        <a href="#" class="btn" style="background-color:#808000;">Total Expanses</a>
      </div>
    </div>
  </div>
  </div>
</div>
   </div>




<div class="container-fluid" style="padding:5%;">
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cedcab";
$id = $_SESSION['id'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "SELECT * FROM tbl_ride WHERE customer_user_id={$id}";
$result = mysqli_query($conn,$sql1) or die("fail");
if(mysqli_num_rows($result) > 0){
        ?>
        <table id="table" class="table table-striped">
            <thead>
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Cab Type</th>
                    <th>Ride Date</th>
                    <th>Total Distance</th>
                    <th>Luggage</th>
                    <th>Total Fare</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
    while($row = mysqli_fetch_assoc($result)){
        if($row['status']==1){
                ?>
                <tr>
                    <td><?php echo $row['from'];?></td>
                    <td><?php echo $row['to'];?></td>
                    <td><?php echo $row['cab_type'];?></td>
                    <td><?php echo $row['ride_date'];?></td>
                    <td><?php echo $row['total_distance'];?></td>
                    <td><?php echo $row['luggage'];?></td>
                    <td><?php echo $row['total_fare'];?></td>
                    <td><?php 
                            if($row['status']==0){
                                echo "Cancelled";
                            }elseif($row['status']==1){ 
                                echo "Pending"; }
                            elseif($row['status']==2){ 
                                echo "Complete"; }
                    ?></td>
                    <td>
                    <button style="background-color:black;"><a href="cancle.php?id=<?php echo $row['ride_id'];?>"style="text-decoration:none;color:white;">Cancle</a></button>   
                    </td>
                </tr>
                <?php 
    	}	}
                ?>
            </tbody>
           
        </table>
        <?php
}
else{
    echo "<p>No Records found</p>";
}
    mysqli_close($conn);

        ?>

</div>



   
<?php include "footer.php" ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>