<?php
session_start();
require('db.php');
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
$query    = "INSERT into userdetails (username, password,phone_number) VALUES ('$username', '" . md5($password) . "','$phone_number')";
$result   = mysqli_query($con, $query);
if ($result){
	$s="SELECT * FROM userdetails WHERE phone_number = '$phone_number' and password = '".md5($password)."'";
	$l=mysqli_query($con,$s);
	$fetch=mysqli_fetch_assoc($l);
	$_SESSION['id']=$fetch['userid'];
	header('location:login.php');
	exit();
}
?>