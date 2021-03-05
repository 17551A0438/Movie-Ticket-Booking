<?php
session_start();
include("header.php");
?>
<html>
<style>
.screen
{
  width:100%;
  height:20px;
  background:blue;
  color:#fff;
  line-height:20px;
  font-size:15px;
}
.smallBox::before
{
  content:".";
  width:15px;
  height:15px;
  float:left;
  margin-right:10px;
}
.greenBox::before
{
  content:"";
  background:Green;
}
.redBox::before
{
  content:"";
  background:Red;
}
.emptyBox::before
{
  content="";
  box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
    background-color:grey;
} 
.seatGap
{
  width:40px;
}
.seatVGap
{
  height:40px;
}
table
{
  text-align:center;
}
.Displaytable
{
  text-align:center;
}
.Displaytable td, .Displaytable th {
    border: 1px solid;
    text-align: left;
}
input[type=checkbox] {
    width:0px;
    margin-right:18px;
}

input[type=checkbox]:before {
    content: "";
    width: 15px;
    height: 15px;
    display: inline-block;
    vertical-align:middle;
    text-align: center;
    box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
    background-color:#ccc;
}

input[type=checkbox]:checked:before {
    background-color:Green !important;
    font-size: 15px;
}
.show1{
    width: 150px;
}
.date1{
    width: 150px;
}
.price{
    width: 150px;
}
.seat{
    width: 200px;
}
.invalid{
	color:red;
}
</style>
<body>

