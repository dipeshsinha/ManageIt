<!DOCTYPE html>
<html>
<head>
  <?php
  session_start();
if($_SESSION['username']==""){
  header('location:manageit.php');
}
$connt = mysqli_connect("localhost","root","","project");
  $sqlch = "select * from user where username = '".$_SESSION['username']."'";
  $resultch=mysqli_query($connt,$sqlch);
  $rowch=mysqli_fetch_row($resultch);
  if($rowch[5]=='n'){
    echo "<script>alert(\"you are not allowed to view this page\");window.location=\"mainpage.php\";</script>";
  }
?>
	<title>Add course</title>
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
<div class="container">
<form action="#" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Course ID</label>
    <input type="text" class="form-control" name="courseid" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Course ID">
    <small id="emailHelp" class="form-text text-muted">Make sure course ID is unique.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Course name</label>
    <input type="text" class="form-control" name="coursename" id="exampleInputPassword1" placeholder="Enter course name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Course fees</label>
    <input type="integer" class="form-control" name="coursefees" id="exampleInputPassword1" placeholder="Enter course fees">
    <small id="emailHelp" class="form-text text-muted">Enter course fees in rupees.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Course duration</label>
    <input type="integer" class="form-control" name="courseduration" id="exampleInputPassword1" placeholder="Enter course duration">
    <small id="emailHelp" class="form-text text-muted">Enter course duration in months.</small>
  </div>
  
  <button type="submit" name="sub" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>

<?php

if(isset($_POST['sub'])){

	$courseid = $_POST['courseid'];
	$coursename = $_POST['coursename'];
	$coursefees = $_POST['coursefees'];
	$courseduration = $_POST['courseduration'];

	$conn = mysqli_connect("localhost","root","","project");
	$sql = "insert into course values('".$courseid."','".$coursename."','".$coursefees."','".$courseduration."');";
 
 	if(mysqli_query($conn,$sql)){
	 	echo "<div style=\"text-align:center;\"\"><h3>Course added</h3></div>";
 	}else{
	 	echo mysqli_error($conn);
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