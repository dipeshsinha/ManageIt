<!DOCTYPE html>
<html>
<head>
	<title>Sign up to manageIt</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style type="text/css">
		.jumbotron{
			text-align: center;
		}
	</style>
</head>
<body>

<div class="jumbotron">
	<div class="container">
	<h1>Manage<span style="color: red;">It</span></h1>
	<hr>
	<p>A website to manage students and fees details</p>
</div>
</div>



<div class="container" style="text-align: center;">
	<span style="text-align: center;color: red;"><h2>Sign Up</h2></span>

<form action="#" method="post" class="form-group">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="First name" style="text-align: center;" name="firstname">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Last name" style="text-align: center;" name="lastname">
    </div>
      <input type="text" class="form-control" placeholder="Employee ID" style="text-align: center;" name="username">
 


      <input type="password" class="form-control" placeholder="Password" style="text-align: center;" name="password">
      </div>
    <br>
    <input type="submit" name="sub" value="Sign Up" class="btn btn-danger">
    </div>
 </form>
</div>
</body>
</html>

<?php

if(isset($_POST["sub"])){

$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$username=$_POST["username"];
$subject="null";
$password=$_POST["password"];

$conn = mysqli_connect("localhost","root","","project");
$sql = "insert into user values('".$firstname."','".$lastname."','".$username."','".$subject."','".$password."');";
 
 if(mysqli_query($conn,$sql)){
 	header('location:manageit.php');
 }else{
 	echo mysqli_error($conn);
 }
}


?>