<?php
	include('db.php');
	if(isset($_POST['submit'])){
		$id = mysqli_real_escape_string($con,$_POST['id']); 
		$sql  =  "SELECT * FROM movies WHERE id='$id'";
		$query = mysqli_query($con,$sql);
		$check = mysqli_num_rows($query) > 0;
		if($check){
			while($row = mysqli_fetch_array($query))
			{
				$v =$row['price'];
				$a =$row['start_date'];
				$b =$row['end_date'];
				$c =$row['movie_name'];
				
				?>
				<form id="myform" action="book.php" method="post" onsubmit="return true">
				<div class="col">
					<div class="row">
						<div class="col-3">
							<img src="upload/<?php echo $row['images'];?>" alt ="images">
							<div>
							
								<h3><?php echo $row['movie_name']; ?></h3>
								
								<i><?php echo $row['descrip'];?></i>
								
								
								<!--<div class="mt-2">
									<label for="price" class="price">Ticket</label>
									<input type="text" value="<?php echo $row['price']; ?>" name="price" class="form-control mb-2 date1" disabled> 
								</div>-->
								
								<div>
									<label for="date1">Select a Date:</label>
									<input  type="text"  id="date1" class="form-control mb-2 date1" name="date1">
									<span id="p1" class="invalid"></span>
								</div>
								
								<!--<div class="mt-2">
									<label for="date1" class="date1">Date</label>
									<select id="date1" name="date1" class="form-control mb-2 date1"> <br>
										<option value="">Date</option>
										<option><?php echo $row['start_date'];?></option>
									</select>
									<span id="p1" class="invalid"></span>
								</div>-->
								
								<div class="mt-2">
									<label for="show" class="show1">Show</label>
									<select id="show1" name="show1" class="form-control mb-2 show1"> <br>
										<option value="">Show Time</option>
										<option value="11:00">11:00</option>
										<option value="02:30">02:30</option>
										<option value="06:15">06:15</option>
										<option value="09:30">09:30</option>
									</select>
									<span id="p2" class="invalid"></span>
								</div>
								
							</div>
						</div>
						<div class="seatStructure">
							<table id="seatsBlock">
							
									<div class="mt-2">
										<label for="sea" class="sea">Seats</label>
										<input type="text" id="arr" name="arrayelements" class="form-control mb-2 seat" value="" disabled> 
										<span id="p3" class="invalid"></span>
									</div>
									
									<div class="mt-2">
										<label for="price" class="price">Price</label>
										<input type="text" id="price" name="price" class="form-control mb-2 price" disabled> 
										<span id="p4" class="invalid"></span>
									</div>
									
								<tr>
									<td colspan="14"><div class="screen">SCREEN</div></td>
										<td rowspan="20">
										  <div class="smallBox greenBox">Selected Seat</div> <br/>
										  <div class="smallBox redBox">Reserved Seat</div><br/>
										  <div class="smallBox emptyBox">Empty Seat</div><br/>
										</td>
									<br/>
								</tr>

								<tr>
									<td></td>
									<td>1</td>
									<td>2</td>
									<td>3</td>
									<td>4</td>
									<td>5</td>
									<td></td>
									<td>6</td>
									<td>7</td>
									<td>8</td>
									<td>9</td>
									<td>10</td>
									<td>11</td>
									<td>12</td>
								</tr>
							  
								<tr id="layout">
									<td>A</td>
									<td><input type="checkbox" class="seats" value="A1"></td>
									<td><input type="checkbox" class="seats" value="A2"></td>
									<td><input type="checkbox" class="seats" value="A3"></td>
									<td><input type="checkbox" class="seats" value="A4"></td>
									<td><input type="checkbox" class="seats" id="se" value="A5"></td>
									<td class="seatGap"></td>
									<td><input type="checkbox" class="seats" value="A6"></td>
									<td><input type="checkbox" class="seats" value="A7"></td>
									<td><input type="checkbox" class="seats" value="A8"></td>
									<td><input type="checkbox" class="seats" value="A9"></td>
									<td><input type="checkbox" class="seats" value="A10"></td>
									<td><input type="checkbox" class="seats" value="A11"></td>
									<td><input type="checkbox" class="seats" value="A12"></td>
								  </tr>
							  
								  <tr>
									<td>B</td>
									<td><input type="checkbox" class="seats" value="B1"></td>
									<td><input type="checkbox" class="seats" value="B2"></td>
									<td><input type="checkbox" class="seats" value="B3"></td>
									<td><input type="checkbox" class="seats" value="B4"></td>
									<td><input type="checkbox" class="seats" value="B5"></td>
									<td></td>
									<td><input type="checkbox" class="seats" value="B6"></td>
									<td><input type="checkbox" class="seats" value="B7"></td>
									<td><input type="checkbox" class="seats" value="B8"></td>
									<td><input type="checkbox" class="seats" value="B9"></td>
									<td><input type="checkbox" class="seats" value="B10"></td>
									<td><input type="checkbox" class="seats" value="B11"></td>
									<td><input type="checkbox" class="seats" value="B12"></td>
								  </tr>
								  
								  <tr>
									<td>C</td>
									<td><input type="checkbox" class="seats" value="C1"></td>
									<td><input type="checkbox" class="seats" value="C2"></td>
									<td><input type="checkbox" class="seats" value="C3"></td>
									<td><input type="checkbox" class="seats" value="C4"></td>
									<td><input type="checkbox" class="seats" value="C5"></td>
									<td></td>
									<td><input type="checkbox" class="seats" value="C6"></td>
									<td><input type="checkbox" class="seats" value="C7"></td>
									<td><input type="checkbox" class="seats" value="C8"></td>
									<td><input type="checkbox" class="seats" value="C9"></td>
									<td><input type="checkbox" class="seats" value="C10"></td>
									<td><input type="checkbox" class="seats" value="C11"></td>
									<td><input type="checkbox" class="seats" value="C12"></td>
								</tr>
							  
								<tr>
									<td>D</td>
									<td><input type="checkbox" class="seats" value="D1"></td>
									<td><input type="checkbox" class="seats" value="D2"></td>
									<td><input type="checkbox" class="seats" value="D3"></td>
									<td><input type="checkbox" class="seats" value="D4"></td>
									<td><input type="checkbox" class="seats" value="D5"></td>
									<td></td>
									<td><input type="checkbox" class="seats" value="D6"></td>
									<td><input type="checkbox" class="seats" value="D7"></td>
									<td><input type="checkbox" class="seats" value="D8"></td>
									<td><input type="checkbox" class="seats" value="D9"></td>
									<td><input type="checkbox" class="seats" value="D10"></td>
									<td><input type="checkbox" class="seats" value="D11"></td>
									<td><input type="checkbox" class="seats" value="D12"></td>
								</tr>
							  
								<tr>
									<td>E</td>
									<td><input type="checkbox" class="seats" value="E1"></td>
									<td><input type="checkbox" class="seats" value="E2"></td>
									<td><input type="checkbox" class="seats" value="E3"></td>
									<td><input type="checkbox" class="seats" value="E4"></td>
									<td><input type="checkbox" class="seats" value="E5"></td>
									<td></td>
									<td><input type="checkbox" class="seats" value="E6"></td>
									<td><input type="checkbox" class="seats" value="E7"></td>
									<td><input type="checkbox" class="seats" value="E8"></td>
									<td><input type="checkbox" class="seats" value="E9"></td>
									<td><input type="checkbox" class="seats" value="E10"></td>
									<td><input type="checkbox" class="seats" value="E11"></td>
									<td><input type="checkbox" class="seats" value="E12"></td>
								</tr>
							  
								<tr></tr>
							  
								<tr>
									<td>F</td>
									<td><input type="checkbox" class="seats" value="F1"></td>
									<td><input type="checkbox" class="seats" value="F2"></td>
									<td><input type="checkbox" class="seats" value="F3"></td>
									<td><input type="checkbox" class="seats" value="F4"></td>
									<td><input type="checkbox" class="seats" value="F5"></td>
									<td></td>
									<td><input type="checkbox" class="seats" value="F6"></td>
									<td><input type="checkbox" class="seats" value="F7"></td>
									<td><input type="checkbox" class="seats" value="F8"></td>
									<td><input type="checkbox" class="seats" value="F9"></td>
									<td><input type="checkbox" class="seats" value="F10"></td>
									<td><input type="checkbox" class="seats" value="F11"></td>
									<td><input type="checkbox" class="seats" value="F12"></td>
								</tr>
							  
								<tr>
									<td>G</td>
									<td><input type="checkbox" class="seats" value="G1"></td>
									<td><input type="checkbox" class="seats" value="G2"></td>
									<td><input type="checkbox" class="seats" value="G3"></td>
									<td><input type="checkbox" class="seats" value="G4"></td>
									<td><input type="checkbox" class="seats" value="G5"></td>
									<td></td>
									<td><input type="checkbox" class="seats" value="G6"></td>
									<td><input type="checkbox" class="seats" value="G7"></td>
									<td><input type="checkbox" class="seats" value="G8"></td>
									<td><input type="checkbox" class="seats" value="G9"></td>
									<td><input type="checkbox" class="seats" value="G10"></td>
									<td><input type="checkbox" class="seats" value="G11"></td>
									<td><input type="checkbox" class="seats" value="G12"></td>
								</tr>
							  
								<tr>
									<td>H</td>
									<td><input type="checkbox" class="seats" value="H1"></td>
									<td><input type="checkbox" class="seats" value="H2"></td>
									<td><input type="checkbox" class="seats" value="H3"></td>
									<td><input type="checkbox" class="seats" value="H4"></td>
									<td><input type="checkbox" class="seats" value="H5"></td>
									<td></td>
									<td><input type="checkbox" class="seats" value="H6"></td>
									<td><input type="checkbox" class="seats" value="H7"></td>
									<td><input type="checkbox" class="seats" value="H8"></td>
									<td><input type="checkbox" class="seats" value="H9"></td>
									<td><input type="checkbox" class="seats" value="H10"></td>
									<td><input type="checkbox" class="seats" value="H11"></td>
									<td><input type="checkbox" class="seats" value="H12"></td>
								</tr>
							  
								<tr>
									<td>I</td>
									<td><input type="checkbox" class="seats" value="I1"></td>
									<td><input type="checkbox" class="seats" value="I2"></td>
									<td><input type="checkbox" class="seats" value="I3"></td>
									<td><input type="checkbox" class="seats" value="I4"></td>
									<td><input type="checkbox" class="seats" value="I5"></td>
									<td></td>
									<td><input type="checkbox" class="seats" value="I6"></td>
									<td><input type="checkbox" class="seats" value="I7"></td>
									<td><input type="checkbox" class="seats" value="I8"></td>
									<td><input type="checkbox" class="seats" value="I9"></td>
									<td><input type="checkbox" class="seats" value="I10"></td>
									<td><input type="checkbox" class="seats" value="I11"></td>
									<td><input type="checkbox" class="seats" value="I12"></td>
								</tr>
							  
								<tr>
									<td>J</td>
									<td><input type="checkbox" class="seats" value="J1"></td>
									<td><input type="checkbox" class="seats" value="J2"></td>
									<td><input type="checkbox" class="seats" value="J3"></td>
									<td><input type="checkbox" class="seats" value="J4"></td>
									<td><input type="checkbox" class="seats" value="J5"></td>
									<td></td>
									<td><input type="checkbox" class="seats" value="J6"></td>
									<td><input type="checkbox" class="seats" value="J7"></td>
									<td><input type="checkbox" class="seats" value="J8"></td>
									<td><input type="checkbox" class="seats" value="J9"></td>
									<td><input type="checkbox" class="seats" value="J10"></td>
									<td><input type="checkbox" class="seats" value="J11"></td>
									<td><input type="checkbox" class="seats" value="J12"></td>
								</tr>
							</table>
							<br>
							<div class="row justify-content-center">
								<div class="col">
									<a class="btn btn-danger" href="profile.php" >Cancel</a>
									
									<!--<a class="btn btn-success" href="pay.php" name="action" id="confirms" data-toggle="modal" data-target="#exampleModal">Confirm</a>-->
									
									<!--<input  type="button" class="btn btn-success" name="action" id="confirms" value="Confirm">-->
									
									<input  type="button" class="btn btn-success" name="action" id="confirms" value="Confirm">
									
								</div>
							</div>
							
							<div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										</div>
										
											<div class="modal-body">
											<form id="pay" method="post">
											
											
												<div class="row">
													<div class="col-6">
														<div class="mt-2">
															<img src="upload/<?php echo $row['images'];?>" style="width:100px;" alt ="images">
														</div>
															
															
														<div class="mt-2">	
															<h3><?php echo $row['movie_name']; ?></h3>
															<i><?php echo $row['descrip'];?></i>
														</div>
													</div>
													
												<div class="col-6">
													<div class="mt-2">
														<label>Seats:</label>
														<span id="seats"></span>
													</div>
													
													<div class="mt-2">
														<label>Date:</label>
														<span id="date2"></span>
													</div>
													
													<div class="mt-2">
														<label>Show:</label>
														<span id="show2"></span>
													</div>
													
													<div class="mt-2">
														<label>Price:</label>
														<span id="m_price" disabled></span>
													</div>
												</div>
												</div>
												<div class="form-group">
													<label>Card Number</label>
													<input type="text" class="form-control" id="e_card" name="e_card" maxlength="16" placeholder="Card Number"/>
												</div>
												
												<div class="form-group">
													<label>Expiry Month</label>
													<input type="text" class="form-control" id="e_month" name="e_month" maxlength="2" placeholder="MM"/>
												</div>
												
												 <div class="form-group">
													<label>Expiry Year</label>
													<input type="text" class="form-control" name="e_year" id="e_year" placeholder="YYYY" maxlength="4"/>
												</div>
												
												

												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
														<button type="button" class="btn btn-primary" name="book" id="pay">Pay Now</button>
												</div>	
											</form>
										</div>
									</div>
								</div>
							</div>
							
						</div>						
					</div>	
				</div>
				</form>
		<?php
		}
		}
	}
		?>
