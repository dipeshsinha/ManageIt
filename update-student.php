<!DOCTYPE html>
<html>
<head><?php
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
	<title>Update Batch</title>
     <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="bootstrap-theme.min.css">
     <script type="text/javascript" src="bootstrap.min.js"></script>
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

<div class="jumbotron" style="text-align: center;">
	<div class="container">
	<h1>Manage<span style="color: red;">It</span></h1>
	<hr>
	<p>A website to manage students and fees details</p>
</div>
</div>

<div class="container">
<form action="#" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Roll no.</label>
    <input type="integer" class="form-control" id="exampleInputEmail1" name="roll" aria-describedby="emailHelp" placeholder="Enter Roll no.">
  <br><br>
  
  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
</form>
</div>

</body>
</html>


<?php

if(isset($_POST['end'])){
  session_destroy();
  header("location:manageit.php");
}

if(isset($_POST['sub'])){
	$conn = mysqli_connect("localhost","root","","project");
  $sql2 = "select * from student where roll = '".$_POST['roll']."'";
  $result=mysqli_query($conn,$sql2);
  $count = mysqli_num_rows($result);
  if($count>0){
  	header('location:update-page.php?var='.$_POST['roll'].'');
  }else {
  	echo "<h3>No student with this roll no. is registered.</h3>";
  }
}
if(isset($_POST['home'])){
  header("location:mainpage.php");
}
?>