<?php
session_start();
if(!isset($_SESSION['username'])){
	header("location:login.php");
	exit;
} 
require('db.php'); 
$card_number = mysqli_real_escape_string($con, $_POST['card_number']); 
$expiry_month = mysqli_real_escape_string($con, $_POST['expiry_month']);      
$expiry_year= mysqli_real_escape_string($con, $_POST['expiry_year']);
 
$movie_name = mysqli_real_escape_string($con, $_POST['movie_name']); 
$date1 = mysqli_real_escape_string($con, $_POST['date1']);      
$seats= mysqli_real_escape_string($con, $_POST['seats']);   
$show = mysqli_real_escape_string($con, $_POST['show']);
$price = mysqli_real_escape_string($con, $_POST['price']);

$sql = mysqli_query($con,"SELECT * FROM credit_cards WHERE card_number = '$card_number' AND expiry_month = '$expiry_month' AND expiry_year='$expiry_year'");

$row = mysqli_num_rows($sql);
if($row==1){
	$sql1 = "INSERT INTO bookings (userid,seats,date,show1,price,movie_name) VALUES ('".$_SESSION['id']."','$seats','$date1','$show','$price','$movie_name')";
	$result   = mysqli_query($con, $sql1);
	$data['arr']= "right";
}
else{
	$data['arr']= "wrong details";
	
}
echo json_encode($data);
?>