<script>
$(document).ready(function(){
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth()+1;
	var year = date.getFullYear();
	var dt =year+'-'+(month<10 ? '0':'')+month+'-'+(day<10 ? '0':'')+day;
	console.log(dt);
	var hour = date.getHours();
	var min = date.getMinutes();
	var time = (hour<10 ? '0':'')+hour+':'+(min<10 ? '0':'')+min;
	console.log(time);
	
	
	var a="<?php echo $a;?>"
	var b="<?php echo $b;?>"
	var c = "<?php echo $c;?>"
	$("#date1").datepicker({
		minDate:a,
		dateFormat:"yy-mm-dd",
		maxDate:b
		
	});

	var array1=[];
	var v="<?php echo $v;?>";
	$(".seats").click(function(){
		var date1 = $("#date1").val();
		var show1 = $("#show1").val();
		var ide=$(this).val();
		if(date1 == '' || date1 == null){
			valid = false;
			$("#p1").html("*Please Choose Date");
		}
		else{
			$("#p1").html("");
		}
		if(show1 == '' || show1 == null){
			valid = false;
			$("#p2").html("*Please Choose Show");
		}
		else
		{
		var array3=$.inArray(ide,array1);
		if(array3==-1)
		{
			if(array1.length<6)
			{
				array1.push(ide);
				$(this).addClass('btn-success');
			}
			else
			{
				$("#p3").html("*Only 6 Tickets Should be book");
			}
		}
		else
		{
			array1.splice(array3, 1);
			$(this).removeClass('btn-success');     
		}
		$("input[name=arrayelements]").val(array1.join(", ")); 
		$("input[name=price]").val(array1.length*v);
		}
	});
	
	$('#confirms').click(function(){
	validateForm();
	});
	/*$('#date1').keyup(function(){
		$("#p1").html("");
	});*/
	$('#date1').on('change',function(){
		$("#p1").html("");
	});
	$('#show1').on('change',function(){
		$("#p2").html("");
	});
	$('#arr').keyup(function(){
		$("#p3").html("");
	});
	function validateForm()
	{
		var valid = true;
		var date1 = $("#date1").val();
		var show1 = $("#show1").val();
		var seats = $("#arr").val();
		var price = $("#price").val();
		
		if(date1 == '' || date1 == null){
			valid = false;
			$("#p1").html("*Please Choose Date");
		}
		else{
			$("#p1").html("");
		}
		if(show1 == '' || show1 == null){
			valid = false;
			$("#p2").html("*Please Choose Show");
		}
		else{
			$("#p2").html("");
		}
		if(seats == '' || seats == null){
			valid = false;
			$("#p3").html("*Please Select Seat");
		}
		else{
			$("#p3").html("");
		}
		
		if(valid==true){
			var price=$("#price").val();
			$("#m_price").html(price);
			
			var seats=$("#arr").val();
			$("#seats").html(seats);
			
			var date1=$("#date1").val();
			$("#date2").html(date1);
			
			var show1=$("#show1").val();
			$("#show2").html(show1);
			
			$("#modal2").modal('show');
			
			/*$.ajax({
					url: 'book.php',
					type: 'post',
					data: {'show':show1,'date1':date1,'seats':seats,'price':price,'movie_name':c},
					dataType: 'json',
					success:function(response)
					{
						if(response.arr)
						{
							valid=false;
							$("#p3").html("*Tickets Already Booked");
							
						}	
						
						
						else if(response.arr==0)
						{
							$("#myform").submit();
							$('.seat').removeAttr("disabled");
							$('#price').removeAttr("disabled");
							alert("Booked Successfully");
							window.location.href = "profile.php";
						}
					}
			});*/
		}
		 
	}
				$('#pay').click(function(){
					var card_number = $("#e_card").val();
					var expiry_month = $("#e_month").val();
					var expiry_year = $("#e_year").val();
					var date1 = $("#date1").val();
					var show1 = $("#show1").val();
					var seats = $("#arr").val();
					var price = $("#price").val();
					$.ajax({
							url: 'pay.php',
							type: 'post',
							data: {'card_number':card_number,'expiry_month':expiry_month,'expiry_year':expiry_year,'show':show1,'date1':date1,'seats':seats,'price':price,'movie_name':c},
							dataType: 'json', 
							success:function(response)
							{
								if(response.arr=='right')
								{
									alert("Succesfull");
									window.location.href = "profile.php";	
								}	
								else
								{
									alert("Wrong Details");
									window.location.href = "profile.php";
								}
									
							}
					})
				})
});

/*$("#layout").on(change,function(){	
	if($("#show").val()=="" || $("#show").val()==null)
	{
		$("#slot_err").html("*Please choose a slot");
		//flag=false;
	}
	else
	{
		$("#p1").html("");
		$("#lay").modal('show');
	}	
})*/

</script>
<?php
include("footer.php");
?>