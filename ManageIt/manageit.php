<!DOCTYPE html>
<html>

<head>
	<title>Welcome to Manageit</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style type="text/css">
		.jumbotron{
			text-align: center;
		}
		.jumbotron-1{
			width: 100%;
			float: left;
			background-color: white;
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

<div class="container">
<div class="jumbotron jumbotron-1">
	<h3>Already Registered?</h3><br>
	<form class="form-group" action="#" method="post">
		Employee ID : <input type="text" name="userid" class="form-control" placeholder="Enter employee ID" style="text-align: center;"><br>
		Password : <input type="Password" name="password" class="form-control" placeholder="Enter Password" style="text-align: center;"><br>
		<input type="submit" name="sub" value="Log In" class="btn btn-danger">

	</form>
	<h4>OR, <a href="signup.php">SIGN UP</a></h4>
</div>
</div>

</body>
</html>


<?php

 session_start();

if(isset($_POST["sub"])){
$username = $_POST["userid"];
$password = $_POST["password"];

$conn = mysqli_connect("localhost","root","","project");
 $sql = "select * from user where username='".$username."' and password='".$password."';";
 $result = mysqli_query($conn,$sql);
 $count = mysqli_num_rows($result);
 $row= mysqli_fetch_row($result);

 if($count>0){
 	$_SESSION['username']=$row[2];
 	$_SESSION['subject']=$row[3];
 	$_SESSION['firstname']=$row[0];
 	$_SESSION['lastname']=$row[1];
 	header('location:mainpage.php');
 }else{
 	echo "not signed up";
 }


}

if($_SESSION['username']!=""){
	header('location:mainpage.php');
}

?>