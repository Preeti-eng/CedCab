<?php
session_start();
$drop  = $_POST['drop'];
$_SESSION['pick'] = $drop;
$des  = $_POST['des'];
$_SESSION['dest'] = $des;
$cab  = $_POST['cab'];
$_SESSION['cab'] = $cab;
$weight  = $_POST['weight'];
$_SESSION['wt'] = $weight;

$dr = 0;
$de = 0;
$distance = 0;
$fare = 0;
$bookingamount = 0;
$totalfare = 0;
// $city = [
//     "Charbagh" => 0,
//     "Indiranagar" => 10,
//     "BBD" => 30,
//     "Barabanki"=> 60,
//     "Faizabad" => 100,
//     "Basti" => 150,
//     "Gorakhpur" => 210
// ];
$conn = mysqli_connect("localhost", "root","","cedcab");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM tbl_location";
$result = mysqli_query($conn,$sql) or die("fail");
while($row = mysqli_fetch_assoc($result)){ 
    $city[$row['name']]=$row['distance'];

 }

class Dis{
    function distanc(){
        global $city,$drop,$dr,$de,$des;
        foreach($city as $key => $value){
            if($key == $drop){
                $dr = $value;
            }
            if($key == $des){
                $de = $value;
            }
        }
    }
}
$disOb = new Dis();
$disOb->distanc();
$distance =abs($dr - $de);
echo "Distance is :".$distance." Km ";
$_SESSION['dis'] = $distance;

echo "<br>";
//*****************************************
class Fare{
    function cabFare(){
        global $cab,$bookingamount,$distance,$fare,$bookingamount;
        if($cab == 'cedMicro') {
            $bookingamount = 50;
            if($distance <= 10){
                $fare = $bookingamount + ($distance * 13.50);
            }
            elseif($distance > 10 && $distance <= 60){
                $fare = $bookingamount + (10*13.50);
                $distance = $distance - 10;
                $fare = $fare + ($distance*12.00);
            }
            elseif($distance > 60 && $distance <= 160){
                $fare = $bookingamount + (10*13.50);
                $distance = $distance - 10;
                $fare = $fare + (50*12.00);
                $distance = $distance - 50;
                $fare = $fare + ($distance*10.20);
            }   
            else{
                $fare = $bookingamount + (10*13.50);
                $distance = $distance - 10;
                $fare = $fare + (50*12.00);
                $distance = $distance - 50;
                $fare = $fare + (100*10.20);
                $distance = $distance - 100;
                $fare = $fare + ($distance*8.50);
            }  
        } 
        elseif($cab == 'cedMini') {
            $bookingamount = 150;
            if($distance <= 10){
                $fare = $bookingamount + $distance*14.50;
            }
            elseif($distance > 10 && $distance <= 60){
                $fare = $bookingamount + (10*14.50);
                $distance = $distance - 10;
                $fare = $fare + ($distance*13.00);
            }
            elseif($distance > 60 && $distance <= 160){
                $fare = $bookingamount + (10*14.50);
                $distance = $distance - 10;
                $fare = $fare + (50*13.00);
                $distance = $distance - 50;
                $fare = $fare + ($distance*11.20);
            }   
            else{
                $fare = $bookingamount + (10*14.50);
                $distance = $distance - 10;
                $fare = $fare + (50*13.00);
                $distance = $distance - 50;
                $fare = $fare + (100*11.20);
                $distance = $distance - 100;
                $fare = $fare + ($distance*9.50);
            }  
        } 
        elseif($cab == 'cedRoyal') {
            $bookingamount = 200;
            if($distance <= 10){
                $fare = $bookingamount + ($distance*15.50);
            }
            elseif($distance > 10 && $distance <= 60){
                $fare = $bookingamount + (10*15.50);
                $distance = $distance - 10;
                $fare = $fare + ($distance*14.00);
            }
            elseif($distance > 60 && $distance <= 160){
                $fare = $bookingamount + (10*15.50);
                $distance = $distance - 10;
                $fare = $fare + (50*14.00);
                $distance = $distance - 50;
                $fare = $fare + ($distance*12.20);
            }   
            else{
                $fare = $bookingamount + (10*15.50);
                $distance = $distance - 10;
                $fare = $fare + (50*14.00);
                $distance = $distance - 50;
                $fare = $fare + (100*12.20);
                $distance = $distance - 100;
                $fare = $fare + ($distance*10.50);
            }  
        } 
        elseif($cab == 'cedSUV') {
            $bookingamount = 250;
            if($distance <= 10){
                $fare = $bookingamount + ($distance*16.50);
            }
            elseif($distance > 10 && $distance <= 60){
                $fare = $bookingamount + (10*16.50);
                $distance = $distance - 10;
                $fare = $fare + ($distance*15.00);
            }
            elseif($distance > 60 && $distance <= 160){
                $fare = $bookingamount + (10*16.50);
                $distance = $distance - 10;
                $fare = $fare + (50*15.00);
                $distance = $distance - 50;
                $fare = $fare + ($distance*13.20);
            }   
            else{
                $fare = $bookingamount + (10*16.50);
                $distance = $distance - 10;
                $fare = $fare + (50*15.00);
                $distance = $distance - 50;
                $fare = $fare + (100*13.20);
                $distance = $distance - 100;
                $fare = $fare + ($distance*11.50);
            }  
        } 
        echo "Fare without luggage :".$fare." Rs ";
        echo "<br>";
    }
    // ****************************************************************************************************
    function luggage(){
        global $cab,$weight,$totalfare,$fare;
        if($cab == 'cedMini' || $cab == 'cedRoyal' ){
            if($weight == 0){
                $totalfare = $fare + 0;
            }
            elseif($weight <= 10){
                $totalfare = $fare + 50;
            }
            elseif($weight > 10 && $weight <= 20){
                $totalfare = $fare + 100;
            }
            else{
                $totalfare = $fare + 200;
            }
        }
        if($cab == 'cedSUV'){
            if($weight == 0){
                $totalfare = $fare + 0;
            }
            elseif( $weight <= 10){
                $totalfare = $fare + 100;
            }
            elseif($weight > 10 && $weight <= 20){
                $totalfare = $fare + 200;
            }
            else{
                $totalfare = $fare + 400;
            }
        }
        if($cab == 'cedMicro'){
            $totalfare = $fare + 0;
        }
    }
}
$Fare = new Fare();
$Fare->cabFare();
$Fare->luggage();
echo "Fare with luggage :".$totalfare." Rs ";
$_SESSION['fare'] = $totalfare;
?>