<?php
require('db.php'); 
$date1 = mysqli_real_escape_string($con, $_POST['date1']);        
$show = mysqli_real_escape_string($con, $_POST['show']);
$sql = mysqli_query($con,"SELECT * FROM bookings WHERE seats='$seats' and show1 = '$show'");

while($result = mysqli_fetch_array($sql))
{
    $data[]=$result['seats_booked'];
} 
echo json_encode($data);
?>