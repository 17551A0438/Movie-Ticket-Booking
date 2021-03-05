<?php 
include('db.php');
session_start();
if(!isset($_SESSION['username'])){
	header("location:login.php");
	exit;
} 
include("header.php");
?>
<style>
<style>
* {
  box-sizing: border-box;
}
.row {
  display: flex;
}

.column {
  flex: 20%;
  padding: 5px;
}
.image{
	height:350px;
}
</style>
</style>
<body>
<div class="row justify-content-center">
	<div class="col-18">
		<a class="btn btn-primary" href="view.php">View Bookings</a>
	</div>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="upload/poster1.jpg" class="d-block w-100 p-3 image" alt="...">
    </div>
    <div class="carousel-item">
      <img src="upload/poster.jpg" class="d-block w-100 p-3 image" alt="...">
    </div>
    <div class="carousel-item">
      <img src="upload/poster2.jpg" class="d-block w-100 p-3 image" alt="...">
    </div>
	<div class="carousel-item">
      <img src="upload/poster3.jpg" class="d-block w-100 p-3 image" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container">
<h3>Recommended Movies</h3>
	<div class="row justify-content-center">
	<?php
	include('db.php');
	$sql  =  "SELECT * FROM movies";
	$query = mysqli_query($con,$sql);
	$check = mysqli_num_rows($query) > 0;
	if($check){
		while($row = mysqli_fetch_array($query))
		{
			?>
			<div class="col">
			<br>
				<div class="row">
					<div class="col">
						<img src="upload/<?php echo $row['images'];?>" alt ="images" style="width:100%">
						<br>
						<div>
							<h3><?php echo $row['movie_name']; ?></h3>
							<i><?php echo $row['descrip'];?></i>
							<br>
							<form action="bookings.php" method="post">
								<input type= "hidden" name="id" value ="<?php echo $row['id'];?>"/>
								<button type="submit" class="btn btn-primary" name="submit">Book Now</button>
							</form>
						</div>
					</div>
				
			</div>
		</div>
		<?php
		}
	}
		?>
<?php
include("footer.php");
?>