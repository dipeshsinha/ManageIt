<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
if($_SESSION['username']==""){
	header('location:manageit.php');
}
?>
	<title>Show student details</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-theme.min.css">
	<style type="text/css">
		.jumbotron{
			text-align: center;
		}
		li{
			float: left;
			margin-left: 8%;
			list-style: none;
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
<div class="container" style="font-size: 20px;">
<a href="show-all.php">Get all student's details</a><br><br>
<a href="show-roll.php">Get student detail by roll no.</a>
</div>

</body>
</html>

<?php

if(isset($_POST['end'])){
	session_destroy();
	header("location:manageit.php");
}

if(isset($_POST['home'])){
	header("location:mainpage.php");
}
?>
