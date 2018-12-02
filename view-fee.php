<!DOCTYPE html>
<html>
<head>
	<?php

	session_start();
if($_SESSION['username']==""){
	header('location:manageit.php');
}

	?>
	<title>View student fees</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-theme.min.css">
	<style type="text/css">
		.jumbotron{
			text-align: center;
		}
		.div-nav{
      height: 50px;
      width: 100%;
      background-color: red;
      color: white;
      font-size: 20px;
      padding-top: 8px;
    }
	</style>
</head>
<body>


<div class="div-nav">
  <span>
  <?php
    echo $_SESSION['firstname']." ".$_SESSION['lastname'];
  ?>
  <span style="float: right;color: red;"><form action="#" method="post"><input type="submit" name="end" value="Sign Out" class="btn btn-danger"></form></span>
    <span style="float:right;color: red;"><form action="#" method="post"><input type="submit" name="home" value="Home" class="btn btn-danger"></form></span>
</span>

</div>

	<div class="jumbotron">
	<div class="container">
	<h1>Manage<span style="color: red;">It</span></h1>
	<hr>
	<p>A website to manage students and fees details</p>
</div>
</div>


<div class="container">
<form action="#" method="post"  style="text-align: center;">
<input type="text" name="roll" class="form-control" placeholder="Enter roll no." style="text-align: center;"><br>
<input type="submit" value="Find data" name="sub" class="btn btn-primary">


</form>

</div>


</body>
</html>

<?php


if(isset($_POST['sub'])){
	$roll = $_POST['roll'];
	$conn = mysqli_connect("localhost","root","","project");
 	$sql = "select * from student where roll='".$roll."';";
 	$result = mysqli_query($conn,$sql);
 	$row= mysqli_fetch_row($result);
 	$totalfee = $row[4];

$conn1 = mysqli_connect("localhost","root","","project");
 	$sql1 = "select * from fees where roll='".$roll."';";
 	$result1 = mysqli_query($conn1,$sql1);
 	$given=0;
 	echo "<br><br><table class=\"table\"><tr><th><h3>Roll no.</h3></th><th><h3>Date</h3></th><th><h3>Amount</h3></th><th><h3>Received by</h3></th></tr>";
 	while($row1= mysqli_fetch_row($result1)){
 		$given=($given+$row1[2]);
 		echo "<tr><td>".$row1[0]."</td><td>".$row1[1]."</td><td>".$row1[2]."</td><td>".$row1[3]."</td></tr>";
 	}
 	$rem = $totalfee-$given;

 	echo "</table>";


 	echo "<h3>Total remaining fees = ".$rem."</h3>";

}

if(isset($_POST['end'])){
  session_destroy();
  header("location:manageit.php");
}
if(isset($_POST['home'])){
  header("location:mainpage.php");
}
?>