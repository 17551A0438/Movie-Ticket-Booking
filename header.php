<html>
<head>
<title>Booking</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<link rel="stylesheet" href="css/jquery-ui.min.css">
<script src="js/jquery-ui.min.js"></script>
<style>
h2{
	padding:15px 15px;
}
.invalid{
		color:red;
	}
</style>
</head>
<body> 
<nav class="md navbar navbar-dark bg-dark">
	<a class="navbar-brand" href="#">Movie Booking</a>
	<div>
		<a class="btn btn-primary" href="login.php">Logout</a>
	</div>
</nav>
<h2>Welcome <?php echo $_SESSION['username'];?>!</h2>