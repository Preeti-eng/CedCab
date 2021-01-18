<?php
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="cab.css">
    </head>
    <body>
        <!-- ##################### Header ###################### -->
        <?php include "header.php" ?>
        
        <!-- ######################## Background & Form ##################### -->
        <div class="container-fluid">
            <div class="bg-img">
                <div style="text-align:center">
                    <h1 style=font-size:40px;>
                        Book a City Taxi to your destination in town
                    </h1>
                    <p>
                        Choose from a range of categories and prices
                    </p><br>
                </div>
                <div class="col-md-5" style="background-color:#f8f8f8;padding:4%;border-radius:2%;border:5px solid #808000;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="con text-center">
                                    <span style="background-color:#808000;font-size:20px;border-radius:100%;padding:3%;"><b>
                                        CITY TAXI
                                        </b></span>
                                </div>
                                <hr>
                                <div style="text-align:center;">
                                    <p id="para">
                                        <b>
                                            Your Everyday travel partner
                                        </b>
                                    </p>
                                    <p style="font-size:13px;">
                                        AC Cabs for point to point travel
                                    </p>
                                    <form>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text bg-light">PICKUP</label>
                                        <select class="form-select" id="drop" onchange="dis();" style="background:none !important;background-color:white !important;">
                                            <option value="select" selected="selected" disabled="disabled">Current Location</option>
                                            <?php 
                                                $conn = mysqli_connect("localhost", "root","","cedcab");
                                                if (!$conn) {
                                                    die("Connection failed: " . mysqli_connect_error());
                                                }
                                                $sql = "SELECT * FROM tbl_location";
                                                $result = mysqli_query($conn,$sql) or die("fail");
                                                while($row = mysqli_fetch_assoc($result)){  
                                                    if($row['is_available']==1){
                                             ?>
                                                    <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                                                    
                                            <?php
                                            
                                               
                                            }
                                          }
                                            ?>
                                            </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text bg-light">DROP</label>
                                        <select class="form-select bg-light" id="des" onchange="dis1();" style="background:none !important;background-color:white !important;">
                                            <option value="select" selected="selected" disabled="disabled">Select Destination</option>
                                            <?php
                                             $sql1 = "SELECT * FROM tbl_location";
                                             $result = mysqli_query($conn,$sql1) or die("fail");
                                             while($row = mysqli_fetch_assoc($result)){ 
                                                if($row['is_available']==1){ 
                                          ?>
                                        <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                                             
                                         <?php 
                                         
                                        } 
                                        }?>
                                         </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text bg-light">CABTYPE</label>
                                        <select class="form-select bg-light" id="cab" name="cab" style="background:none !important;background-color:white !important;">
                                            <option value="select" selected="selected" disabled="disabled">Select CAB Type</option>
                                            <option value="cedMicro">CedMicro</option>
                                            <option value="cedMini">CedMini</option>
                                            <option value="cedRoyal">CedRoyal</option>
                                            <option value="cedSUV">cedSUV</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-light" id="inputGroup-sizing-default">Luggage</span>
                                        <input type="text" id="weight" name="weight" placeholder="Enter Weight in Kg"
                                          class="form-control bg-light" aria-label="Sizing example input" 
                                          aria-describedby="inputGroup-sizing-default" onpaste="return false" onkeypress="return number(this, event);">
                                    </div>
                                    <input type="button" value="Calculate Fare" id="fare"
                                     style="background-color:#808000;font-size:15px;width:100%;border-radius:2px;" onclick="calculateFare()"><br><br>
                                    <p style="display:none;color:red;">*****CedMicro cab don't have luggage option.*****</p>
                                    <label id="res"></label><br><br>
                                    <button  id="y" style="background-color:black;display:none;width:100%;"><a href="book.php">Book Cab</a></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="res"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->



       
    
    <!-- ############################ Footer ################################## -->
    <?php include "footer.php" ?>
    <!-- ########################################## -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="cab.js"></script>
    </body>
</html>
