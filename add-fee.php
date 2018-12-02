<!DOCTYPE html>
<html>
<head>


  <?php
  session_start();
  if($_SESSION['username']==""){
  header('location:manageit.php');
}
  ?>


	<title>Add student's fees</title>
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


<form action="#" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Student roll no</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="roll" aria-describedby="emailHelp" placeholder="Enter student's roll no.">
    <small id="emailHelp" class="form-text text-muted">Make sure student is already added in in the 'add student' section.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Amount submitted</label>
    <input type="integer" class="form-control" name="amount" id="exampleInputPassword1" placeholder="Amount submitted">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Date of submission</label>
    <input type="date" class="form-control" name="date" id="exampleInputPassword1">
  </div>
  <button type="submit" name="sub" class="btn btn-primary">Submit</button>
</form>


</div>

</body>
</html>

<?php

if(isset($_POST['sub'])){
	$roll = $_POST['roll'];
	$fee = $_POST['amount'];
	$date = $_POST['date'];

	$conn = mysqli_connect("localhost","root","","project");
 	$sql = "select * from student where roll='".$roll."';";
 	$result = mysqli_query($conn,$sql);
 	$count = mysqli_num_rows($result);
 	if($count>0){

 		$conn1 = mysqli_connect("localhost","root","","project");
		$sql1 = "insert into fees values('".$roll."','".$date."','".$fee."','".$_SESSION['username']."');";
 
		 if(mysqli_query($conn1,$sql1)){
		 	echo "<h3>Fees details added</h3>";
		 }else{
		 	echo mysqli_error($conn);
		 }


 	}else{
 		echo "<h4>student not in database</h4>";
 	}
}


if(isset($_POST['end'])){
  session_destroy();
  header("location:manageit.php");
}

if(isset($_POST['home'])){
  header("location:mainpage.php");
}
?>