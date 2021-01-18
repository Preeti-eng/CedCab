<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>
            Show User Info
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
$sql1 = "SELECT * FROM tbl_user";
$result = mysqli_query($conn,$sql1) or die("fail");
if(mysqli_num_rows($result) > 0){
        ?>
        <table id="table" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>DateofSignup(YYYY-MM-DD)</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email_id'];?></td>
                    <td><?php echo $row['dateofsignup']; ?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td><?php 
                            if($row['status']==1){
                                echo "Active User";
                            }elseif($row['status']==0){ 
                                echo "Blocked User"; }
                    ?>
                    </td>
                    <td>
                    <button style="background-color:black;"><a href="block.php?id=<?php echo $row['user_id'];?>"style="text-decoration:none;color:white;">Block</a></button>
                    <button style="background-color:black;"><a href="unblock.php?id=<?php echo $row['user_id'];?>"style="text-decoration:none;color:white;">Unblock</a></button>
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