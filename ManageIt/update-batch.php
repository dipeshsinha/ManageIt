<!DOCTYPE html>
<html>
<head><?php
  session_start();
if($_SESSION['username']==""){
  header('location:manageit.php');
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




<div class="container" style="text-align: center;">
<div class="container">
<form action="#" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Batch ID</label>
    <input type="integer" class="form-control" id="exampleInputEmail1" name="batchid" aria-describedby="emailHelp" placeholder="Enter batch ID">
  <br><br>
  
  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
</div></form><br><br></div></div>


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
if(isset($_POST['sub'])){
  $batchid = $_POST['batchid'];
  $conn = mysqli_connect("localhost","root","","project");
  $sql = "select * from batch where batchid='".$batchid."';";
  $result = mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result);
  if ($count>0) {
  header("location:update-batch-page.php?var=".$batchid."");
}else{
  echo "<h4>Batch id is invalid</h4>";
}
}
?>
