<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>
            Show Location
        </title>
    </head>
    <body>
    <?php include "header1.php"?>
    <div class="container-fluid" style="padding:5%;">
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cedcab";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "SELECT * FROM tbl_location";
$result = mysqli_query($conn,$sql1) or die("fail");
if(mysqli_num_rows($result) > 0){
        ?>
        <table id="table" class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Distance</th>
                    <th>Is_Available</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['distance']; ?></td>
                    <td>
                    <?php
                    if($row['is_available']==1){
                        echo "Available";
                    }elseif($row['is_available']==0){ 
                        echo "Not Available"; }?>
                    </td>
                    <td>
                    <button style="background-color:black;"><a href="edit.php?id=<?php echo $row['id'];?>"style="text-decoration:none;color:white;">Edit</a></button>
                    <button style="background-color:black;"><a href="delete.php?id=<?php echo $row['id'];?>"onclick="return confirm('Are you sure?')" style="text-decoration:none;color:white;">Delete</a></button>
                    <button style="background-color:black;"><a href="available.php?id=<?php echo $row['id'];?>"style="text-decoration:none;color:white;">Available</a></button>
                    <button style="background-color:black;"><a href="unavailable.php?id=<?php echo $row['id'];?>"style="text-decoration:none;color:white;">Unavailable</a></button> 
                    </td>
                </tr>
                <?php 
    				}
                ?>
            </tbody>
           
        </table>
        <?php
}
else{
    echo "<p>No Records found</p>";
    mysqli_close($conn);
}
        ?>
       
</div>
<?php include "footer.php" ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
        <script>
            $(document).ready(function(){
                $('#table').dataTable();
            }
							 );
			
        </script>
    </body>
</html>