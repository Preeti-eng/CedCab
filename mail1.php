<?php
session_start();
$otp1 = $_POST['otp'];      



if($otp1 == $_SESSION["OTP"]){
    echo "Success";
    
}else{
    echo "Failed";
    
}

        
?>
