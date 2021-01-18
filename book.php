<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("location:login.php");
    // echo "fail";
}else{
    header("location:insertlocation.php");
    echo "failed"; 
}


?>