<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>
            Registration Form
        </title>
    </head>
    <body>
    <?php include "header1.php" ?>
    <div class="container-fluid">
    <h1 style="text-align:center;">Update Loction</h1>
    <hr>
    <?php
$conn = mysqli_connect("localhost", "root","","cedcab");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'];
$sql1 = "SELECT * FROM tbl_location WHERE id = {$id}";
$result = mysqli_query($conn,$sql1) or die("fail");
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        ?>
<form action="editlocation.php" method="POST" style="padding:10%;">
  <div class="form-group">
    <label>ID</label>
    <input type="number" class="form-control" aria-describedby="emailHelp"  name="id" value="<?php echo $row['id'];?>" readonly>
  </div>
  
  <div class="form-group">
    <label>Location</label>
    <input type="text" class="form-control" aria-describedby="emailHelp"  name="location" value="<?php echo $row['name'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Distance</label>
    <input type="number" class="form-control" name="distance" value="<?php echo $row['distance'];?>">
  </div>
  <div class="form-group">
    <!-- <label for="exampleInputPassword1">Is Available</label>
    <input type="number" class="form-control" name="avail" value="<?php //echo $row['is_available'];?>"> -->
    
    <!-- <button style="background-color:black;"><a href="available.php?id=<?php //echo $row['id'];?>"style="text-decoration:none;color:white;">Available</a></button>
    <button style="background-color:black;"><a href="unavailable.php?id=<?php// echo $row['id'];?>"style="text-decoration:none;color:white;">Unavailable</a></button> -->
                    
  </div>
  
  <button type="submit" class="btn btn-primary">UPDATE</button>
</form>
</div>
<?php
    }}
mysqli_close($conn);
        ?>
<?php include "footer.php" ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>