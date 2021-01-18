<?php
session_start();
$otp2 = $_POST['otp1'];      
//  echo $otp2;
// echo "<br>";

if($otp2 == $_SESSION["OTP"]){
    echo "Success";
    
}else{
    echo "Failed";
    
}

        
?>