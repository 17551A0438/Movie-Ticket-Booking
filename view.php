<?php 
session_start();
if(!isset($_SESSION['username'])){
	header("location:login.php");
	exit;
} 
include("header.php");
?>
<form method="post" action="slot-booking.php" >
<div class="row justify-content-center">
	<div class="col-6">
		<a class="btn btn-primary" href="profile.php">Home Page</a>
		<br><br>
		<h3> Bookings </h3>   
		<table class="table container table-bordered table-striped mt-3">
		<thead>
			<th>Movie Image</th>
			<th>Movie Name</th>
			<th>Seats</th>
			<th>Date</th>
			<th>Show</th>
			<th>Price</th>
		</thead>
		<?php
		require('db.php');
		$result = mysqli_query($con,"SELECT * FROM bookings join movies on bookings.movie_name = movies.movie_name WHERE bookings.userid='".$_SESSION['id']."'");
		while($row = mysqli_fetch_assoc($result)){
				echo "<tbody>";
				echo "<tr>";
				?>
				<td><img src="upload/<?php echo $row['images'];?>" alt ="images" style="width:75px"></td>
				<?php
				echo "<td>" . $row['movie_name'] . "</td>";
				echo "<td>" . $row['seats'] . "</td>";
				echo "<td>" . $row['date'] . "</td>";
				echo "<td>" . $row['show1'] . "</td>";
				echo "<td>" . $row['price'] . "</td>";
				echo "</tr>";
				echo "</tbody>";
		}?>
		</table>
	</div>
</div>
</form>
<?php
mysqli_close($con);
include("footer.php");
?>