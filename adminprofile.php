<?php
session_start();
include("header.php");
require('db.php');
if(isset($_POST['movie_name'])){
	$movie_name = mysqli_real_escape_string($con,$_POST['movie_name']); 
	$descrip = mysqli_real_escape_string($con,$_POST['descrip']);
	$start_date = mysqli_real_escape_string($con,$_POST['start_date']);
	$end_date = mysqli_real_escape_string($con,$_POST['end_date']);
	$edit_price = mysqli_real_escape_string($con,$_POST['edit_price']);
	$filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
    $folder = "upload/".$filename; 
	$sql = "INSERT INTO movies (movie_name,descrip,images,start_date,end_date,price) VALUES ('$movie_name','$descrip','$filename','$start_date','$end_date','$edit_price')";
	if(mysqli_query($con, $sql) ){
	header("Location: adminprofile.php");
	}
}
?>
<html>
<style>
* {
  box-sizing: border-box;
}
h1{
	padding-left:10px;
	color:blue;
}
.row {
  display: flex;
}

.column {
  flex: 20%;
  padding: 5px;
}
.invalid{
	color:red;
}
.image{
	width:100%;
	height:350px;
}
</style>
<body>

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


<div class="row justify-content-center">
	<div class="col-1">
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add New</button>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Movie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="update_form" action="" method="post" enctype="multipart/form-data">
				<div class="mt-2">
					<label>Upload Movie Image</label>
					<br>
					<input type="file" id="myFile" name="uploadfile"/>
					<span id="p5" class="invalid"></span>
				</div>
				<div class="mt-2">	
					<label>Name of the Movie</label>
					<input type="text" class="form-control mt-2" name="movie_name" id="moname"/>
					<span id="p1" class="invalid"></span>
				</div>
				<div class="mt-2">	
					<label>Description</label>
					<input type="text" class="form-control mt-2" name="descrip" id="descrip" style="font-style:italic"/>
					<span id="p6" class="invalid"></span>
				</div>
				<div class="mt-2">	
					<label>Date Start</label>
					<input type="text" class="form-control mt-2" id="start_date" name="start_date"/>
					<span id="p2" class="invalid"></span>
				</div>
				<div class="mt-2">
					<label>End Date</label>
					<input type="text" class="form-control mt-2" id="end_date" name="end_date"/>
					<span id="p3" class="invalid"></span>
				</div>
				<div class="mt-2">
					<label>Price</label>
					<input type="number" class="form-control mt-2" id="edit_price" name="edit_price" placeholder="Price"/>	
					<span id="p4" class="invalid"></span>	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" name="upload" id="upload">Save</button>
				</div>
			</form>
      </div>
    </div>
  </div>
</div>


<div class="container">
	<div class="row justify-content-center">
	
	<?php
	include('db.php');
	$sql  =  "SELECT * FROM movies";
	$query = mysqli_query($con,$sql);
	$check = mysqli_num_rows($query) > 0;
	if($check){
		while($row = mysqli_fetch_assoc($query))
		{
			?>
			<div class="col-3">
			<br>
				<div class="row">
					<div class="col">
						<img src="upload/<?php echo $row['images'];?>" alt ="images" style="width:100%">
						<br>
						<div>
							<h3><?php echo $row['movie_name']; ?></h3>
							<i><?php echo $row['descrip'];?></i>
							<br>
							<a class="btn btn-primary" href="details.php">Details</a>
						</div>
					</div>
			</div>
		</div>
		<?php
		}
	}
		?>
		
<script>
$(document).ready(function(){
	$('#upload').click(function(){
		validateForm();
	});
	$('#moname').keyup(function(){
		$("#p1").html("");
	});
	$('#descrip').keyup(function(){
		$("#p6").html("");
	});
	$('#start_date').on('change',function(){
		$("#p2").html("");
	});
	$('#end_date').on('change',function(){
		$("#p3").html("");
	});
	$('#edit_price').keyup(function(){
		$("#p4").html("");
	});
	$("#start_date").datepicker({
		minDate:0,
		dateFormat:"yy-mm-dd"
	});
	$("#end_date").datepicker({
		minDate:0,
		dateFormat:"yy-mm-dd"
	});
	function validateForm()
	{
		var valid = true;
		var moname = $("#moname").val();
		var descrip = $("#descrip").val();
		var start_date = $("#start_date").val();
		var end_date = $("#end_date").val();
		var edit_price = $("#edit_price").val();
		
		if(moname == '' || moname == null){
			valid = false;
			$("#p1").html("*Please enter movie name");
		}
		else{
			$("#p1").html("");
		}
		if(descrip == '' || descrip == null){
			valid = false;
			$("#p6").html("*Please enter Description");
		}
		else{
			$("#p6").html("");
		}
		if(start_date == '' || start_date == null){
			valid = false;
			$("#p2").html("*Please choose start date");
		}
		else{
			$("#p2").html("");
		}
		if(end_date == '' || end_date == null){
			valid=false;
			$("#p3").html("*Please Choose end date");
		}
		else{
			$("#p3").html("");
		}
		if(edit_price == '' || edit_price == null){
			valid=false;
			$("#p4").html("*Please Enter Price");
		}
		else{
			$("#p4").html("");
		}
		if(valid)
			$('#update_form').submit();
	}
});
</script>
<?php
include("footer.php");
?>