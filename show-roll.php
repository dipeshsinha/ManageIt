<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
if($_SESSION['username']==""){
	header('location:manageit.php');
}
?>
	<title>Show students's details</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-theme.min.css">
	<style type="text/css">
		.jumbotron{
			text-align: center;
		}
	</style>
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
<div class="container" style="text-align: center;">
<div class="container">
<form action="#" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Roll no.</label>
    <input type="integer" class="form-control" id="exampleInputEmail1" name="roll" aria-describedby="emailHelp" placeholder="Enter Roll no.">
  <br><br>
  
  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
</div></form><br><br></div></div>

	<?php
	if(isset($_POST['sub'])){
	$conn = mysqli_connect("localhost","root","","project");
 	$sql = "select * from student where roll='".$_POST['roll']."';";
 	$result = mysqli_query($conn,$sql);
 	$count = mysqli_num_rows($result);
 	echo "<table class=\"table\"><tr><th>First name</th><th>Last name</th><th>Roll no.</th><th>Course</th><th>Total fee</th><th>Remaining fee</th></tr>";
 	while($row= mysqli_fetch_row($result)){
 		$sql2 = "select * from fees where roll ='".$row[2]."';";
	 		$result2 = mysqli_query($conn,$sql2);
	 		$given=0;
	 		while($row2 = mysqli_fetch_row($result2)){
	 			$given=$given+$row2[2];
	 		}
	 		$rem=$row[4]-$given;
 		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$rem."</td></tr>";
 	}
 	echo "</table>";
 }
 if(isset($_POST['end'])){
	session_destroy();
	header("location:manageit.php");
}

if(isset($_POST['home'])){
	header("location:mainpage.php");
}
	?>
	


</body>
</html>

